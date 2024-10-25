<?php

namespace App\Http\Controllers;

use App\Models\ProfileSejarahVisi;
use Illuminate\Http\Request;

class ProfileSejarahVisiController extends Controller
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
          $profileSejarahVisis = ProfileSejarahVisi::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('profileSejarahVisis.index', compact('profileSejarahVisis', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profileSejarahVisis.create');
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
            'konten' => 'required'
        ]);
    
        $input = $request->all();
        
    
        ProfileSejarahVisi::create($input);
    
        return redirect('/admin/profile_sejarah_visi')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileSejarahVisi  $profileSejarahVisi
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileSejarahVisi $profileSejarahVisi)
    {
        return view('profileSejarahVisis.show', compact('profileSejarahVisi'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileSejarahVisi  $profileSejarahVisi
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileSejarahVisi $profileSejarahVisi)
    {
        return view('profileSejarahVisis.edit', compact('profileSejarahVisi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileSejarahVisi  $profileSejarahVisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileSejarahVisi $profileSejarahVisi)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required'
        ]);
    
        $input = $request->all();
        
        $profileSejarahVisi->update($input);
    
        return redirect('/admin/profile_sejarah_visi')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileSejarahVisi  $profileSejarahVisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileSejarahVisi $profileSejarahVisi)
    {
    

        // Hapus data dari database
        $profileSejarahVisi->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/profile_sejarah_visi')->with('message', 'Data berhasil dihapus');
    }
}
