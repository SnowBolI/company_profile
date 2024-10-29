<?php

namespace App\Http\Controllers;

use App\Models\KantorBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KantorBannerController extends Controller
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
          $kantorBanners = KantorBanner::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('kantorBanners.index', compact('kantorBanners', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kantorBanners.create');
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
            $gambarPath = $gambar->store('kantor_banner', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        KantorBanner::create($input);
    
        return redirect('/admin/kantor_banner')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KantorBanner  $kantorBanner
     * @return \Illuminate\Http\Response
     */
    public function show(KantorBanner $kantorBanner)
    {
        return view('kantorBanners.show', compact('kantorBanner'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KantorBanner  $kantorBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(KantorBanner $kantorBanner)
    {
        return view('kantorBanners.edit', compact('kantorBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KantorBanner  $kantorBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KantorBanner $kantorBanner)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($kantorBanner->gambar) {
                Storage::disk('public')->delete($kantorBanner->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('kantor_banner', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $kantorBanner->update($input);
    
        return redirect('/admin/kantor_banner')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KantorBanner  $kantorBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(KantorBanner $kantorBanner)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($kantorBanner->gambar) {
            Storage::disk('public')->delete($kantorBanner->gambar);
        }

        // Hapus data dari database
        $kantorBanner->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/kantor_banner')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
