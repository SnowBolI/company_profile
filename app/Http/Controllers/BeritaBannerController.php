<?php

namespace App\Http\Controllers;

use App\Models\BeritaBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaBannerController extends Controller
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
          $beritaBanners = BeritaBanner::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('beritaBanners.index', compact('beritaBanners', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beritaBanners.create');
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
            $gambarPath = $gambar->store('berita_banner', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        BeritaBanner::create($input);
    
        return redirect('/admin/berita_banner')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BeritaBanner  $beritaBanner
     * @return \Illuminate\Http\Response
     */
    public function show(BeritaBanner $beritaBanner)
    {
        return view('beritaBanners.show', compact('beritaBanner'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeritaBanner  $beritaBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(BeritaBanner $beritaBanner)
    {
        return view('beritaBanners.edit', compact('beritaBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BeritaBanner  $beritaBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeritaBanner $beritaBanner)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($beritaBanner->gambar) {
                Storage::disk('public')->delete($beritaBanner->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('berita_banner', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $beritaBanner->update($input);
    
        return redirect('/admin/berita_banner')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeritaBanner  $beritaBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeritaBanner $beritaBanner)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($beritaBanner->gambar) {
            Storage::disk('public')->delete($beritaBanner->gambar);
        }

        // Hapus data dari database
        $beritaBanner->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/berita_banner')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
