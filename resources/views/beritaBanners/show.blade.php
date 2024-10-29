@extends('layouts.admin')

@section('title', 'Detail Berita Banner')

@section('breadcrumbs', 'Berita Banner')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/berita_banner" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail berita Slider -->
                    <div class="mb-3">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <p id="judul" class="form-control-plaintext">{{ $beritaBanner->judul }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="font-weight-bold">Gambar</label>
                        <img src="{{ Storage::url($beritaBanner->gambar) }}" alt="{{ $beritaBanner->judul }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
