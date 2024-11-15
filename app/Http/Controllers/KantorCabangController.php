<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\KantorCabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KantorCabangController extends Controller
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
       $kantorCabangs = KantorCabang::when($search, function ($query, $search) {
           return $query->where('nama', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->paginate(10);

       // Mengirimkan data produk dan kata kunci pencarian ke view
        return view('kantorCabangs.index', compact('kantorCabangs', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kantorCabangs.create');
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
            'alamat' => 'required',
            'gmap' => 'required',
            'telepon' => 'required',
            'gambar' => 'required|image'
        ]);

        $input = $request->all();
        
        if ($gambar = $request->file('gambar')) {
            // Simpan gambar ke storage/app/public/admin/kantor_cabang
            $gambarPath = $gambar->store('kantor_cabang', 'public');
            $input['gambar'] = $gambarPath;
        }
        $input['slug'] = Str::slug($request->input('nama'));

        KantorCabang::create($input);

        return redirect('/admin/kantor_cabang')->with('message', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KantorCabang  $kantorCabang
     * @return \Illuminate\Http\Response
     */
    public function show(KantorCabang $kantorCabang)
    {
        // dd($kantorCabang);
        return view('kantorCabangs.show', compact('kantorCabang'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KantorCabang  $kantorCabang
     * @return \Illuminate\Http\Response
     */
    public function edit(KantorCabang $kantorCabang)
    {
        return view('kantorCabangs.edit', compact('kantorCabang'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KantorCabang  $kantorCabang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KantorCabang $kantorCabang)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'gmap' => 'required',
            'telepon' => 'required',
            'gambar' => 'image'
        ]);

        $input = $request->all();
        $input['slug'] = Str::slug($request->input('nama'));
        
        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($kantorCabang->gambar) {
                Storage::disk('public')->delete($kantorCabang->gambar);
            }

            // Simpan gambar baru ke storage/app/public/admin/kantor_cabang
            $gambarPath = $gambar->store('kantor_cabang', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }

        $kantorCabang->update($input);

        return redirect('/admin/kantor_cabang')->with('message', 'Data berhasil diedit');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KantorCabang  $kantorCabang
     * @return \Illuminate\Http\Response
     */
    public function destroy(KantorCabang $kantorCabang)
    {
        // Hapus file gambar dari disk storage jika ada
        if ($kantorCabang->gambar) {
            Storage::disk('public')->delete($kantorCabang->gambar);
        }

        // Hapus data dari database
        $kantorCabang->delete();

        return redirect('/admin/kantor_cabang')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }

}
