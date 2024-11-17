@extends('layouts.admin')

@section('title', 'Detail Edukasi')

@section('breadcrumbs', 'Edukasi')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/edukasi" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail profile Slider -->
                    <div class="mb-3">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <p id="judul" class="form-control-plaintext">{{ $edukasi->judul }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="font-weight-bold">Tanggal</label>
                        <p id="tanggal" class="form-control-plaintext">{{ $edukasi->tanggal }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="font-weight-bold">Keterangan</label>
                        <p id="keterangan" class="form-control-plaintext">{!! $edukasi->keterangan !!}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gambar_utama" class="font-weight-bold">Gambar 1 dan Utama</label>
                        <img src="{{ Storage::url($edukasi->gambar_utama) }}" alt="{{ $edukasi->judul }}" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <label for="gambar_2" class="font-weight-bold">Gambar 2</label>
                        <img src="{{ Storage::url($edukasi->gambar_2) }}" alt="{{ $edukasi->judul }}" class="img-fluid">
                    </div>
                    <div class="mb-3">
                        <label for="gambar_3" class="font-weight-bold">Gambar 3</label>
                        <img src="{{ Storage::url($edukasi->gambar_3) }}" alt="{{ $edukasi->judul }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
