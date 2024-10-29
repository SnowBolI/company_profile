<?php

namespace App\Http\Controllers;

use App\Models\KarirBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KarirBannerController extends Controller
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
          $karirBanners = KarirBanner::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('karirBanners.index', compact('karirBanners', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karirBanners.create');
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
            $gambarPath = $gambar->store('karir_banner', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        KarirBanner::create($input);
    
        return redirect('/admin/karir_banner')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KarirBanner  $karirBanner
     * @return \Illuminate\Http\Response
     */
    public function show(KarirBanner $karirBanner)
    {
        return view('karirBanners.show', compact('karirBanner'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KarirBanner  $karirBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(KarirBanner $karirBanner)
    {
        return view('karirBanners.edit', compact('karirBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KarirBanner  $karirBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KarirBanner $karirBanner)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($karirBanner->gambar) {
                Storage::disk('public')->delete($karirBanner->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('karir_banner', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $karirBanner->update($input);
    
        return redirect('/admin/karir_banner')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KarirBanner  $karirBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(KarirBanner $karirBanner)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($karirBanner->gambar) {
            Storage::disk('public')->delete($karirBanner->gambar);
        }

        // Hapus data dari database
        $karirBanner->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/karir_banner')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
