@extends('layouts.admin')

@section('title', 'Create Profile Sejarah Visi')

@section('breadcrumbs', 'Profile Sejarah Visi')

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
                        <h3 align="center">Tambah Sejarah Visi</h3>
                    </div>
                    <form action="{{ route('profile_sejarah_visi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="konten" class="font-weight-bold">Konten</label>
                            <textarea id="konten" class="form-control {{ $errors->first('konten') ? 'is-invalid' : '' }}" name="konten" placeholder="Konten" required>{{ old('konten') }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('konten') }}</div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('profile_sejarah_visi.index') }}" class="btn btn-secondary">Kembali</a>
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
        CKEDITOR.replace('konten', {
            filebrowserUploadUrl    : "{{ route('profile_sejarah_visi.store', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod : 'form'
        });
    </script>
@endsection
