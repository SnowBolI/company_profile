@extends('layouts.admin')

@section('title', 'Detail Pesan Kredit')

@section('breadcrumbs', 'Pesan Kredit')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/dashboard/pesan_kredit" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail profile Slider -->
                    <div class="mb-3">
                        <label for="nama" class="font-weight-bold">Nama</label>
                        <p id="nama" class="form-control-plaintext">{{ $pesanKredit->nama }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="font-weight-bold">Status</label>
                        <p id="status" class="form-control-plaintext">{{ $pesanKredit->status }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="font-weight-bold">Email</label>
                        <p id="email" class="form-control-plaintext">{{ $pesanKredit->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="ktp" class="font-weight-bold">KTP</label>
                        <p id="ktp" class="form-control-plaintext">{{ $pesanKredit->ktp }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="font-weight-bold">Tanggal</label>
                        <p id="tanggal" class="form-control-plaintext">{{ $pesanKredit->tanggal }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="subjek" class="font-weight-bold">Subjek</label>
                        <p id="subjek" class="form-control-plaintext">{{ $pesanKredit->subjek }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="jumlah_pinjaman" class="font-weight-bold">Jumlah Pinjaman</label>
                        <p id="jumlah_pinjaman" class="form-control-plaintext">{{ 'Rp ' . number_format($pesanKredit->jumlah_pinjaman, 0, ',', '.') }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_pinjaman" class="font-weight-bold">Waktu Pinjaman</label>
                        <p id="waktu_pinjaman" class="form-control-plaintext">{{ $pesanKredit->waktu_pinjaman. ' Bulan'}}</p>
                    </div>
                    <div class="mb-3">
                        <label for="tujuan_pinjaman" class="font-weight-bold">Tujuan Pinjaman</label>
                        <p id="tujuan_pinjaman" class="form-control-plaintext">{{ $pesanKredit->tujuan_pinjaman }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="jaminan" class="font-weight-bold">Jaminan</label>
                        <p id="jaminan" class="form-control-plaintext">{{ $pesanKredit->jaminan }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="font-weight-bold">Alamat</label>
                        <p id="alamat" class="form-control-plaintext">{{ $pesanKredit->alamat }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="hp" class="font-weight-bold">No HP</label>
                        <p id="hp" class="form-control-plaintext">{{ $pesanKredit->hp }}</p>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
@endsection
