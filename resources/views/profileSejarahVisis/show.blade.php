@extends('layouts.admin')

@section('title', 'Detail Profile Sejarah Visi')

@section('breadcrumbs', 'Profile Sejarah Visi')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/profile_sejarah_visi" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail Home Slider -->
                    <div class="mb-3">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <p id="judul" class="form-control-plaintext">{{ $profileSejarahVisi->judul }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="konten" class="font-weight-bold">Konten</label>
                        <p id="konten" class="form-control-plaintext">{!! $profileSejarahVisi->konten !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
