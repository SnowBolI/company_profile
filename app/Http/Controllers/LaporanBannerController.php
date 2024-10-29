<?php

namespace App\Http\Controllers;

use App\Models\LaporanBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanBannerController extends Controller
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
          $laporanBanners = LaporanBanner::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('laporanBanners.index', compact('laporanBanners', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporanBanners.create');
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
            $gambarPath = $gambar->store('laporan_banner', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        LaporanBanner::create($input);
    
        return redirect('/admin/laporan_banner')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanBanner  $laporanBanner
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanBanner $laporanBanner)
    {
        return view('laporanBanners.show', compact('laporanBanner'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanBanner  $laporanBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanBanner $laporanBanner)
    {
        return view('laporanBanners.edit', compact('laporanBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanBanner  $laporanBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanBanner $laporanBanner)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($laporanBanner->gambar) {
                Storage::disk('public')->delete($laporanBanner->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('laporan_banner', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $laporanBanner->update($input);
    
        return redirect('/admin/laporan_banner')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanBanner  $laporanBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanBanner $laporanBanner)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($laporanBanner->gambar) {
            Storage::disk('public')->delete($laporanBanner->gambar);
        }

        // Hapus data dari database
        $laporanBanner->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/laporan_banner')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
