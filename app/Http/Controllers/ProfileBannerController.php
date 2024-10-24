<?php

namespace App\Http\Controllers;

use App\Models\ProfileBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileBannerController extends Controller
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
          $profileBanners = ProfileBanner::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('profileBanners.index', compact('profileBanners', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profileBanners.create');
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
            $gambarPath = $gambar->store('profile_banner', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        ProfileBanner::create($input);
    
        return redirect('/admin/profile_banner')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileBanner  $profileBanner
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileBanner $profileBanner)
    {
        return view('profileBanners.show', compact('profileBanner'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileBanner  $profileBanner
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileBanner $profileBanner)
    {
        return view('profileBanners.edit', compact('profileBanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileBanner  $profileBanner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileBanner $profileBanner)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($profileBanner->gambar) {
                Storage::disk('public')->delete($profileBanner->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('profile_banner', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $profileBanner->update($input);
    
        return redirect('/admin/profile_banner')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileBanner  $profileBanner
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileBanner $profileBanner)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($profileBanner->gambar) {
            Storage::disk('public')->delete($profileBanner->gambar);
        }

        // Hapus data dari database
        $profileBanner->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/profile_banner')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
