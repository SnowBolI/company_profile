<?php

namespace App\Http\Controllers;

use App\Models\ProdukBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukBannerController extends Controller
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
          $produkBanners = ProdukBanner::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('produkBanners.index', compact('produkBanners', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produkBanners.create');
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
            $gambarPath = $gambar->store('produk_banner', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        ProdukBanner::create($input);
    
        return redirect('/admin/produk_banner')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukBanner  $produkBanner
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukBanner $produkBanner)
    {
        return view('produkBanners.show', compact('produkBanner'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukBanner  $produkBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukBanner $produkBanner)
    {
        return view('produkBanners.edit', compact('produkBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukBanner  $produkBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukBanner $produkBanner)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($produkBanner->gambar) {
                Storage::disk('public')->delete($produkBanner->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('produk_banner', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $produkBanner->update($input);
    
        return redirect('/admin/produk_banner')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukBanner  $produkBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukBanner $produkBanner)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($produkBanner->gambar) {
            Storage::disk('public')->delete($produkBanner->gambar);
        }

        // Hapus data dari database
        $produkBanner->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/produk_banner')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
