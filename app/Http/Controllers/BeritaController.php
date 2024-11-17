<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
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
    
        // Query untuk mengambil data berita berdasarkan pencarian dan pagination
        $beritas = Berita::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('keterangan', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->paginate(10);
    
        // Atur format tanggal untuk setiap item dalam koleksi
        $beritas->getCollection()->transform(function ($berita) {
            Carbon::setLocale('id'); // Set lokal ke Indonesia
            $berita->tanggal = Carbon::parse($berita->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
            return $berita;
        });
    
        // Mengirimkan data berita dan kata kunci pencarian ke view
        return view('beritas.index', compact('beritas', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beritas.create');

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
            'gambar_utama' => 'required|image',
            'gambar_2' => 'nullable|image',
            'gambar_3' => 'nullable|image',
            'tanggal' => 'required|date',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Carbon::setLocale('id');
        // Mendapatkan nama hari dari tanggal
        $tanggal = Carbon::parse($request->input('tanggal'));
        $input['hari'] = $tanggal->translatedFormat('l'); // Mendapatkan nama hari dalam bahasa lokal
        $input['slug'] = Str::slug($request->input('judul'));


        // Proses upload gambar utama dan gambar 1 (dengan path berbeda)
        if ($gambarUtama = $request->file('gambar_utama')) {
            $gambarUtamaPath = $gambarUtama->store('berita/utama', 'public'); // Path untuk gambar utama
            $gambar1Path = $gambarUtama->store('berita/gambar_1', 'public'); // Path untuk gambar 1
            $input['gambar_utama'] = $gambarUtamaPath;
            $input['gambar_1'] = $gambar1Path;
        }

        // Proses upload gambar 2 (opsional)
        if ($gambar2 = $request->file('gambar_2')) {
            $gambar2Path = $gambar2->store('berita/gambar2', 'public');
            $input['gambar_2'] = $gambar2Path;
        }

        // Proses upload gambar 3 (opsional)
        if ($gambar3 = $request->file('gambar_3')) {
            $gambar3Path = $gambar3->store('berita/gambar3', 'public');
            $input['gambar_3'] = $gambar3Path;
        }
    
        Berita::create($input);
    
        return redirect('/admin/berita')->with('message', 'Data berita berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        Carbon::setLocale('id'); // Set lokal ke Indonesia
        $berita->tanggal = Carbon::parse($berita->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
    
        return view('beritas.show', compact('berita'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('beritas.edit', compact('berita'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'gambar_utama' => 'nullable|image',
            'gambar_2' => 'nullable|image',
            'gambar_3' => 'nullable|image',
            'tanggal' => 'required|date',
        ]);
    
        $input = $request->all();
        $berita = Berita::findOrFail($id);

        $input['user_id'] = auth()->user()->id;
    
        // Mendapatkan nama hari dari tanggal yang diupdate
        Carbon::setLocale('id');
        $tanggal = Carbon::parse($request->input('tanggal'));
        $input['hari'] = $tanggal->translatedFormat('l'); // Mendapatkan nama hari
        $input['slug'] = Str::slug($request->input('judul'));
    
        // Update gambar utama dan gambar 1
        if ($gambarUtama = $request->file('gambar_utama')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar_utama) {
                Storage::disk('public')->delete($berita->gambar_utama);
            }
            if ($berita->gambar_1) {
                Storage::disk('public')->delete($berita->gambar_1);
            }
    
            // Simpan gambar baru ke path yang berbeda
            $gambarUtamaPath = $gambarUtama->store('berita/utama', 'public');
            $gambar1Path = $gambarUtama->store('berita/gambar_1', 'public');
            $input['gambar_utama'] = $gambarUtamaPath;
            $input['gambar_1'] = $gambar1Path;
        }
    
        // Update gambar 2
        if ($gambar2 = $request->file('gambar_2')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar_2) {
                Storage::disk('public')->delete($berita->gambar_2);
            }
    
            // Simpan gambar baru
            $gambar2Path = $gambar2->store('berita/gambar2', 'public');
            $input['gambar_2'] = $gambar2Path;
        }
    
        // Update gambar 3
        if ($gambar3 = $request->file('gambar_3')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar_3) {
                Storage::disk('public')->delete($berita->gambar_3);
            }
    
            // Simpan gambar baru
            $gambar3Path = $gambar3->store('berita/gambar3', 'public');
            $input['gambar_3'] = $gambar3Path;
        }

        $berita->update($input);

        return redirect('/admin/berita')->with('message', 'Data berita berhasil diedit dan gambar lama dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
       // Hapus file gambar utama dan gambar terkait dari disk storage jika ada
       if ($berita->gambar_utama) {
        Storage::disk('public')->delete($berita->gambar_utama);
    }
    if ($berita->gambar_1) {
        Storage::disk('public')->delete($berita->gambar_1);
    }
    if ($berita->gambar_2) {
        Storage::disk('public')->delete($berita->gambar_2);
    }
    if ($berita->gambar_3) {
        Storage::disk('public')->delete($berita->gambar_3);
    }

        // Hapus data dari database
        $berita->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/berita')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
