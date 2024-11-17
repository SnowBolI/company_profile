<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Karir;
use Illuminate\Support\Str;
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
            $gambarUtamaPath = $gambarUtama->store('karir/utama', 'public'); // Path untuk gambar utama
            $gambar1Path = $gambarUtama->store('karir/gambar_1', 'public'); // Path untuk gambar 1
            $input['gambar_utama'] = $gambarUtamaPath;
            $input['gambar_1'] = $gambar1Path;
        }

        // Proses upload gambar 2 (opsional)
        if ($gambar2 = $request->file('gambar_2')) {
            $gambar2Path = $gambar2->store('karir/gambar2', 'public');
            $input['gambar_2'] = $gambar2Path;
        }

        // Proses upload gambar 3 (opsional)
        if ($gambar3 = $request->file('gambar_3')) {
            $gambar3Path = $gambar3->store('karir/gambar3', 'public');
            $input['gambar_3'] = $gambar3Path;
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
            if ($karir->gambar_utama) {
                Storage::disk('public')->delete($karir->gambar_utama);
            }
            if ($karir->gambar_1) {
                Storage::disk('public')->delete($karir->gambar_1);
            }
    
            // Simpan gambar baru ke path yang berbeda
            $gambarUtamaPath = $gambarUtama->store('karir/utama', 'public');
            $gambar1Path = $gambarUtama->store('karir/gambar_1', 'public');
            $input['gambar_utama'] = $gambarUtamaPath;
            $input['gambar_1'] = $gambar1Path;
        }
    
        // Update gambar 2
        if ($gambar2 = $request->file('gambar_2')) {
            // Hapus gambar lama jika ada
            if ($karir->gambar_2) {
                Storage::disk('public')->delete($karir->gambar_2);
            }
    
            // Simpan gambar baru
            $gambar2Path = $gambar2->store('karir/gambar2', 'public');
            $input['gambar_2'] = $gambar2Path;
        }
    
        // Update gambar 3
        if ($gambar3 = $request->file('gambar_3')) {
            // Hapus gambar lama jika ada
            if ($karir->gambar_3) {
                Storage::disk('public')->delete($karir->gambar_3);
            }
    
            // Simpan gambar baru
            $gambar3Path = $gambar3->store('karir/gambar3', 'public');
            $input['gambar_3'] = $gambar3Path;
        }
    
        $karir->update($input);
    
        return redirect('/admin/karir')->with('message', 'Data karir berhasil diperbarui.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karir  $karir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karir $karir)
    {
        // Hapus file gambar utama dan gambar terkait dari disk storage jika ada
        if ($karir->gambar_utama) {
            Storage::disk('public')->delete($karir->gambar_utama);
        }
        if ($karir->gambar_1) {
            Storage::disk('public')->delete($karir->gambar_1);
        }
        if ($karir->gambar_2) {
            Storage::disk('public')->delete($karir->gambar_2);
        }
        if ($karir->gambar_3) {
            Storage::disk('public')->delete($karir->gambar_3);
        }
    
        // Hapus data dari database
        $karir->delete();
    
        // Redirect dengan pesan sukses
        return redirect('/admin/karir')->with('message', 'Data berhasil dihapus beserta semua gambar terkait.');
    }
    
}
