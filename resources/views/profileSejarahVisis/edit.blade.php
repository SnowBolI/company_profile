@extends('layouts.admin')

@section('title', 'Edit Profile Sejarah Visi')

@section('breadcrumbs', 'Profile Sejarah Visi')

@section('second-breadcrumb')
    <li>Edit</li>
@endsection

@section('css')
    <script src="/templateEditor/ckeditor/ckeditor.js"></script> 
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/admin/profile_sejarah_visi" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('profile_sejarah_visi.update', $profileSejarahVisi->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul', $profileSejarahVisi->judul) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="konten" class="font-weight-bold">Konten</label>
                            <textarea id="konten" class="form-control {{ $errors->first('konten') ? 'is-invalid' : '' }}" name="konten" placeholder="Konten" required>{{ old('konten', $profileSejarahVisi->konten) }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('konten') }}</div>
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

@section('script')
    {{-- CKEditor --}}
    <script>
        CKEDITOR.replace('konten', {
            filebrowserUploadUrl    : "{{ route('profile_sejarah_visi.update', $profileSejarahVisi->id, ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod : 'form'
        });
    </script>
@endsection