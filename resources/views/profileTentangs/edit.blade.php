@extends('layouts.admin')

@section('title', 'Edit Profile Tentang')

@section('breadcrumbs', 'Profile Tentang')

@section('second-breadcrumb')
    <li>Edit</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/admin/profile_tentang" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('profile_tentang.update', $profileTentang->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nama" class="font-weight-bold">Nama</label>
                            <input type="text" id="nama" class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}" name="nama" placeholder="Nama" value="{{ old('nama', $profileTentang->nama) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="font-weight-bold">Jabatan</label>
                            <textarea id="jabatan" class="form-control {{ $errors->first('jabatan') ? 'is-invalid' : '' }}" name="jabatan" placeholder="Jabatan" required>{{ old('jabatan', $profileTentang->jabatan) }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('jabatan') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="font-weight-bold">Gambar</label>
                            @if($profileTentang->gambar)
                                <img class="img-fluid rounded mx-auto d-block my-3" src="{{ Storage::url($profileTentang->gambar) }}" alt="Gambar Produk">
                            @else
                                <p>Tidak ada gambar yang diunggah.</p>
                            @endif
                            <input type="file" id="gambar" class="form-control {{ $errors->first('gambar') ? 'is-invalid' : '' }}" name="gambar">
                            <div class="invalid-feedback">{{ $errors->first('gambar') }}</div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
