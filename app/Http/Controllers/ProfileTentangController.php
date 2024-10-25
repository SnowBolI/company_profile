<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileTentang;
use Illuminate\Support\Facades\Storage;

class ProfileTentangController extends Controller
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
          $profileTentangs = ProfileTentang::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('profileTentangs.index', compact('profileTentangs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profileTentangs.create');
        
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
            'nama' => 'required',
            'jabatan' => 'required',
            'gambar' => 'required|image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Simpan gambar ke storage/app/public/data_slider
            $gambarPath = $gambar->store('profile_tentang', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        ProfileTentang::create($input);
    
        return redirect('/admin/profile_tentang')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileTentang  $profileTentang
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileTentang $profileTentang)
    {
        return view('profileTentangs.show', compact('profileT$profileTentang'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileTentang  $profileTentang
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileTentang $profileTentang)
    {
        return view('profileTentangs.edit', compact('profileT$profileTentang'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileTentang  $profileTentang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileTentang $profileTentang)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($profileTentang->gambar) {
                Storage::disk('public')->delete($profileTentang->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('profile_tentang', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $profileTentang->update($input);
    
        return redirect('/admin/profile_tentang')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileTentang  $profileTentang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileTentang $profileTentang)
    {
       // Hapus file gambar dari disk storage jika ada
       if ($profileTentang->gambar) {
        Storage::disk('public')->delete($profileTentang->gambar);
    }

    // Hapus data dari database
    $profileTentang->delete();

    // Redirect dengan pesan sukses
    return redirect('/admin/profile_tentang')->with('message', 'Data berhasil dihapus beserta gambarnya');
}
}
