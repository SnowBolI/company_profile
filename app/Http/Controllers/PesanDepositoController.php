<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesanDeposito;
use Illuminate\Support\Carbon;

class PesanDepositoController extends Controller
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
    
        // Query untuk mengambil data pesanDeposito berdasarkan pencarian dan pagination
        $pesanDepositos = PesanDeposito::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('alamat', 'like', "%{$search}%")
                         ->orWhere('hp', 'like', "%{$search}%")
                         ->orWhere('ktp', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%")
                         ->orWhere('subjek', 'like', "%{$search}%")
                         ->orWhere('setoran_awal', 'like', "%{$search}%")
                         ->orWhere('tipe_deposito', 'like', "%{$search}%")
                         ->orWhere('tanggal', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->paginate(10);
    
        // Atur format tanggal untuk setiap item dalam koleksi
        $pesanDepositos->getCollection()->transform(function ($pesanDeposito) {
            Carbon::setLocale('id'); // Set lokal ke Indonesia
            $pesanDeposito->tanggal = Carbon::parse($pesanDeposito->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
            return $pesanDeposito;
        });
        
    
        // Mengirimkan data pesanDeposito dan kata kunci pencarian ke view
        return view('pesanDepositos.index', compact('pesanDepositos', 'search'));
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
     * @param  \App\Models\PesanDeposito  $pesanDeposito
     * @return \Illuminate\Http\Response
     */
    public function show(PesanDeposito $pesanDeposito)
    {
        Carbon::setLocale('id'); // Set lokal ke Indonesia
        $pesanDeposito->tanggal = Carbon::parse($pesanDeposito->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
    
        return view('pesanDepositos.show', compact('pesanDeposito'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PesanDeposito  $pesanDeposito
     * @return \Illuminate\Http\Response
     */
    public function edit(PesanDeposito $pesanDeposito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PesanDeposito  $pesanDeposito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PesanDeposito $pesanDeposito)
    {
        // Validasi input jika diperlukan (misalnya memastikan status 'dibaca')
        $request->validate([
            'status' => 'required|in:belum dibaca,dibaca',
        ]);
    
        // Perbarui hanya kolom 'status' menjadi 'dibaca'
        $pesanDeposito->update([
            'status' => 'dibaca',
        ]);
    
        // Redirect atau tampilkan pesan sukses
        return redirect()->route('pesan_deposito.index')->with('success', 'Status pesan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PesanDeposito  $pesanDeposito
     * @return \Illuminate\Http\Response
     */
    public function destroy(PesanDeposito $pesanDeposito)
    {
        // Hapus data dari database
        $pesanDeposito->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/dashboard/pesan_deposito')->with('message', 'Data berhasil dihapus');
}
}
