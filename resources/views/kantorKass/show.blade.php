@extends('layouts.admin')

@section('title', 'Detail Kantor Kas')

@section('breadcrumbs', 'Kantor Kas ' . $namaCabang->nama)

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/kantor_cabang/{{ $idkantorcabang }}/kantor_kas" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail profile Slider -->
                    <div class="mb-3">
                        <label for="nama" class="font-weight-bold">Nama Kas</label>
                        <p id="nama" class="form-control-plaintext">{{ $kantorKas->nama }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="font-weight-bold">Alamat</label>
                        <p id="alamat" class="form-control-plaintext">{{ $kantorKas->alamat }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gmap" class="font-weight-bold">Link Gmap</label>
                        <p id="gmap" class="form-control-plaintext">{{ $kantorKas->gmap }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="font-weight-bold">Telepon</label>
                        <p id="telepon" class="form-control-plaintext">{{$kantorKas->telepon }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="font-weight-bold">Gambar</label>
                        <img src="{{ Storage::url($kantorKas->gambar) }}" alt="{{ $kantorKas->nama }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
