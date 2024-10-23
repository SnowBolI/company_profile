@extends('layouts.admin')

@section('title', 'Detail Profile Slider')

@section('breadcrumbs', 'Profile Slider')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/profile_slider" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail profile Slider -->
                    <div class="mb-3">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <p id="judul" class="form-control-plaintext">{{ $profileSlider->judul }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="font-weight-bold">Gambar</label>
                        <img src="{{ Storage::url($profileSlider->gambar) }}" alt="{{ $profileSlider->judul }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
