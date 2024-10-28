<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Edukasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EdukasiController extends Controller
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
    
        // Query untuk mengambil data edukasi berdasarkan pencarian dan pagination
        $edukasis = Edukasi::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('keterangan', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->paginate(10);
    
        // Atur format tanggal untuk setiap item dalam koleksi
        $edukasis->getCollection()->transform(function ($edukasi) {
            Carbon::setLocale('id'); // Set lokal ke Indonesia
            $edukasi->tanggal = Carbon::parse($edukasi->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
            return $edukasi;
        });
    
        // Mengirimkan data edukasi dan kata kunci pencarian ke view
        return view('edukasis.index', compact('edukasis', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edukasis.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'required|image',
            'tanggal' => 'required|date', // Tambahkan validasi untuk tanggal
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Carbon::setLocale('id');
        // Mendapatkan nama hari dari tanggal
        $tanggal = Carbon::parse($request->input('tanggal'));
        $input['hari'] = $tanggal->translatedFormat('l'); // Mendapatkan nama hari dalam bahasa lokal

        if ($gambar = $request->file('gambar')) {
            // Simpan gambar ke storage/app/public/admin/edukasi
            $gambarPath = $gambar->store('edukasi', 'public');
            $input['gambar'] = $gambarPath;
        }

        Edukasi::create($input);

        return redirect('/admin/edukasi')->with('message', 'Data edukasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function show(Edukasi $edukasi)
    {
        Carbon::setLocale('id'); // Set lokal ke Indonesia
        $edukasi->tanggal = Carbon::parse($edukasi->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
    
        return view('edukasis.show', compact('edukasi'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Edukasi $edukasi)
    {
        return view('edukasis.edit', compact('edukasi'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edukasi $edukasi)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image',
            'tanggal' => 'required|date', // Tambahkan validasi untuk tanggal
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Carbon::setLocale('id');
        // Mendapatkan nama hari dari tanggal yang diupdate
        $tanggal = Carbon::parse($request->input('tanggal'));
        $input['hari'] = $tanggal->translatedFormat('l'); // Mendapatkan nama hari

        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($edukasi->gambar) {
                Storage::disk('public')->delete($edukasi->gambar);
            }

            // Simpan gambar baru ke storage/app/public/admin/edukasi
            $gambarPath = $gambar->store('edukasi', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }

        $edukasi->update($input);

        return redirect('/admin/edukasi')->with('message', 'Data edukasi berhasil diedit dan gambar lama dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edukasi $edukasi)
    {
         // Hapus file gambar dari disk storage jika ada
        if ($edukasi->gambar) {
            Storage::disk('public')->delete($edukasi->gambar);
        }

        // Hapus data dari database
        $edukasi->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/edukasi')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
