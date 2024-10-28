<?php

namespace App\Http\Controllers;

use App\Models\EdukasiBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EdukasiBannerController extends Controller
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
          $edukasiBanners = EdukasiBanner::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('edukasiBanners.index', compact('edukasiBanners', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edukasiBanners.create');
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
            $gambarPath = $gambar->store('edukasi_banner', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        EdukasiBanner::create($input);
    
        return redirect('/admin/edukasi_banner')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EdukasiBanner  $edukasiBanner
     * @return \Illuminate\Http\Response
     */
    public function show(EdukasiBanner $edukasiBanner)
    {
        return view('edukasiBanners.show', compact('edukasiBanner'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EdukasiBanner  $edukasiBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(EdukasiBanner $edukasiBanner)
    {
        return view('edukasiBanners.edit', compact('edukasiBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EdukasiBanner  $edukasiBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EdukasiBanner $edukasiBanner)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($edukasiBanner->gambar) {
                Storage::disk('public')->delete($edukasiBanner->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('edukasi_banner', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $edukasiBanner->update($input);
    
        return redirect('/admin/edukasi_banner')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EdukasiBanner  $edukasiBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(EdukasiBanner $edukasiBanner)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($edukasiBanner->gambar) {
            Storage::disk('public')->delete($edukasiBanner->gambar);
        }

        // Hapus data dari database
        $edukasiBanner->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/edukasi_banner')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
