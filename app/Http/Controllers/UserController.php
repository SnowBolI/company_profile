<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\HomeYT;
use App\Models\Article;
use App\Models\Edukasi;
use App\Models\Category;
use App\Models\HomeSlider;
use App\Models\Destination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\EdukasiBanner;
use App\Models\HomeThumbnail;
use App\Models\HomeBackground;

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
    $homeBackgrounds = HomeBackground::orderBy('created_at', 'desc')->take(1)->get();

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

    return view('user.home', compact('homeSliders','homeBackgrounds', 'homeThumbnails', 'youtubeId', 'categories', 'about'));
  }



  public function edukasi(Request $request)
  {
      $edukasiSliders = EdukasiBanner::orderBy('created_at', 'desc')->take(1)->get();

      // Mendapatkan kata kunci pencarian dari request (parameter s)
      $keyword = $request->get('s') ?? '';

      // Mengambil data edukasi berdasarkan pencarian kata kunci pada kolom judul dan keterangan
      $articles = Edukasi::where('judul', 'LIKE', "%$keyword%")
          ->orWhere('keterangan', 'LIKE', "%$keyword%")
          ->orderBy('created_at', 'desc')
          ->paginate(10);

      // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
      $recents = Edukasi::select('judul', 'slug')
          ->orderBy('created_at', 'desc')
          ->limit(5)
          ->get();

      $data = [
          'articles' => $articles,
          'recents' => $recents,
          'edukasiSliders' => $edukasiSliders,

      ];

      return view('user.edukasi', $data);
  }


  public function show_edukasi($slug)
  {
    // Mengambil data edukasi berdasarkan slug
    $article = Edukasi::where('slug', $slug)->firstOrFail();

    // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
    $recents = Edukasi::select('judul', 'slug')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

    $data = [
        'article' => $article,
        'recents' => $recents
    ];
    return view('user/edukasi', $data);
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
