@extends('layouts.admin')

@section('title', 'Detail Profile Tentang')

@section('breadcrumbs', 'Profile Tentang')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/profile_tentang" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail profile Slider -->
                    <div class="mb-3">
                        <label for="nama" class="font-weight-bold">Nama</label>
                        <p id="nama" class="form-control-plaintext">{{ $profileTentang->nama }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="font-weight-bold">Keterangan</label>
                        <p id="keterangan" class="form-control-plaintext">{{ $profileTentang->keterangan }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="font-weight-bold">Gambar</label>
                        <img src="{{ Storage::url($profileTentang->gambar) }}" alt="{{ $profileTentang->keterangan }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
