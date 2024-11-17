<?php

namespace App\Http\Controllers;

use App\Models\PesanKontak;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PesanKontakController extends Controller
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
    
        // Query untuk mengambil data pesanKontak berdasarkan pencarian dan pagination
        $pesanKontaks = PesanKontak::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('pesan', 'like', "%{$search}%")
                         ->orWhere('subjek', 'like', "%{$search}%")
                         ->orWhere('tanggal', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->paginate(10);
    
        // Atur format tanggal untuk setiap item dalam koleksi
        $pesanKontaks->getCollection()->transform(function ($pesanKontak) {
            Carbon::setLocale('id'); // Set lokal ke Indonesia
            $pesanKontak->tanggal = Carbon::parse($pesanKontak->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
            return $pesanKontak;
        });
        
    
        // Mengirimkan data pesanKontak dan kata kunci pencarian ke view
        return view('pesanKontaks.index', compact('pesanKontaks', 'search'));
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
     * @param  \App\Models\PesanKontak  $pesanKontak
     * @return \Illuminate\Http\Response
     */
    public function show(PesanKontak $pesanKontak)
    {
        Carbon::setLocale('id'); // Set lokal ke Indonesia
        $pesanKontak->tanggal = Carbon::parse($pesanKontak->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
    
        return view('pesanKontaks.show', compact('pesanKontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesanKontak  $pesanKontak
     * @return \Illuminate\Http\Response
     */
    public function edit(PesanKontak $pesanKontak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PesanKontak  $pesanKontak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesanKontak $pesanKontak)
{
    // Validasi input jika diperlukan (misalnya memastikan status 'dibaca')
    $request->validate([
        'status' => 'required|in:belum dibaca,dibaca',
    ]);

    // Perbarui hanya kolom 'status' menjadi 'dibaca'
    $pesanKontak->update([
        'status' => 'dibaca',
    ]);

    // Redirect atau tampilkan pesan sukses
    return redirect()->route('pesan_kontak.index')->with('success', 'Status pesan berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesanKontak  $pesanKontak
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesanKontak $pesanKontak)
    {
            // Hapus data dari database
            $pesanKontak->delete();

            // Redirect dengan pesan sukses
            return redirect('/admin/dashboard/pesan_kontak')->with('message', 'Data berhasil dihapus');
    }
}
