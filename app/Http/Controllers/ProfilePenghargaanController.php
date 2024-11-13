<?php

namespace App\Http\Controllers;

use App\Models\ProfilePenghargaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilePenghargaanController extends Controller
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
          $profilePenghargaans = ProfilePenghargaan::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('profilePenghargaans.index', compact('profilePenghargaans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profilePenghargaans.create');
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
            $gambarPath = $gambar->store('profile_penghargaan', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        ProfilePenghargaan::create($input);
    
        return redirect('/admin/profile_penghargaan')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilePenghargaan  $profilePenghargaan
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilePenghargaan $profilePenghargaan)
    {
        return view('profilePenghargaans.show', compact('profilePenghargaan'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilePenghargaan  $profilePenghargaan
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilePenghargaan $profilePenghargaan)
    {
        return view('profilePenghargaans.edit', compact('profilePenghargaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilePenghargaan  $profilePenghargaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfilePenghargaan $profilePenghargaan)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($profilePenghargaan->gambar) {
                Storage::disk('public')->delete($profilePenghargaan->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('profile_penghargaan', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $profilePenghargaan->update($input);
    
        return redirect('/admin/profile_penghargaan')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilePenghargaan  $profilePenghargaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilePenghargaan $profilePenghargaan)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($profilePenghargaan->gambar) {
            Storage::disk('public')->delete($profilePenghargaan->gambar);
        }

        // Hapus data dari database
        $profilePenghargaan->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/profile_penghargaan')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
