@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')

@section('breadcrumbs', 'Pesan Kontak')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/dashboard/pesan_kontak" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail profile Slider -->
                    <div class="mb-3">
                        <label for="nama" class="font-weight-bold">Nama</label>
                        <p id="nama" class="form-control-plaintext">{{ $pesanKontak->nama }}</p>
                    </div><div class="mb-3">
                        <label for="status" class="font-weight-bold">Status</label>
                        <p id="status" class="form-control-plaintext">{{ $pesanKontak->status }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="font-weight-bold">Tanggal</label>
                        <p id="tanggal" class="form-control-plaintext">{{ $pesanKontak->tanggal }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="subjek" class="font-weight-bold">Subjek</label>
                        <p id="subjek" class="form-control-plaintext">{{ $pesanKontak->subjek }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="pesan" class="font-weight-bold">Pesan</label>
                        <p id="pesan" class="form-control-plaintext">{{ $pesanKontak->pesan }}</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection
