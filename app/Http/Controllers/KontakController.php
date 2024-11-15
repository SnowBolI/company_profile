<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
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
          $kontaks = Kontak::when($search, function ($query, $search) {
              return $query->where('telepon', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%")
                            ->orWhere('facebook', 'like', "%{$search}%")
                            ->orWhere('linkedin', 'like', "%{$search}%")
                            ->orWhere('instagram', 'like', "%{$search}%")
                            ->orWhere('youtube', 'like', "%{$search}%")
                            ->orWhere('whatsapp', 'like', "%{$search}%")
                            ->orWhere('alamat', 'like', "%{$search}%");
          })->orderBy('updated_at', 'desc')->paginate(10);
  
          // Mengirimkan data produk dan kata kunci pencarian ke view
          return view('kontaks.index', compact('kontaks', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontaks.create');
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
            'telepon' => 'required|string|max:20',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'gmap' => 'required|string',
            'whatsapp' => 'required|string|max:20',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
        ]);

        Kontak::create($request->all());

        return redirect()->route('kontak.index')
                         ->with('message', 'Kontak berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function show(Kontak $kontak)
    {
        return view('kontaks.show', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontak $kontak)
    {
        return view('kontaks.edit', compact('kontak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontak $kontak)
    {
        $request->validate([
            'telepon' => 'required|string|max:20',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'gmap' => 'required|string',
            'whatsapp' => 'required|string|max:20',
            'facebook' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'instagram' => 'nullable|string',
            'youtube' => 'nullable|string',
        ]);

        $kontak->update($request->all());

        return redirect()->route('kontak.index')
                         ->with('message', 'Kontak berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kontak  $kontak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return redirect()->route('kontak.index')
                         ->with('message', 'Kontak berhasil dihapus');
    }
}
