<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
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
    
        // Query untuk mengambil data berita berdasarkan pencarian dan pagination
        $beritas = Berita::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('keterangan', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->paginate(10);
    
        // Atur format tanggal untuk setiap item dalam koleksi
        $beritas->getCollection()->transform(function ($berita) {
            Carbon::setLocale('id'); // Set lokal ke Indonesia
            $berita->tanggal = Carbon::parse($berita->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
            return $berita;
        });
    
        // Mengirimkan data berita dan kata kunci pencarian ke view
        return view('beritas.index', compact('beritas', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beritas.create');

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
            // Simpan gambar ke storage/app/public/admin/berita
            $gambarPath = $gambar->store('berita', 'public');
            $input['gambar'] = $gambarPath;
        }

        Berita::create($input);

        return redirect('/admin/berita')->with('message', 'Data berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        Carbon::setLocale('id'); // Set lokal ke Indonesia
        $berita->tanggal = Carbon::parse($berita->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
    
        return view('beritas.show', compact('berita'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('beritas.edit', compact('berita'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image',
            'tanggal' => 'required|date', // Tambahkan validasi untuk tanggal
        ]);
        $berita = Berita::findOrFail($id);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Carbon::setLocale('id');
        // Mendapatkan nama hari dari tanggal yang diupdate
        $tanggal = Carbon::parse($request->input('tanggal'));
        $input['hari'] = $tanggal->translatedFormat('l'); // Mendapatkan nama hari

        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Simpan gambar baru ke storage/app/public/admin/berita
            $gambarPath = $gambar->store('berita', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }

        $berita->update($input);

        return redirect('/admin/berita')->with('message', 'Data berita berhasil diedit dan gambar lama dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
         // Hapus file gambar dari disk storage jika ada
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // Hapus data dari database
        $berita->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/berita')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
