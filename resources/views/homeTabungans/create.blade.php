@extends('layouts.admin')

@section('title', 'Create Home Tabungan')

@section('breadcrumbs', 'Home Tabungan')

@section('second-breadcrumb')
    <li>Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <h3 align="center">Tambah Tabungan</h3>
                    </div>
                    <form action="{{ route('home_tabungan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="jangka" class="font-weight-bold">Jangka</label>
                            <input type="number" id="jangka" class="form-control {{ $errors->first('jangka') ? 'is-invalid' : '' }}" name="jangka" placeholder="Jangka" value="{{ old('jangka') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('jangka') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="nilai_persentase" class="font-weight-bold">Persentase</label>
                            <input type="number" step="0.000001" min="0" max="100" placeholder="5.5" id="nilai_persentase" class="form-control {{ $errors->first('nilai_persentase') ? 'is-invalid' : '' }}" name="nilai_persentase" value="{{ old('nilai_persentase') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('nilai_persentase') }}</div>
                        </div>
                        {{-- <div class="form-group">
                            <label for="gambar" class="font-weight-bold">Gambar</label>
                            <input type="file" id="gambar" class="form-control {{ $errors->first('gambar') ? 'is-invalid' : '' }}" name="gambar" required>
                            <div class="invalid-feedback">{{ $errors->first('gambar') }}</div>
                        </div> --}}
                        <div class="form-group mt-4">
                            <a href="{{ route('home_tabungan.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
