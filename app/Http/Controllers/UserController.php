<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Karir;
use App\Models\Berita;
use App\Models\HomeYT;
use App\Models\Article;
use App\Models\Edukasi;
use App\Models\Laporan;
use App\Models\Category;
use App\Models\KantorKas;
use App\Models\HomeSlider;
use App\Models\Destination;
use App\Models\KarirBanner;
use App\Models\ProdukDeposito;
use App\Models\ProdukKredit;
use App\Models\ProdukPPOB;
use Illuminate\Support\Str;
use App\Models\BeritaBanner;
use App\Models\KantorBanner;
use App\Models\KantorCabang;
use App\Models\ProdukBanner;
use Illuminate\Http\Request;
use App\Models\EdukasiBanner;
use App\Models\HomeThumbnail;
use App\Models\LaporanBanner;
use App\Models\HomeBackground;
use App\Models\ProdukTabungan;

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

  public function cabang(Request $request)
  {
      // Ambil banner cabang
      $cabangSliders = KantorBanner::orderBy('created_at', 'desc')->take(1)->get();

      // Ambil semua data kantor cabang dan urutkan sehingga yang memiliki kata 'pusat' di awal
      $cabangs = KantorCabang::orderByRaw("CASE WHEN LOWER(nama) LIKE '%pusat%' THEN 0 ELSE 1 END")
          ->orderBy('nama', 'asc')
          ->get();
      // Ambil data kantor kas berdasarkan ID cabang

      $data = [
          'cabangs' => $cabangs,
          'cabangSliders' => $cabangSliders,
      ];

      return view('user.cabang', $data);
  }
  public function kas(Request $request, $id)
{ 
  $kantorkas = KantorKas::where('kantor_cabang_id', $id)->get();


    if (!$kantorkas) {
        abort(404, 'Kantor Kas tidak ditemukan');
    }

    $cabangSliders = KantorBanner::orderBy('created_at', 'desc')->take(1)->get();

    return view('user.cabang', [
        'kantorkas' => $kantorkas,
        'cabangSliders' => $cabangSliders,
    ]);
}
  

    public function show_cabang($id)
    {
        $cabang = KantorKas::where('id', $id)->firstOrFail();

        // Mengambil data edukasi berdasarkan id
        $cabangSliders = KantorBanner::orderBy('created_at', 'desc')->take(1)->get();
    
        // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
        $cabang = KantorKas::select('nama', 'id')
            ->orderBy('created_at', 'desc')
            ->get();
    
        $data = [
            'cabang' => $cabang,
            'cabangSliders' => $cabangSliders,
        ];
        return view('user/cabang', $data);
    }

    
  public function show_edukasi($slug)
  {
    // Mengambil data edukasi berdasarkan slug
    $edukasiSliders = EdukasiBanner::orderBy('created_at', 'desc')->take(1)->get();
    $article = Edukasi::where('slug', $slug)->firstOrFail();

    // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
    $recents = Edukasi::select('judul', 'slug')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

    $data = [
        'article' => $article,
        'recents' => $recents,
        'edukasiSliders' => $edukasiSliders
    ];
    return view('user/edukasi', $data);
  }

  public function laporan(Request $request)
  {
    // Ambil banner laporan
    $laporanSliders = LaporanBanner::orderBy('created_at', 'desc')->take(1)->get();

    // Ambil semua laporan dan kelompokkan berdasarkan tahun
    $laporans = Laporan::orderBy('tanggal', 'desc')
        ->get()
        ->groupBy(function($item) {
            return \Carbon\Carbon::parse($item->tanggal)->format('Y');
        });

    // Urutkan tahun dari terbaru
    $laporans = $laporans->sortKeysDesc();
    $data = [
      'laporans' => $laporans,
      'laporanSliders' => $laporanSliders,
    ];
    return view('user.laporan', $data);
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




  public function karir(Request $request)
  {
      $karirSliders = KarirBanner::orderBy('created_at', 'desc')->take(1)->get();

      // Mendapatkan kata kunci pencarian dari request (parameter s)
      $keyword = $request->get('s') ?? '';

      // Mengambil data edukasi berdasarkan pencarian kata kunci pada kolom judul dan keterangan
      $articles = Karir::where('judul', 'LIKE', "%$keyword%")
          ->orWhere('keterangan', 'LIKE', "%$keyword%")
          ->orderBy('created_at', 'desc')
          ->paginate(10);

      // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
      $recents = Karir::select('judul', 'slug')
          ->orderBy('created_at', 'desc')
          ->limit(5)
          ->get();

      $data = [
          'articles' => $articles,
          'recents' => $recents,
          'karirSliders' => $karirSliders,

      ];

      return view('user.karir', $data);
  }

  public function show_karir($slug)
  {
    // Mengambil data edukasi berdasarkan slug
    $karirSliders = KarirBanner::orderBy('created_at', 'desc')->take(1)->get();
    $article = Karir::where('slug', $slug)->firstOrFail();

    // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
    $recents = Karir::select('judul', 'slug')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

    $data = [
        'article' => $article,
        'recents' => $recents,
        'karirSliders' => $karirSliders
    ];
    return view('user/karir', $data);
  }

  public function berita(Request $request)
  {
      $beritaSliders = BeritaBanner::orderBy('created_at', 'desc')->take(1)->get();

      // Mendapatkan kata kunci pencarian dari request (parameter s)
      $keyword = $request->get('s') ?? '';

      // Mengambil data edukasi berdasarkan pencarian kata kunci pada kolom judul dan keterangan
      $articles = Berita::where('judul', 'LIKE', "%$keyword%")
          ->orWhere('keterangan', 'LIKE', "%$keyword%")
          ->orderBy('created_at', 'desc')
          ->paginate(10);

      // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
      $recents = Karir::select('judul', 'slug')
          ->orderBy('created_at', 'desc')
          ->limit(5)
          ->get();

      $data = [
          'articles' => $articles,
          'recents' => $recents,
          'beritaSliders' => $beritaSliders,

      ];

      return view('user.berita', $data);
  }

  public function show_berita($slug)
  {
    // Mengambil data edukasi berdasarkan slug
    $beritaSliders = BeritaBanner::orderBy('created_at', 'desc')->take(1)->get();
    $article = Berita::where('slug', $slug)->firstOrFail();

    // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
    $recents = Berita::select('judul', 'slug')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

    $data = [
        'article' => $article,
        'recents' => $recents,
        'beritaSliders' => $beritaSliders
    ];
    return view('user/berita', $data);
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

    public function tabungan()
    {
        $produkSliders = ProdukBanner::orderBy('created_at', 'desc')->take(1)->get();

        // Mengambil semua data tabungan untuk semua tab
        $tabunganData = ProdukTabungan::all();

        return view('user.tabungan', compact('tabunganData', 'produkSliders'));
    }

  public function deposito() 
  {
    $produkSliders = ProdukBanner::orderBy('created_at', 'desc')->take(1)->get();

    // Mengambil semua data tabungan untuk semua tab
    $depositoData = ProdukDeposito::all();

    return view('user.deposito', compact('depositoData', 'produkSliders'));
}

  public function kredit()
  {
    $produkSliders = ProdukBanner::orderBy('created_at', 'desc')->take(1)->get();

    // Mengambil semua data tabungan untuk semua tab
    $kreditData = ProdukKredit::all();

    return view('user.kredit', compact('kreditData', 'produkSliders'));
}

  public function ppob()
  {
      $produkSliders = ProdukBanner::orderBy('created_at', 'desc')->take(1)->get();

      // Mengambil semua data tabungan untuk semua tab
      $ppobData = ProdukPPOB::all();

      return view('user.ppob', compact('ppobData', 'produkSliders'));
  }
  public function contact()
  {
    return view('user/contact');
  }
}
