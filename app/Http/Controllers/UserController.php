<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\HomeDeposito;
use App\Models\HomeTabungan;
use App\Models\Karir;
use App\Models\Berita;
use App\Models\HomeYT;
use App\Models\Article;
use App\Models\Edukasi;
use App\Models\Kontak;
use App\Models\Laporan;
use App\Models\Category;
use App\Models\KantorKas;
use App\Models\HomeSlider;
use App\Models\PesanDeposito;
use App\Models\PesanKontak;
use App\Models\PesanKredit;
use App\Models\PesanTabungan;
use App\Models\ProdukPPOB;
use App\Models\Destination;
use App\Models\KarirBanner;
use App\Models\ProfilePenghargaan;
use Illuminate\Support\Str;
use App\Models\BeritaBanner;
use App\Models\KantorBanner;
use App\Models\KantorCabang;
use App\Models\KontakBanner;
use App\Models\ProdukBanner;
use App\Models\ProdukKredit;
use Illuminate\Http\Request;
use App\Models\EdukasiBanner;
use App\Models\HomeThumbnail;
use App\Models\LaporanBanner;
use App\Models\HomeBackground;
use App\Models\ProdukDeposito;
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
    $recents = Edukasi::select('judul', 'slug')
      ->orderBy('created_at', 'desc')
      ->limit(5)
      ->get();
      $kontaks = Kontak::orderBy('created_at', 'desc')->first();
    $karirs = Karir::orderBy('tanggal', 'desc')->take(1)->get();
    $beritas = Berita::orderBy('tanggal', 'desc')->take(1)->get();
    $edukasis = Edukasi::orderBy('tanggal', 'desc')->take(1)->get(); 
    $penghargaans = ProfilePenghargaan::orderBy('created_at', 'desc')->take(5)->get(); 


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
    $recents = Berita::all();

    return view('user.home', compact('penghargaans','karirs','edukasis','beritas','kontaks', 'homeSliders', 'homeBackgrounds', 'homeThumbnails', 'youtubeId', 'categories', 'about', 'recents'));
  }
  public function getTabunganTypes()
    {
        // Ambil semua jenis tabungan beserta bunga dari database
        $tabunganTypes = HomeTabungan::all();
        return response()->json($tabunganTypes);
    }
    public function getDepositoTypes()
    {
        // Ambil semua jenis tabungan beserta bunga dari database
        $depositoTypes = HomeDeposito::all();
        return response()->json($depositoTypes);
    }

  public function cabang(Request $request)
  {
    // Ambil banner cabang
    $cabangSliders = KantorBanner::orderBy('created_at', 'desc')->take(1)->get();

    // Ambil semua data kantor cabang dan urutkan sehingga yang memiliki kata 'pusat' di awal
    $cabangs = KantorCabang::orderByRaw("CASE WHEN LOWER(nama) LIKE '%utama%' THEN 0 ELSE 1 END")
      ->orderBy('nama', 'asc')
      ->get();
    // Ambil data kantor kas berdasarkan ID cabang
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();



    $data = [
      'cabangs' => $cabangs,
      'cabangSliders' => $cabangSliders,
      'recents' => $recents,
      'kontaks' => $kontaks
    ];

    return view('user.cabang', $data);
  }
  public function kas(Request $request, $id)
  {
    $kantorkas = KantorKas::where('kantor_cabang_id', $id)->get();


    if (!$kantorkas) {
      abort(404, 'Kantor Kas tidak ditemukan');
    }
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();


    $cabangSliders = KantorBanner::orderBy('created_at', 'desc')->take(1)->get();

    return view('user.cabang', [
      'kantorkas' => $kantorkas,
      'cabangSliders' => $cabangSliders,
      'recents' => $recents,
      'kontaks' => $kontaks
    ]);
  }



  public function show_edukasi($slug)
  {
    // Mengambil data edukasi berdasarkan slug
    $edukasiSliders = EdukasiBanner::orderBy('created_at', 'desc')->take(1)->get();
    $article = Edukasi::where('slug', $slug)->firstOrFail();

    // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();


    $data = [
      'article' => $article,
      'recents' => $recents,
      'edukasiSliders' => $edukasiSliders,
      'kontaks' => $kontaks
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
      ->groupBy(function ($item) {
        return \Carbon\Carbon::parse($item->tanggal)->format('Y');
      });

    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();



    // Urutkan tahun dari terbaru
    $laporans = $laporans->sortKeysDesc();
    $data = [
      'laporans' => $laporans,
      'laporanSliders' => $laporanSliders,
      'recents' => $recents,
      'kontaks' => $kontaks
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
      ->orderBy('tanggal', 'desc')
      ->paginate(10);

    // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();


    $data = [
      'articles' => $articles,
      'recents' => $recents,
      'edukasiSliders' => $edukasiSliders,
      'kontaks' => $kontaks

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
      ->orderBy('tanggal', 'desc')
      ->paginate(10);

    // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
    $recents = Karir::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();


    $data = [
      'articles' => $articles,
      'recents' => $recents,
      'karirSliders' => $karirSliders,
      'kontaks' => $kontaks


    ];

    return view('user.karir', $data);
  }

  public function show_karir($slug)
  {
    // Mengambil data edukasi berdasarkan slug
    $karirSliders = KarirBanner::orderBy('created_at', 'desc')->take(1)->get();
    $article = Karir::where('slug', $slug)->firstOrFail();

    // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();


    $data = [
      'article' => $article,
      'recents' => $recents,
      'karirSliders' => $karirSliders,
      'kontaks' => $kontaks
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
      ->orderBy('tanggal', 'desc')
      ->paginate(10);

    // Mengambil 5 data edukasi terbaru untuk ditampilkan sebagai artikel terbaru
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();


    $data = [
      'articles' => $articles,
      'recents' => $recents,
      'beritaSliders' => $beritaSliders,
      'kontaks' => $kontaks

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
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();


    $data = [
      'article' => $article,
      'recents' => $recents,
      'beritaSliders' => $beritaSliders,
      'kontaks' => $kontaks
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
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();



    return view('user.tabungan', compact('kontaks', 'tabunganData', 'produkSliders', 'recents'));
  }
  public function tabungan_store(Request $request)
  {
    // dd($request);
    $request->validate([
      'nama' => 'required|string',
      'email' => 'required|email',
      'ktp' => 'required|integer',
      'alamat' => 'required|string',
      'hp' => 'required|integer',
      'tipe_tabungan' => 'required|string',
      'setoran_awal' => 'required|integer',
    ]);

    // Ambil semua input dari form
    $input = $request->all();

    // Menambahkan nilai default untuk status
    $input['status'] = 'belum dibaca';
    $input['subjek'] = 'tabungan';
    $input['tanggal'] = now();

    // Simpan data ke database
    PesanTabungan::create($input);

    // Redirect dan kirim pesan sukses
    return redirect()->route('tabungan')
      ->with('message', 'Pembukaan Tabungan berhasil dikirim');
  }

  public function deposito()
  {
    $produkSliders = ProdukBanner::orderBy('created_at', 'desc')->take(1)->get();

    // Mengambil semua data tabungan untuk semua tab
    $depositoData = ProdukDeposito::all();
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();



    return view('user.deposito', compact('kontaks', 'depositoData', 'produkSliders', 'recents'));
  }
  public function deposito_store(Request $request)
  {
    // dd($request);
    $request->validate([
      'nama' => 'required|string',
      'email' => 'required|email',
      'ktp' => 'required|integer',
      'alamat' => 'required|string',
      'hp' => 'required|integer',
      'tipe_deposito' => 'required|string',
      'setoran_awal' => 'required|integer',
    ]);

    // Ambil semua input dari form
    $input = $request->all();

    // Menambahkan nilai default untuk status
    $input['status'] = 'belum dibaca';
    $input['subjek'] = 'deposito';
    $input['tanggal'] = now();

    // Simpan data ke database
    PesanDeposito::create($input);

    // Redirect dan kirim pesan sukses
    return redirect()->route('deposito')
      ->with('message', 'Pembukaan Tabungan berhasil dikirim');
  }

  public function kredit()
  {
    $produkSliders = ProdukBanner::orderBy('created_at', 'desc')->take(1)->get();

    // Mengambil semua data tabungan untuk semua tab
    $kreditData = ProdukKredit::all();
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();



    return view('user.kredit', compact('kontaks', 'kreditData', 'produkSliders', 'recents'));
  }
  public function kredit_store(Request $request)
  {
    // dd($request);
    $request->validate([
      'nama' => 'required|string',
      'email' => 'required|email',
      'ktp' => 'required|integer',
      'alamat' => 'required|string',
      'hp' => 'required|integer',
      'tujuan_pinjaman' => 'required',
      'jaminan' => 'required',
      'jumlah_pinjaman' => 'required|integer',
      'waktu_pinjaman' => 'required|integer',
    ]);

    // Ambil semua input dari form
    $input = $request->all();

    // Menambahkan nilai default untuk status
    $input['status'] = 'belum dibaca';
    $input['subjek'] = 'kredit';
    $input['tanggal'] = now();

    // Simpan data ke database
    PesanKredit::create($input);

    // Redirect dan kirim pesan sukses
    return redirect()->route('kredit')
      ->with('message', 'Pembukaan Tabungan berhasil dikirim');
  }

  public function ppob()
  {
    $produkSliders = ProdukBanner::orderBy('created_at', 'desc')->take(1)->get();

    // Mengambil semua data tabungan untuk semua tab
    $ppobData = ProdukPPOB::all();
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();



    return view('user.ppob', compact('kontaks', 'ppobData', 'produkSliders', 'recents'));
  }
  public function contact()
  {
    $kontakSliders = KontakBanner::orderBy('created_at', 'desc')->take(1)->get();

    // Mengambil semua data tabungan untuk semua tab
    $kontakInfo = Kontak::first();
    $recents = Berita::select('judul', 'slug')
      ->orderBy('tanggal', 'desc')
      ->limit(5)
      ->get();
    $kontaks = Kontak::orderBy('created_at', 'desc')->first();


    // Return the view with the data
    return view('user.contact', compact('kontaks', 'kontakSliders', 'kontakInfo', 'recents'));
  }
  public function contact_store(Request $request)
  {
    $request->validate([
      'nama' => 'required|string',
      'email' => 'required|email',
      'subjek' => 'required|string',
      'pesan' => 'required|string',
    ]);

    // Ambil semua input dari form
    $input = $request->all();

    // Menambahkan nilai default untuk status
    $input['status'] = 'belum dibaca'; // Pastikan nilai default dalam tanda kutip
    $input['tanggal'] = now();

    // Simpan data ke database
    PesanKontak::create($input);

    // Redirect dan kirim pesan sukses
    return redirect()->route('contact')
      ->with('message', 'Pesan berhasil dikirim');
  }

}
