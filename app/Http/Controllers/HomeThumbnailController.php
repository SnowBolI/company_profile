<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeThumbnail;
use Illuminate\Support\Facades\Storage;

class HomeThumbnailController extends Controller
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
          $homeThumbnails = HomeThumbnail::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('homeThumbnails.index', compact('homeThumbnails', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeThumbnails.create');
        
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
            $gambarPath = $gambar->store('home_thumbnail', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        HomeThumbnail::create($input);
    
        return redirect('/admin/home_thumbnail')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeThumbnail  $homeThumbnail
     * @return \Illuminate\Http\Response
     */
    public function show(HomeThumbnail $homeThumbnail)
    {
        return view('homeThumbnails.show', compact('homeThumbnail'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeThumbnail  $homeThumbnail
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeThumbnail $homeThumbnail)
    {
        return view('homeThumbnails.edit', compact('homeThumbnail'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeThumbnail  $homeThumbnail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeThumbnail $homeThumbnail)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($homeThumbnail->gambar) {
                Storage::disk('public')->delete($homeThumbnail->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('home_thumbnail', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $homeThumbnail->update($input);
    
        return redirect('/admin/home_thumbnail')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeThumbnail  $homeThumbnail
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeThumbnail $homeThumbnail)
    {
       // Hapus file gambar dari disk storage jika ada
       if ($homeThumbnail->gambar) {
        Storage::disk('public')->delete($homeThumbnail->gambar);
    }

    // Hapus data dari database
    $homeThumbnail->delete();

    // Redirect dengan pesan sukses
    return redirect('/admin/home_thumbnail')->with('message', 'Data berhasil dihapus beserta gambarnya');
}
}
