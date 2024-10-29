@extends('layouts.admin')

@section('title', 'Create Kantor Cabang')

@section('breadcrumbs', 'Kantor Cabang')

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
                        <h3 align="center">Tambah Cabang</h3>
                    </div>
                    <form action="{{ route('kantor_cabang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama Cabang</label>
                            <input type="text" id="nama" class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}" name="nama" placeholder="Nama Cabang" value="{{ old('nama') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="font-weight-bold">Alamat</label>
                            <textarea id="alamat" class="form-control {{ $errors->first('alamat') ? 'is-invalid' : '' }}" name="alamat" placeholder="Alamat" required>{{ old('alamat') }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('alamat') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="gmap" class="font-weight-bold">Link Gmap</label>
                            <input type="text" id="gmap" class="form-control {{ $errors->first('gmap') ? 'is-invalid' : '' }}" name="gmap" placeholder="Link Gmap" value="{{ old('gmap') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('gmap') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="telepon" class="font-weight-bold">Telepon</label>
                            <input type="number" id="telepon" class="form-control {{ $errors->first('telepon') ? 'is-invalid' : '' }}" name="telepon" placeholder="Telepon" value="{{ old('telepon') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('telepon') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="gambar" class="font-weight-bold">Gambar</label>
                            <input type="file" id="gambar" class="form-control {{ $errors->first('gambar') ? 'is-invalid' : '' }}" name="gambar" required>
                            <div class="invalid-feedback">{{ $errors->first('gambar') }}</div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('kantor_cabang.index') }}" class="btn btn-secondary">Kembali</a>
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
            filebrowserUploadUrl    : "{{ route('kantor_cabang.store', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod : 'form'
        });
    </script>
@endsection