<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Karir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KarirController extends Controller
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
    
        // Query untuk mengambil data karir berdasarkan pencarian dan pagination
        $karirs = Karir::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('keterangan', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->paginate(10);
    
        // Atur format tanggal untuk setiap item dalam koleksi
        $karirs->getCollection()->transform(function ($karir) {
            Carbon::setLocale('id'); // Set lokal ke Indonesia
            $karir->tanggal = Carbon::parse($karir->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
            return $karir;
        });
    
        // Mengirimkan data karir dan kata kunci pencarian ke view
        return view('karirs.index', compact('karirs', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('karirs.create');

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
            'gambar' => 'required|image',
            'tanggal' => 'required|date', // Tambahkan validasi untuk tanggal
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Carbon::setLocale('id');
        // Mendapatkan nama hari dari tanggal
        $tanggal = Carbon::parse($request->input('tanggal'));
        $input['hari'] = $tanggal->translatedFormat('l'); // Mendapatkan nama hari dalam bahasa lokal

        if ($gambar = $request->file('gambar')) {
            // Simpan gambar ke storage/app/public/admin/karir
            $gambarPath = $gambar->store('Karir', 'public');
            $input['gambar'] = $gambarPath;
        }

        Karir::create($input);

        return redirect('/admin/karir')->with('message', 'Data karir berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\karir  $karir
     * @return \Illuminate\Http\Response
     */
    public function show(Karir $karir)
    {
        Carbon::setLocale('id'); // Set lokal ke Indonesia
        $karir->tanggal = Carbon::parse($karir->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
    
        return view('karirs.show', compact('karir'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karir  $karir
     * @return \Illuminate\Http\Response
     */
    public function edit(Karir $karir)
    {
        return view('karirs.edit', compact('karir'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karir  $karir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karir $karir)
    {
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar' => 'image',
            'tanggal' => 'required|date', // Tambahkan validasi untuk tanggal
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Carbon::setLocale('id');
        // Mendapatkan nama hari dari tanggal yang diupdate
        $tanggal = Carbon::parse($request->input('tanggal'));
        $input['hari'] = $tanggal->translatedFormat('l'); // Mendapatkan nama hari

        if ($gambar = $request->file('gambar')) {
            // Hapus gambar lama jika ada
            if ($karir->gambar) {
                Storage::disk('public')->delete($karir->gambar);
            }

            // Simpan gambar baru ke storage/app/public/admin/karir
            $gambarPath = $gambar->store('Karir', 'public');
            $input['gambar'] = $gambarPath;
        } else {
            unset($input['gambar']);
        }

        $karir->update($input);

        return redirect('/admin/karir')->with('message', 'Data karir berhasil diedit dan gambar lama dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karir  $karir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karir $karir)
    {
         // Hapus file gambar dari disk storage jika ada
        if ($karir->gambar) {
            Storage::disk('public')->delete($karir->gambar);
        }

        // Hapus data dari database
        $karir->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/karir')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
