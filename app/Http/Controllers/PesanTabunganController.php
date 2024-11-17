<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesanTabungan;
use Illuminate\Support\Carbon;

class PesanTabunganController extends Controller
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
    
        // Query untuk mengambil data pesanTabungan berdasarkan pencarian dan pagination
        $pesanTabungans = PesanTabungan::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('alamat', 'like', "%{$search}%")
                         ->orWhere('hp', 'like', "%{$search}%")
                         ->orWhere('ktp', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('subjek', 'like', "%{$search}%")
                         ->orWhere('setoran_awal', 'like', "%{$search}%")
                         ->orWhere('tipe_tabungan', 'like', "%{$search}%")
                         ->orWhere('tanggal', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->paginate(10);
    
        // Atur format tanggal untuk setiap item dalam koleksi
        $pesanTabungans->getCollection()->transform(function ($pesanTabungan) {
            Carbon::setLocale('id'); // Set lokal ke Indonesia
            $pesanTabungan->tanggal = Carbon::parse($pesanTabungan->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
            return $pesanTabungan;
        });
        
    
        // Mengirimkan data pesanTabungan dan kata kunci pencarian ke view
        return view('pesanTabungans.index', compact('pesanTabungans', 'search'));
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
     * @param  \App\Models\PesanTabungan  $pesanTabungan
     * @return \Illuminate\Http\Response
     */
    public function show(PesanTabungan $pesanTabungan)
    {
        Carbon::setLocale('id'); // Set lokal ke Indonesia
        $pesanTabungan->tanggal = Carbon::parse($pesanTabungan->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
    
        return view('pesanTabungans.show', compact('pesanTabungan'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesanTabungan  $pesanTabungan
     * @return \Illuminate\Http\Response
     */
    public function edit(PesanTabungan $pesanTabungan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PesanTabungan  $pesanTabungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesanTabungan $pesanTabungan)
    {
        // Validasi input jika diperlukan (misalnya memastikan status 'dibaca')
        $request->validate([
            'status' => 'required|in:belum dibaca,dibaca',
        ]);
    
        // Perbarui hanya kolom 'status' menjadi 'dibaca'
        $pesanTabungan->update([
            'status' => 'dibaca',
        ]);
    
        // Redirect atau tampilkan pesan sukses
        return redirect()->route('pesan_tabungan.index')->with('success', 'Status pesan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesanTabungan  $pesanTabungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesanTabungan $pesanTabungan)
    {
               // Hapus data dari database
               $pesanTabungan->delete();

               // Redirect dengan pesan sukses
               return redirect('/admin/dashboard/pesan_tabungan')->with('message', 'Data berhasil dihapus');
       }
}
