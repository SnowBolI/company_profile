<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PesanKredit;
use Illuminate\Http\Request;

class PesanKreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Mendapatkan kata kunci pencarian dari request
        $search = $request->input('search');
    
        // Query untuk mengambil data pesanKredit berdasarkan pencarian dan pagination
        $pesanKredits = PesanKredit::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('alamat', 'like', "%{$search}%")
                         ->orWhere('hp', 'like', "%{$search}%")
                         ->orWhere('ktp', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('subjek', 'like', "%{$search}%")
                         ->orWhere('jumlah_pinjaman', 'like', "%{$search}%")
                         ->orWhere('waktu_pinjaman', 'like', "%{$search}%")
                         ->orWhere('tujuan_pinjaman', 'like', "%{$search}%")
                         ->orWhere('jaminan', 'like', "%{$search}%")
                         ->orWhere('tanggal', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->paginate(10);
    
        // Atur format tanggal untuk setiap item dalam koleksi
        $pesanKredits->getCollection()->transform(function ($pesanKredit) {
            Carbon::setLocale('id'); // Set lokal ke Indonesia
            $pesanKredit->tanggal = Carbon::parse($pesanKredit->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
            return $pesanKredit;
        });
        
    
        // Mengirimkan data pesanKredit dan kata kunci pencarian ke view
        return view('pesanKredits.index', compact('pesanKredits', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PesanKredit  $pesanKredit
     * @return \Illuminate\Http\Response
     */
    public function show(PesanKredit $pesanKredit)
    {
        Carbon::setLocale('id'); // Set lokal ke Indonesia
        $pesanKredit->tanggal = Carbon::parse($pesanKredit->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
    
        return view('pesanKredits.show', compact('pesanKredit'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesanKredit  $pesanKredit
     * @return \Illuminate\Http\Response
     */
    public function edit(PesanKredit $pesanKredit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PesanKredit  $pesanKredit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesanKredit $pesanKredit)
    {
           // Validasi input jika diperlukan (misalnya memastikan status 'dibaca')
           $request->validate([
            'status' => 'required|in:belum dibaca,dibaca',
        ]);
    
        // Perbarui hanya kolom 'status' menjadi 'dibaca'
        $pesanKredit->update([
            'status' => 'dibaca',
        ]);
    
        // Redirect atau tampilkan pesan sukses
        return redirect()->route('pesan_kredit.index')->with('success', 'Status pesan berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesanKredit  $pesanKredit
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesanKredit $pesanKredit)
    {
        $pesanKredit->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/dashboard/pesan_kredit')->with('message', 'Data berhasil dihapus');
}
}
