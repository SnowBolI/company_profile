<?php

namespace App\Http\Controllers;

use App\Models\HomeDeposito;
use Illuminate\Http\Request;

class HomeDepositoController extends Controller
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
          $homeDepositos = HomeDeposito::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('homeDepositos.index', compact('homeDepositos', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('homeDepositos.create');
        
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
        HomeDeposito::create($input);
    
        return redirect('/admin/home_deposito')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeDeposito  $homeDeposito
     * @return \Illuminate\Http\Response
     */
    public function show(HomeDeposito $homeDeposito)
    {
        return view('homeDepositos.show', compact('homeDeposito'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeDeposito  $homeDeposito
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeDeposito $homeDeposito)
    {
        return view('homeDepositos.edit', compact('homeDeposito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeDeposito  $homeDeposito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeDeposito $homeDeposito)
    {
        $request->validate([
            'judul' => 'required',
            'nilai_persentase' => 'required|numeric'
        ]);
    
        $input = $request->all();
        $input['nilai_persentase'] = $input['nilai_persentase'] / 100;
        $homeDeposito->update($input);
    
        return redirect('/admin/home_deposito')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeDeposito  $homeDeposito
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeDeposito $homeDeposito)
    {
    // Hapus data dari database
    $homeDeposito->delete();

    // Redirect dengan pesan sukses
    return redirect('/admin/home_deposito')->with('message', 'Data berhasil dihapus beserta gambarnya');
}
}
