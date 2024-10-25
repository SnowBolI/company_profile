@extends('layouts.admin')

@section('title', 'Create Profile Tentang')

@section('breadcrumbs', 'Profile Tentang')

@section('second-breadcrumb')
    <li>Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <h3 align="center">Tambah Tentang</h3>
                    </div>
                    <form action="{{ route('profile_tentang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama</label>
                            <input type="text" id="nama" class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}" name="nama" placeholder="Nama" value="{{ old('nama') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="jabatan" class="font-weight-bold">Jabatan</label>
                            <textarea id="jabatan" class="form-control {{ $errors->first('jabatan') ? 'is-invalid' : '' }}" name="jabatan" placeholder="Jabatan" required>{{ old('jabatan') }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('jabatan') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="font-weight-bold">Gambar</label>
                            <input type="file" id="gambar" class="form-control {{ $errors->first('gambar') ? 'is-invalid' : '' }}" name="gambar" required>
                            <div class="invalid-feedback">{{ $errors->first('gambar') }}</div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('profile_tentang.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection