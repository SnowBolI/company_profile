<?php

namespace App\Http\Controllers;

use App\Models\HomeTabungan;
use Illuminate\Http\Request;

class HomeTabunganController extends Controller
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
          $homeTabungans = HomeTabungan::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('homeTabungans.index', compact('homeTabungans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeTabungans.create');
        
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
            'nilai_persentase' => 'required|numeric'
        ]);
    
        $input = $request->all();
    
        $input['nilai_persentase'] = $input['nilai_persentase'] / 100;
        HomeTabungan::create($input);
    
        return redirect('/admin/home_tabungan')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeTabungan  $homeTabungan
     * @return \Illuminate\Http\Response
     */
    public function show(HomeTabungan $homeTabungan)
    {
        return view('homeTabungans.show', compact('homeTabungan'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeTabungan  $homeTabungan
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeTabungan $homeTabungan)
    {
        return view('homeTabungans.edit', compact('homeTabungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeTabungan  $homeTabungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeTabungan $homeTabungan)
    {
        $request->validate([
            'judul' => 'required',
            'nilai_persentase' => 'required|numeric'
        ]);
    
        $input = $request->all();
        $input['nilai_persentase'] = $input['nilai_persentase'] / 100;
        $homeTabungan->update($input);
    
        return redirect('/admin/home_tabungan')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeTabungan  $homeTabungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeTabungan $homeTabungan)
    {
    // Hapus data dari database
    $homeTabungan->delete();

    // Redirect dengan pesan sukses
    return redirect('/admin/home_tabungan')->with('message', 'Data berhasil dihapus beserta gambarnya');
}
}
