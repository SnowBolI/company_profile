<?php

namespace App\Http\Controllers;

use App\Models\KontakBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KontakBannerController extends Controller
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

          // Query untuk mengambil data produk berdasarkan pencarian dan pagination
          $kontakBanners = KontakBanner::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('kontakBanners.index', compact('kontakBanners', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontakBanners.create');
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
            'gambar' => 'required|image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Simpan gambar ke storage/app/public/data_slider
            $gambarPath = $gambar->store('kontak_banner', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        KontakBanner::create($input);
    
        return redirect('/admin/kontak_banner')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KontakBanner  $kontakBanner
     * @return \Illuminate\Http\Response
     */
    public function show(KontakBanner $kontakBanner)
    {
        return view('kontakBanners.show', compact('kontakBanner'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KontakBanner  $kontakBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(KontakBanner $kontakBanner)
    {
        return view('kontakBanners.edit', compact('kontakBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KontakBanner  $kontakBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KontakBanner $kontakBanner)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($kontakBanner->gambar) {
                Storage::disk('public')->delete($kontakBanner->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('kontak_banner', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $kontakBanner->update($input);
    
        return redirect('/admin/kontak_banner')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KontakBanner  $kontakBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(KontakBanner $kontakBanner)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($kontakBanner->gambar) {
            Storage::disk('public')->delete($kontakBanner->gambar);
        }

        // Hapus data dari database
        $kontakBanner->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/kontak_banner')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
