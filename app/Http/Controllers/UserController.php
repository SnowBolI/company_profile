<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\HomeThumbnail;
use App\Models\HomeYT;
use App\Models\Article;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
{

  public function __construct()
  {
    // $this->middleware('auth');
  }


  public function home()
  {
    // Ambil 3 slider terbaru
    $homeSliders = HomeSlider::orderBy('created_at', 'desc')->take(3)->get();
    $homeYoutubes = HomeYT::orderBy('created_at', 'desc')->first();
    $homeThumbnails = HomeThumbnail::orderBy('created_at', 'desc')->first();

    if ($homeYoutubes) {
      $url = $homeYoutubes->linkyt;
      $parsedUrl = parse_url($url);
      parse_str($parsedUrl['query'], $query);
      $youtubeId = $query['v'] ?? ''; // Mendapatkan ID video jika ada
      $homeYoutubes->youtubeId = $youtubeId; // Menyimpan ID video ke model (opsional)
  } else {
      $youtubeId = '';
  }

    // Ambil data kategori dan about
    $categories = Category::all();
    $about = About::all();

    return view('user.home', compact('homeSliders', 'homeThumbnails', 'youtubeId', 'categories', 'about'));
  }



  public function blog(Request $request)
  {

    $keyword = $request->get('s') ? $request->get('s') : '';
    $category = $request->get('c') ? $request->get('c') : '';

    $articles = Article::with('categories')
      ->whereHas('categories', function ($q) use ($category) {
        $q->where('name', 'LIKE', "%$category%");
      })
      ->where('status', 'PUBLISH')
      ->where('title', 'LIKE', "%$keyword%")
      ->orderBy('created_at', 'desc')
      ->paginate(10);
    $recents = Article::select('title', 'slug')->where('status', 'PUBLISH')->orderBy('created_at', 'desc')->limit(5)->get();

    $data = [
      'articles' => $articles,
      'recents' => $recents
    ];

    return view('user/blog', $data);
  }


  public function show_article($slug)
  {
    $articles = Article::where('slug', $slug)->first();
    $recents = Article::select('title', 'slug')->where('status', 'PUBLISH')->orderBy('created_at', 'desc')->limit(5)->get();
    $data = [
      'articles' => $articles,
      'recents' => $recents
    ];
    return view('user/blog', $data);
  }

  public function destination(Request $request)
  {
    $keyword = $request->get('s') ? $request->get('s') : '';

    $destinations = Destination::where('title', 'LIKE', "%$keyword%")->orderBy('created_at', 'desc')->paginate(10);
    $other_destinations = Destination::select('title', 'slug')->where('status', 'PUBLISH')->orderBy('created_at', 'desc')->limit(5)->get();

    $data = [
      'destinations' => $destinations,
      'other' => $other_destinations
    ];

    return view('user/destination', $data);
  }

  public function show_destination($slug)
  {
    $destinations = Destination::where('slug', $slug)->firstOrFail();
    $other_destinations = Destination::select('title', 'slug')->where('status', 'PUBLISH')->orderBy('created_at', 'desc')->limit(5)->get();

    $data = [
      'destinations' => $destinations,
      'other' => $other_destinations
    ];

    return view('user/destination', $data);
  }

  public function contact()
  {
    return view('user/contact');
  }
}
