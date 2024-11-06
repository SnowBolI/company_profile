<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
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
            $laporans = Laporan::when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%");
            })->orderBy('updated_at', 'desc')->paginate(10);
    
            // Atur format tanggal untuk setiap item dalam koleksi
            $laporans->getCollection()->transform(function ($laporan) {
                Carbon::setLocale('id'); // Set lokal ke Indonesia
                $laporan->tanggal = Carbon::parse($laporan->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun
                return $laporan;
            });

            // Mengirimkan data produk dan kata kunci pencarian ke view
            return view('laporans.index', compact('laporans', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laporans.create');

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
            'file_pdf' => 'required|mimes:pdf',
            'tanggal' => 'required|date', // Tambahkan validasi untuk tanggal
        ]);

        $input = $request->all();
        // Mendapatkan nama hari dari tanggal
        $tanggal = Carbon::parse($request->input('tanggal'));
        $input['hari'] = $tanggal->translatedFormat('l'); // Mendapatkan nama hari dalam bahasa lokal

        if ($file_pdf = $request->file('file_pdf')) {
            // Simpan gambar ke storage/app/public/admin/laporan
            $pdfPath = $file_pdf->store('laporan', 'public');
            $input['file_pdf'] = $pdfPath;
        }

        Laporan::create($input);

        return redirect('/admin/laporan')->with('message', 'Data laporan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        $laporan->tanggal = Carbon::parse($laporan->tanggal)->translatedFormat('l, j F Y'); // Format: hari tanggal bulan tahun

        return view('laporans.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        return view('laporans.edit', compact('laporan'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'judul' => 'required',
            'file_pdf' => 'mimes:pdf',
            'tanggal' => 'required|date', // Tambahkan validasi untuk tanggal
        ]);

        $input = $request->all();
        // Mendapatkan nama hari dari tanggal yang diupdate
        $tanggal = Carbon::parse($request->input('tanggal'));
        $input['hari'] = $tanggal->translatedFormat('l'); // Mendapatkan nama hari

        if ($file_pdf = $request->file('file_pdf')) {
            // Hapus file_pdf lama jika ada
            if ($laporan->file_pdf) {
                Storage::disk('public')->delete($laporan->file_pdf);
            }

            // Simpan file_pdf baru ke storage/app/public/admin/laporan
            $pdfPath = $file_pdf->store('laporan', 'public');
            $input['file_pdf'] = $pdfPath;
        } else {
            unset($input['gambar']);
        }
        $laporan->update($input);

        return redirect('/admin/laporan')->with('message', 'Data laporan berhasil diedit dan gambar lama dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
         // Hapus file file_pdf dari disk storage jika ada
         if ($laporan->file_pdf) {
            Storage::disk('public')->delete($laporan->file_pdf);
        }

        // Hapus data dari database
        $laporan->delete();

        // Redirect dengan pesan sukses
        return redirect('/admin/laporan')->with('message', 'Data berhasil dihapus beserta file_pdfnya');
    }
}
