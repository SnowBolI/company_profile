@extends('layouts.admin')

@section('title', 'Create Laporan')

@section('breadcrumbs', 'Laporan')

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
                        <h3 align="center">Tambah Laporan</h3>
                    </div>
                    <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="file_pdf" class="font-weight-bold">File PDF</label>
                            <input type="file" id="file_pdf" class="form-control {{ $errors->first('file_pdf') ? 'is-invalid' : '' }}" name="file_pdf" required>
                            <div class="invalid-feedback">{{ $errors->first('file_pdf') }}</div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
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
            filebrowserUploadUrl    : "{{ route('laporan.store', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod : 'form'
        });
    </script>
@endsection