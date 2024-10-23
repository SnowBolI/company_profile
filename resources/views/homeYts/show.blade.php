@extends('layouts.admin')

@section('title', 'Detail Home Youtube')

@section('breadcrumbs', 'Home Youtube')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/home_youtube" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail Home Slider -->
                    <div class="mb-3">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <p id="judul" class="form-control-plaintext">{{ $homeYT->judul }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="linkyt" class="font-weight-bold">Link YT</label>
                        <p id="linkyt" class="form-control-plaintext">{{ $homeYT->linkyt }}</p>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="gambar" class="font-weight-bold">Gambar</label>
                        <img src="{{ Storage::url($homeSlider->gambar) }}" alt="{{ $homeSlider->judul }}" class="img-fluid">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
