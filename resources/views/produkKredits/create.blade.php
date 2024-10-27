@extends('layouts.admin')

@section('title', 'Create Produk Kredit')

@section('breadcrumbs', 'Produk Kredit')

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
                        <h3 align="center">Tambah Kredit</h3>
                    </div>
                    <form action="{{ route('produk_kredit.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea id="keterangan" class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}" name="keterangan" placeholder="Keterangan" required>{{ old('keterangan') }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('keterangan') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="font-weight-bold">Gambar</label>
                            <input type="file" id="gambar" class="form-control {{ $errors->first('gambar') ? 'is-invalid' : '' }}" name="gambar" required>
                            <div class="invalid-feedback">{{ $errors->first('gambar') }}</div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('produk_kredit.index') }}" class="btn btn-secondary">Kembali</a>
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
            filebrowserUploadUrl    : "{{ route('produk_kredit.store', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod : 'form'
        });
    </script>
@endsection