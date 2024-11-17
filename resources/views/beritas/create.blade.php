@extends('layouts.admin')

@section('title', 'Create Berita')

@section('breadcrumbs', 'Berita')

@section('second-breadcrumb')
    <li>Create</li>
@endsection
@section('css')
    <script src="/templateEditor/ckeditor/ckeditor.js"></script> 
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <h3 align="center">Tambah Berita</h3>
                    </div>
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="font-weight-bold">Tanggal</label>
                            <input type="date" id="tanggal" class="form-control {{ $errors->first('tanggal') ? 'is-invalid' : '' }}" name="tanggal"  placeholder="Tanggal" value="{{ old('judul') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea id="keterangan" class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}" name="keterangan" placeholder="Keterangan" required>{{ old('keterangan') }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('keterangan') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="gambar_utama" class="font-weight-bold">Gambar 1 dan Utama</label>
                            <input type="file" id="gambar_utama" class="form-control {{ $errors->first('gambar_utama') ? 'is-invalid' : '' }}" name="gambar_utama" required>
                            <div class="invalid-feedback">{{ $errors->first('gambar_utama') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="gambar_2" class="font-weight-bold">Gambar 2</label>
                            <input type="file" id="gambar_2" class="form-control {{ $errors->first('gambar_2') ? 'is-invalid' : '' }}" name="gambar_2" >
                            <div class="invalid-feedback">{{ $errors->first('gambar_2') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="gambar_3" class="font-weight-bold">Gambar 3</label>
                            <input type="file" id="gambar_3" class="form-control {{ $errors->first('gambar_3') ? 'is-invalid' : '' }}" name="gambar_3" >
                            <div class="invalid-feedback">{{ $errors->first('gambar_3') }}</div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('berita.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- CKEditor --}}
    <script>
        CKEDITOR.replace('keterangan', {
            filebrowserUploadUrl    : "{{ route('berita.store', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod : 'form'
        });
    </script>
@endsection