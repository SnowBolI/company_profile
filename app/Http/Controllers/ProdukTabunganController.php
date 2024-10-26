<?php

namespace App\Http\Controllers;

use App\Models\ProdukTabungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukTabunganController extends Controller
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
          $produkTabungans = ProdukTabungan::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('produkTabungans.index', compact('produkTabungans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produkTabungans.create');
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
            'keterangan' => 'required',
            'gambar' => 'required|image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Simpan gambar ke storage/app/public/data_slider
            $gambarPath = $gambar->store('produk_tabungan', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        ProdukTabungan::create($input);
    
        return redirect('/admin/produk_tabungan')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukTabungan  $produkTabungan
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukTabungan $produkTabungan)
    {
        return view('produkTabungans.show', compact('produkTabungan'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukTabungan  $produkTabungan
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukTabungan $produkTabungan)
    {
        return view('produkTabungans.edit', compact('produkTabungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukTabungan  $produkTabungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukTabungan $produkTabungan)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($produkTabungan->gambar) {
                Storage::disk('public')->delete($produkTabungan->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('produk_tabungan', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $produkTabungan->update($input);
    
        return redirect('/admin/produk_tabungan')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukTabungan  $produkTabungan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukTabungan $produkTabungan)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($produkTabungan->gambar) {
            Storage::disk('public')->delete($produkTabungan->gambar);
        }

        // Hapus data dari database
        $produkTabungan->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/produk_tabungan')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
