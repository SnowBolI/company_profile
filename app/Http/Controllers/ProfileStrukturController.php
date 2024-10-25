<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileStruktur;
use Illuminate\Support\Facades\Storage;

class ProfileStrukturController extends Controller
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
          $profileStrukturs = ProfileStruktur::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('profileStrukturs.index', compact('profileStrukturs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profileStrukturs.create');
        
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
            $gambarPath = $gambar->store('profile_struktur', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        ProfileStruktur::create($input);
    
        return redirect('/admin/profile_struktur')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileStruktur  $profileStruktur
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileStruktur $profileStruktur)
    {
        return view('profileStrukturs.show', compact('profileStruktur'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileStruktur  $profileStruktur
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileStruktur $profileStruktur)
    {
        return view('profileStrukturs.edit', compact('profileStruktur'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileStruktur  $profileStruktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileStruktur $profileStruktur)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($profileStruktur->gambar) {
                Storage::disk('public')->delete($profileStruktur->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('profile_struktur', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $profileStruktur->update($input);
    
        return redirect('/admin/profile_struktur')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileStruktur  $profileStruktur
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileStruktur $profileStruktur)
    {
       // Hapus file gambar dari disk storage jika ada
       if ($profileStruktur->gambar) {
        Storage::disk('public')->delete($profileStruktur->gambar);
    }

    // Hapus data dari database
    $profileStruktur->delete();

    // Redirect dengan pesan sukses
    return redirect('/admin/profile_struktur')->with('message', 'Data berhasil dihapus beserta gambarnya');
}
}
