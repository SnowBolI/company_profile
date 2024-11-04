@extends('layouts.admin')

@section('title', 'Detail Kontak')
@section('breadcrumbs', 'Kontak')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/kontak" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail Kontak -->
                    <div class="mb-3">
                        <label for="telepon" class="font-weight-bold">Telepon</label>
                        <p id="telepon" class="form-control-plaintext">{{ $kontak->telepon }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="font-weight-bold">Email</label>
                        <p id="email" class="form-control-plaintext">{{ $kontak->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="font-weight-bold">Alamat</label>
                        <p id="alamat" class="form-control-plaintext">{{ $kontak->alamat }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="gmap" class="font-weight-bold">Google Maps</label>
                        <p id="gmap" class="form-control-plaintext">
                            <a href="{{ $kontak->gmap }}" target="_blank">{{ $kontak->gmap }}</a>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp" class="font-weight-bold">WhatsApp</label>
                        <p id="whatsapp" class="form-control-plaintext">{{ $kontak->whatsapp }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="facebook" class="font-weight-bold">Facebook</label>
                        <p id="facebook" class="form-control-plaintext">
                            <a href="{{ $kontak->facebook }}" target="_blank">{{ $kontak->facebook }}</a>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label for="instagram" class="font-weight-bold">Instagram</label>
                        <p id="instagram" class="form-control-plaintext">
                            <a href="{{ $kontak->instagram }}" target="_blank">{{ $kontak->instagram }}</a>
                        </p>
                    </div>
                    <div class="mb-3">
                        <label for="youtube" class="font-weight-bold">Youtube</label>
                        <p id="youtube" class="form-control-plaintext">
                            <a href="{{ $kontak->youtube }}" target="_blank">{{ $kontak->youtube }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
