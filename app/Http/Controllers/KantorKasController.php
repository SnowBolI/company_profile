<?php

namespace App\Http\Controllers;

use App\Models\KantorKas;
use Illuminate\Support\Str;
use App\Models\KantorCabang;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class KantorKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $idkantorcabang)
    {
        // Mendapatkan kata kunci pencarian dari request
        $search = $request->input('search');
        $namaCabang =  KantorCabang::findOrFail($idkantorcabang);
        // Query untuk mengambil data kantor kas berdasarkan pencarian dan pagination
        $kantorKass = KantorKas::where('kantor_cabang_id', $idkantorcabang)
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%{$search}%");
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        // Mengirimkan data kantor kas, kata kunci pencarian, dan id kantor cabang ke view
        return view('kantorKass.index', compact('kantorKass', 'idkantorcabang', 'search', 'namaCabang'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idkantorcabang)

    {
        $namaCabang =  KantorCabang::findOrFail($idkantorcabang);

        // Dapatkan data cabang berdasarkan ID
        $kantorCabang = KantorCabang::findOrFail($idkantorcabang);


        // Kirim data cabang ke form create kantor kas
        return view('kantorKass.create', compact('kantorCabang','namaCabang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idkantorcabang)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'gmap' => 'required',
            'telepon' => 'required',
            'gambar' => 'required|image'
        ]);

        // Simpan data kantor kas dengan mengaitkan ke kantor kas
        $input = $request->all();
        
        if ($gambar = $request->file('gambar')) {
            // Simpan gambar ke storage/app/public/kantor_kas
            $gambarPath = $gambar->store('kantor_kas', 'public');
            $input['gambar'] = $gambarPath;
        }
        $input['kantor_cabang_id'] = $idkantorcabang;
        $input['slug'] = Str::slug($request->input('nama'));

        KantorKas::create($input);

        return redirect()->route('kantor_kas.index', $idkantorcabang)
        ->with('message', 'Data kantor kas berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KantorKas  $kantorKas
     * @return \Illuminate\Http\Response
     */
    // public function show($idkantorcabang, kantorKas $kantorKas)
    // {
    //     return view('kantorKas.show', compact('kantorKas','idkantorcabang'));
    // }
    public function show($idkantorcabang, $idkantorKas)
    {
        $namaCabang =  KantorCabang::findOrFail($idkantorcabang);

        $kantorKas = KantorKas::find($idkantorKas); // Query manual
        // dd($kantorKas, $idkantorcabang);
        return view('kantorKass.show', compact('kantorKas', 'idkantorcabang','namaCabang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KantorKas  $kantorKas
     * @return \Illuminate\Http\Response
     */
    public function edit($idkantorcabang, $idkantorKas)
    {
        $namaCabang =  KantorCabang::findOrFail($idkantorcabang);

        $kantorKas = KantorKas::find($idkantorKas); // Query manual
        // dd($kantorKas, $idkantorcabang);
        return view('kantorKass.edit', compact('kantorKas', 'idkantorcabang', 'namaCabang'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KantorKas  $kantorKas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idkantorcabang, $idkantorKas)
    {
        $kantorKas = KantorKas::find($idkantorKas); // Query manual

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
            if ($kantorKas->gambar) {
                Storage::disk('public')->delete($kantorKas->gambar);
            }

            // Simpan gambar baru ke storage/app/public/kantor_cabang
            $gambarPath = $gambar->store('kantor_kas', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }
        $input['kantor_cabang_id'] = $idkantorcabang;

        $kantorKas->update($input);

        return redirect()->route('kantor_kas.index', $idkantorcabang)
        ->with('message', 'Data kantor kas berhasil diedit');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KantorKas  $kantorKas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $idkantorcabang, $idkantorKas)
    {
        $kantorKas = KantorKas::find($idkantorKas); // Query manual
        // Hapus file gambar dari disk storage jika ada
        if ($kantorKas->gambar) {
            Storage::disk('public')->delete($kantorKas->gambar);
        }

        // Hapus data dari database
        $kantorKas->delete();

        return redirect()->route('kantor_kas.index', $idkantorcabang)
        ->with('message', 'Data berhasil dihapus beserta gambarnya');

    }
}
