<?php

namespace App\Http\Controllers;

use App\Models\ProdukKredit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukKreditController extends Controller
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
          $produkKredits = ProdukKredit::when($search, function ($query, $search) {
              return $query->where('judul', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('produkKredits.index', compact('produkKredits', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produkKredits.create');
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
            $gambarPath = $gambar->store('produk_kredit', 'public');
            $input['gambar'] = $gambarPath;
        }
    
        ProdukKredit::create($input);
    
        return redirect('/admin/produk_kredit')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukKredit  $produkKredit
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukKredit $produkKredit)
    {
        return view('produkKredits.show', compact('produkKredit'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukKredit  $produkKredit
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukKredit $produkKredit)
    {
        return view('produkKredits.edit', compact('produkKredit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukKredit  $produkKredit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdukKredit $produkKredit)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image'
        ]);
    
        $input = $request->all();
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($produkKredit->gambar) {
                Storage::disk('public')->delete($produkKredit->gambar);
            }

            // Simpan gambar baru ke storage/app/public/data_slider
            $gambarPath = $gambar->store('produk_kredit', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $produkKredit->update($input);
    
        return redirect('/admin/produk_kredit')->with('message', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukKredit  $produkKredit
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdukKredit $produkKredit)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($produkKredit->gambar) {
            Storage::disk('public')->delete($produkKredit->gambar);
        }

        // Hapus data dari database
        $produkKredit->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/produk_kredit')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
