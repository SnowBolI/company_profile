<?php

namespace App\Http\Controllers;

use App\Models\HomeBackground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeBackgroundController extends Controller
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
          $homeBackgrounds = HomeBackground::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('homeBackgrounds.index', compact('homeBackgrounds', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeBackgrounds.create');
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
            $gambarPath = $gambar->store('home_background', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        HomeBackground::create($input);
    
        return redirect('/admin/home_background')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeBackground  $homeBackground
     * @return \Illuminate\Http\Response
     */
    public function show(HomeBackground $homeBackground)
    {
        return view('homeBackgrounds.show', compact('homeBackground'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeBackground  $homeBackground
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeBackground $homeBackground)
    {
        return view('homeBackgrounds.edit', compact('homeBackground'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeBackground  $homeBackground
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeBackground $homeBackground)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($homeBackground->gambar) {
                Storage::disk('public')->delete($homeBackground->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('home_background', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $homeBackground->update($input);
    
        return redirect('/admin/home_background')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeBackground  $homeBackground
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeBackground $homeBackground)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($homeBackground->gambar) {
            Storage::disk('public')->delete($homeBackground->gambar);
        }

        // Hapus data dari database
        $homeBackground->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/home_background')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
