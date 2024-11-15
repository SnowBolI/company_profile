<?php

namespace App\Http\Controllers;


use App\Models\Berita;
use App\Models\Kontak;
use Illuminate\Http\Request;
use App\Models\ProfileBanner;
use App\Models\ProfileTentang;
use App\Models\ProfileStruktur;
use App\Models\ProfileMilestone;
use App\Models\ProfileSejarahVisi;
use App\Http\Controllers\Controller;


class ProfileController extends Controller
{
    private $profileData = [
        'index' => 'BANK EKADHARMA.',
        'sejarah' => 'Sejarah BANK EKADHARMA
        PT. BPR EKADHARMA BHINARAHARJA merupakan suatu badan usaha yang bergerak di bidang Perbankan sesuai dengan Undang-Undang Perbankan No. 7 tahun 1992 sebagaimana telah diubah dengan Undang-Undang No.10 tahun 1998.
        PT. BPR EKADHARMA BHINARAHARJA Kawedanan Magetan di dirikan di Magetan berdasarkan Akta nomor 5 tertanggal 19 Maret 1990 dibuat dihadapan Dewi KartikaTanusaputra, SH Notaris yang telah disahkan/ disetujui oleh Menteri Kehakiman Republik Indonesia dengan surat keputusannya nomor C2-2378.HT.01.01 Th.1990 tanggal 21 April 1990,  diubah dengan Akta nomor  1 tertanggal 10 Mei 2002 dibuat dihadapan Muhamad Firdauz Ibnu Pamungkas, SH Notaris di Yogyakarta yang telah mendapatkan pengesahan dari Menteri Kehakiman Republik Indonesia Nomor C-26260.HT.01.04 Th. 2003 tanggal 3 November 2003.
        Anggaran Dasar telah mengalami beberapa kali perubahan terakhir diubah dengan Akta Nomor 12 tertanggal 12 Maret 2009 dibuat dihadapan Yvone Erawati, SH Notaris di Madiun yang telah mendapatkan pengesahan dari Menteri Hukum dan Hak Asasi Manusia Republik Indonesia Nomor AHU-AH.01.10-03896 Tanggal  17 April 2009.',
        'visi_misi' => [
            'visi' => 'Menjadi Bank Perkreditan Rakyat Terbesar di Jawa Timur',
            'misi' => 'Memberikan pelayanan yang terbaik dengan menanamkan Brand Image, Kualitas SDM, serta Modal yang kuat untuk menciptakan loyalitas nasabah untuk perkembangan Bank'
        ],
        'struktur_organisasi' => 'Struktur Organisasi BANK EKADHARMA',
        'gambar' => '/user/images/struktur-org.png',
        'milestone' => [
            '2000' => 'Pendirian bank',
            '2010' => 'Ekspansi ke 10 provinsi',
            '2020' => 'Peluncuran layanan digital'
        ]
    ];
    public function index()

    {
        // Mengambil gambar terbaru dari ProfileSlider
        $profileSliders = ProfileBanner::orderBy('created_at', 'desc')->take(1)->get();
        
        // Mencari record di tabel ProfileSejarahVisi untuk 'sejarah', 'visi', dan 'misi' dengan mengonversi judul ke huruf kecil
        $profileSejarah = ProfileSejarahVisi::whereRaw('LOWER(judul) = ?', ['sejarah'])->first();
        $profileVisi = ProfileSejarahVisi::whereRaw('LOWER(judul) = ?', ['visi'])->first();
        $profileMisi = ProfileSejarahVisi::whereRaw('LOWER(judul) = ?', ['misi'])->first();
        $profileStrukturs = ProfileStruktur::orderBy('created_at', 'desc')->take(1)->get();
        $profileMilestones = ProfileMilestone::orderBy('tahun', 'asc')->get();
        $profileTentangs = ProfileTentang::orderBy('created_at', 'desc')->take(4)->get();
        $recents = Berita::select('judul', 'slug')
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();
        $kontaks = Kontak::orderBy('created_at', 'desc')->first();



        // Cek apakah data ditemukan untuk sejarah
        if (!$profileSejarah) {
            $profileDataSejarah = 'Tidak ada yang ditemukan'; // Atau bisa menggunakan null atau nilai lainnya
        } else {
            $profileDataSejarah = $profileSejarah->konten;
        }

        // Cek apakah data ditemukan untuk visi
        if (!$profileVisi) {
            $profileDataVisi = 'Tidak ada yang ditemukan'; // Atau bisa menggunakan null atau nilai lainnya
        } else {
            $profileDataVisi = $profileVisi->konten;
        }

        // Cek apakah data ditemukan untuk misi
        if (!$profileMisi) {
            $profileDataMisi = 'Tidak ada yang ditemukan'; // Atau bisa menggunakan null atau nilai lainnya
        } else {
            $profileDataMisi = $profileMisi->konten;
        }
        
        
        return view('user.profile', [
            'section' => 'tentang',
            'profileData' => $this->profileData,
            'profileDataSejarah' => $profileDataSejarah, // Kirimkan data sejarah
            'profileDataVisi' => $profileDataVisi, // Kirimkan data visi
            'profileDataMisi' => $profileDataMisi, // Kirimkan data misi
            'profileSliders' => $profileSliders,
            'profileStrukturs' => $profileStrukturs,     
            'profileTentangs' => $profileTentangs,     
            'profileMilestones' => $profileMilestones,
            'recents'=>$recents,
            'kontaks'=>$kontaks

        ]);
    }

    
    
    public function showSejarah()
    {

        return view('user.profile', [
            'section' => 'sejarah',
            'profileData' => $this->profileData
        ]);
    }




    public function showVisiMisi()
    {
        return view('user.profile', [
            'section' => 'visi-misi',
            'profileData' => $this->profileData
        ]);
    }

    public function showStrukturOrganisasi()
    {
        return view('user.profile', [
            'section' => 'struktur-organisasi',
            'profileData' => $this->profileData
        ]);
    }

    public function showMilestone()
    {
        return view('user.profile', [
            'section' => 'milestone',
            'profileData' => $this->profileData
        ]);
    }
}
