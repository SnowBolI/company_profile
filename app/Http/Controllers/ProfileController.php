<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileSlider;
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
    $profileSliders = ProfileSlider::orderBy('created_at', 'desc')->take(1)->get();
    
    return view('user.profile', [
        'section' => 'tentang',
        'profileData' => $this->profileData,
        'profileSliders' => $profileSliders
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
