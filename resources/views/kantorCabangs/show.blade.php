@extends('layouts.admin')

@section('title', 'Detail Kantor Cabang')

@section('breadcrumbs', 'Kantor Cabang')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/kantor_cabang" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail profile Slider -->
                    <div class="mb-3">
                        <label for="nama" class="font-weight-bold">Nama Cabang</label>
                        <p id="nama" class="form-control-plaintext">{{ $kantorCabang->nama }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="font-weight-bold">Alamat</label>
                        <p id="alamat" class="form-control-plaintext">{{ $kantorCabang->alamat }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gmap" class="font-weight-bold">Link Gmap</label>
                        <p id="gmap" class="form-control-plaintext">{{ $kantorCabang->gmap }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="font-weight-bold">Telepon</label>
                        <p id="telepon" class="form-control-plaintext">{{$kantorCabang->telepon }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="font-weight-bold">Gambar</label>
                        <img src="{{ Storage::url($kantorCabang->gambar) }}" alt="{{ $kantorCabang->nama }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
