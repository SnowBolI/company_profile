<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Edukasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EdukasiController extends Controller
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
    
        // Query untuk mengambil data edukasi berdasarkan pencarian dan pagination
        $edukasis = Edukasi::when($search, function ($query, $search) {
            return $query->where('judul', 'like', "%{$search}%")
                         ->orWhere('keterangan', 'like', "%{$search}%");
        })->orderBy('updated_at', 'desc')->paginate(10);
    
        // Atur format tanggal untuk setiap item dalam koleksi
        $edukasis->getCollection()->transform(function ($edukasi) {
            Carbon::setLocale('id'); // Set lokal ke Indonesia
            $edukasi->tanggal = Carbon::parse($edukasi->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
            return $edukasi;
        });
    
        // Mengirimkan data edukasi dan kata kunci pencarian ke view
        return view('edukasis.index', compact('edukasis', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('edukasis.create');

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
            $gambarUtamaPath = $gambarUtama->store('edukasi/utama', 'public'); // Path untuk gambar utama
            $gambar1Path = $gambarUtama->store('edukasi/gambar_1', 'public'); // Path untuk gambar 1
            $input['gambar_utama'] = $gambarUtamaPath;
            $input['gambar_1'] = $gambar1Path;
        }

        // Proses upload gambar 2 (opsional)
        if ($gambar2 = $request->file('gambar_2')) {
            $gambar2Path = $gambar2->store('edukasi/gambar2', 'public');
            $input['gambar_2'] = $gambar2Path;
        }

        // Proses upload gambar 3 (opsional)
        if ($gambar3 = $request->file('gambar_3')) {
            $gambar3Path = $gambar3->store('edukasi/gambar3', 'public');
            $input['gambar_3'] = $gambar3Path;
        }

        Edukasi::create($input);

        return redirect('/admin/edukasi')->with('message', 'Data edukasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function show(Edukasi $edukasi)
    {
        Carbon::setLocale('id'); // Set lokal ke Indonesia
        $edukasi->tanggal = Carbon::parse($edukasi->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
    
        return view('edukasis.show', compact('edukasi'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Edukasi $edukasi)
    {
        return view('edukasis.edit', compact('edukasi'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Edukasi $edukasi)
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
        $input['user_id'] = auth()->user()->id;
    
        // Mendapatkan nama hari dari tanggal yang diupdate
        Carbon::setLocale('id');
        $tanggal = Carbon::parse($request->input('tanggal'));
        $input['hari'] = $tanggal->translatedFormat('l'); // Mendapatkan nama hari
        $input['slug'] = Str::slug($request->input('judul'));
    
        // Update gambar utama dan gambar 1
        if ($gambarUtama = $request->file('gambar_utama')) {
            // Hapus gambar lama jika ada
            if ($edukasi->gambar_utama) {
                Storage::disk('public')->delete($edukasi->gambar_utama);
            }
            if ($edukasi->gambar_1) {
                Storage::disk('public')->delete($edukasi->gambar_1);
            }
    
            // Simpan gambar baru ke path yang berbeda
            $gambarUtamaPath = $gambarUtama->store('edukasi/utama', 'public');
            $gambar1Path = $gambarUtama->store('edukasi/gambar_1', 'public');
            $input['gambar_utama'] = $gambarUtamaPath;
            $input['gambar_1'] = $gambar1Path;
        }
    
        // Update gambar 2
        if ($gambar2 = $request->file('gambar_2')) {
            // Hapus gambar lama jika ada
            if ($edukasi->gambar_2) {
                Storage::disk('public')->delete($edukasi->gambar_2);
            }
    
            // Simpan gambar baru
            $gambar2Path = $gambar2->store('edukasi/gambar2', 'public');
            $input['gambar_2'] = $gambar2Path;
        }
    
        // Update gambar 3
        if ($gambar3 = $request->file('gambar_3')) {
            // Hapus gambar lama jika ada
            if ($edukasi->gambar_3) {
                Storage::disk('public')->delete($edukasi->gambar_3);
            }
    
            // Simpan gambar baru
            $gambar3Path = $gambar3->store('edukasi/gambar3', 'public');
            $input['gambar_3'] = $gambar3Path;
        }

        $edukasi->update($input);

        return redirect('/admin/edukasi')->with('message', 'Data edukasi berhasil diedit dan gambar lama dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Edukasi  $edukasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edukasi $edukasi)
    {
       // Hapus file gambar utama dan gambar terkait dari disk storage jika ada
       if ($edukasi->gambar_utama) {
        Storage::disk('public')->delete($edukasi->gambar_utama);
    }
    if ($edukasi->gambar_1) {
        Storage::disk('public')->delete($edukasi->gambar_1);
    }
    if ($edukasi->gambar_2) {
        Storage::disk('public')->delete($edukasi->gambar_2);
    }
    if ($edukasi->gambar_3) {
        Storage::disk('public')->delete($edukasi->gambar_3);
    }
        // Hapus data dari database
        $edukasi->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/edukasi')->with('message', 'Data berhasil dihapus beserta gambarnya');
    }
}
