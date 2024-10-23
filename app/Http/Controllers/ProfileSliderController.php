<?php

namespace App\Http\Controllers;

use App\Models\ProfileSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileSliderController extends Controller
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
          $profileSliders = ProfileSlider::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('profileSliders.index', compact('profileSliders', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profileSliders.create');
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
            $gambarPath = $gambar->store('profile_slider', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        ProfileSlider::create($input);
    
        return redirect('/admin/profile_slider')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileSlider  $profileSlider
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileSlider $profileSlider)
    {
        return view('profileSliders.show', compact('profileSlider'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileSlider  $profileSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileSlider $profileSlider)
    {
        return view('profileSliders.edit', compact('profileSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileSlider  $profileSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileSlider $profileSlider)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($profileSlider->gambar) {
                Storage::disk('public')->delete($profileSlider->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('profile_slider', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $profileSlider->update($input);
    
        return redirect('/admin/profile_slider')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileSlider  $profileSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileSlider $profileSlider)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($profileSlider->gambar) {
            Storage::disk('public')->delete($profileSlider->gambar);
        }

        // Hapus data dari database
        $profileSlider->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/profile_slider')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
