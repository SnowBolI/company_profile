@extends('layouts.admin')

@section('title', 'Detail Produk Deposito')

@section('breadcrumbs', 'Produk Deposito')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/produk_deposito" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail profile Slider -->
                    <div class="mb-3">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <p id="judul" class="form-control-plaintext">{{ $produkDeposito->judul }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="font-weight-bold">Keterangan</label>
                        <p id="keterangan" class="form-control-plaintext">{!! $produkDeposito->keterangan !!}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="font-weight-bold">Gambar</label>
                        <img src="{{ Storage::url($produkDeposito->gambar) }}" alt="{{ $produkDeposito->judul }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
