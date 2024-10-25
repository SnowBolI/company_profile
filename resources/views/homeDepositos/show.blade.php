@extends('layouts.admin')

@section('title', 'Detail Home Deposito')

@section('breadcrumbs', 'Home Deposito')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/home_deposito" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail Home Slider -->
                    <div class="mb-3">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <p id="judul" class="form-control-plaintext">{{ $homeDeposito->judul }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="nilai_persentase" class="font-weight-bold">Persentase</label>
                        <p id="nilai_persentase" class="form-control-plaintext">{{ $homeDeposito->nilai_persentase*100 }}%</p>
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
