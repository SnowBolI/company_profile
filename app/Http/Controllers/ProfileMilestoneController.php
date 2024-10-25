<?php

namespace App\Http\Controllers;

use App\Models\ProfileMilestone;
use Illuminate\Http\Request;

class ProfileMilestoneController extends Controller
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
          $profileMilestones = ProfileMilestone::when($search, function ($query, $search) {
              return $query->where('tahun', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('profileMilestones.index', compact('profileMilestones', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profileMilestones.create');
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
            'tahun' => 'required',
            'keterangan' => 'required'
        ]);
    
        $input = $request->all();
        
    
        ProfileMilestone::create($input);
    
        return redirect('/admin/profile_milestone')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileMilestone  $profileMilestone
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileMilestone $profileMilestone)
    {
        return view('profileMilestones.show', compact('profileMilestone'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileMilestone  $profileMilestone
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileMilestone $profileMilestone)
    {
        return view('profileMilestones.edit', compact('profileMilestone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfileMilestone  $profileMilestone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileMilestone $profileMilestone)
    {
        $request->validate([
            'tahun' => 'required',
            'keterangan' => 'required'
        ]);
    
        $input = $request->all();
        
        $profileMilestone->update($input);
    
        return redirect('/admin/profile_milestone')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileMilestone  $profileMilestone
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileMilestone $profileMilestone)
    {
    

        // Hapus data dari database
        $profileMilestone->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/profile_milestone')->with('message', 'Data berhasil dihapus');
    }
}
