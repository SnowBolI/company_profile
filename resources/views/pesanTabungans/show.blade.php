@extends('layouts.admin')

@section('title', 'Detail Pesan Tabungan')

@section('breadcrumbs', 'Pesan Tabungan')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/dashboard/pesan_tabungan" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail profile Slider -->
                    <div class="mb-3">
                        <label for="nama" class="font-weight-bold">Nama</label>
                        <p id="nama" class="form-control-plaintext">{{ $pesanTabungan->nama }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="font-weight-bold">Status</label>
                        <p id="status" class="form-control-plaintext">{{ $pesanTabungan->status }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="font-weight-bold">Email</label>
                        <p id="email" class="form-control-plaintext">{{ $pesanTabungan->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="ktp" class="font-weight-bold">KTP</label>
                        <p id="ktp" class="form-control-plaintext">{{ $pesanTabungan->ktp }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="font-weight-bold">Tanggal</label>
                        <p id="tanggal" class="form-control-plaintext">{{ $pesanTabungan->tanggal }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="subjek" class="font-weight-bold">Subjek</label>
                        <p id="subjek" class="form-control-plaintext">{{ $pesanTabungan->subjek }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="tipe_tabungan" class="font-weight-bold">Tipe Tabungan</label>
                        <p id="tipe_tabungan" class="form-control-plaintext">{{ $pesanTabungan->tipe_tabungan }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="font-weight-bold">Alamat</label>
                        <p id="alamat" class="form-control-plaintext">{{ $pesanTabungan->alamat }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="hp" class="font-weight-bold">No HP</label>
                        <p id="hp" class="form-control-plaintext">{{ $pesanTabungan->hp }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="setoran_awal" class="font-weight-bold">Setoran Awal</label>
                        <p id="setoran_awal" class="form-control-plaintext">{{ 'Rp ' . number_format($pesanTabungan->setoran_awal, 0, ',', '.') }}</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection
