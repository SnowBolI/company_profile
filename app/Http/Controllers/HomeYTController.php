<?php

namespace App\Http\Controllers;

use App\Models\HomeYT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeYTController extends Controller
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
          $homeYts = HomeYT::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('homeYts.index', compact('homeYts', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeYts.create');
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
            'linkyt' => 'required'
        ]);
    
        $input = $request->all();
        // if ($gambar = $request->file('gambar')) {
        //     // Simpan gambar ke storage/app/public/data_slider
        //     $gambarPath = $gambar->store('home_youtube', 'public');
        //     $input['gambar'] = $gambarPath;
        // }
    
        HomeYT::create($input);
    
        return redirect('/admin/home_youtube')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeYT  $homeYT
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $homeYT = HomeYT::findOrFail($id);
        return view('homeYts.show', compact('homeYT'));
        
    }
    public function edit($id)
    {
        $homeYT = HomeYT::findOrFail($id);
        return view('homeYts.edit', compact('homeYT'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeYT  $homeYT
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeYT  $homeYT
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'linkyt' => 'required'
        ]);
    
        $input = $request->all();
        // if ($gambar = $request->file('gambar')) {
        //     // Hapus gambar lama jika ada
        //     if ($homeYT->gambar) {
        //         Storage::disk('public')->delete($homeYT->gambar);
        //     }

        //     // Simpan gambar baru ke storage/app/public/data_slider
        //     $gambarPath = $gambar->store('home_youtube', 'public');
        //     $input['gambar'] = $gambarPath;
        // } else {
        //     unset($input['gambar']);
        // }
        $homeYT = HomeYT::findOrFail($id);
        $homeYT->update($input);
    
        return redirect('/admin/home_youtube')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeYT  $homeYT
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Hapus file gambar dari disk storage jika ada
        // if ($homeYT->gambar) {
        //     Storage::disk('public')->delete($homeYT->gambar);
        // }
        $homeYT = HomeYT::findOrFail($id);

        // Hapus data dari database
        $homeYT->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/home_youtube')->with('message', 'Data berhasil dihapus');
    }
}
