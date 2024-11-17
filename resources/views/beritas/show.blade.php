@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('breadcrumbs', 'Berita')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/berita" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail profile Slider -->
                    <div class="mb-3">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <p id="judul" class="form-control-plaintext">{{ $berita->judul }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="font-weight-bold">Tanggal</label>
                        <p id="tanggal" class="form-control-plaintext">{{ $berita->tanggal }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="font-weight-bold">Keterangan</label>
                        <p id="keterangan" class="form-control-plaintext">{!! $berita->keterangan !!}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gambar_utama" class="font-weight-bold">Gambar 1 dan Utama</label>
                        <img src="{{ Storage::url($berita->gambar_utama) }}" alt="{{ $berita->judul }}" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <label for="gambar_2" class="font-weight-bold">Gambar 2</label>
                        <img src="{{ Storage::url($berita->gambar_2) }}" alt="{{ $berita->judul }}" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <label for="gambar_3" class="font-weight-bold">Gambar 3</label>
                        <img src="{{ Storage::url($berita->gambar_3) }}" alt="{{ $berita->judul }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
