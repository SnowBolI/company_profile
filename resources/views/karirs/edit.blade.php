@extends('layouts.admin')

@section('title', 'Edit Karir')

@section('breadcrumbs', 'Karir')

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
                    <a href="/admin/karir" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('karir.update', $karir->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul', $karir->judul) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="font-weight-bold">Tanggal</label>
                            <input type="date" id="tanggal" class="form-control {{ $errors->first('tanggal') ? 'is-invalid' : '' }}" name="tanggal"  placeholder="Tanggal" value="{{ old('judul', $karir->judul) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('tanggal') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea id="keterangan" class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}" name="keterangan" placeholder="Keterangan" required>{{ old('keterangan', $karir->keterangan) }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('keterangan') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_utama" class="font-weight-bold">Gambar 1 dan Utama</label>
                            @if($karir->gambar_utama)
                                <img class="img-fluid rounded mx-auto d-block my-3" src="{{ Storage::url($karir->gambar_utama) }}" alt="Gambar Produk">
                            @else
                                <p>Tidak ada gambar utama yang diunggah.</p>
                            @endif
                            <input type="file" id="gambar_utama" class="form-control {{ $errors->first('gambar_utama') ? 'is-invalid' : '' }}" name="gambar_utama">
                            <div class="invalid-feedback">{{ $errors->first('gambar_utama') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_2" class="font-weight-bold">Gambar 2</label>
                            @if($karir->gambar_2)
                                <img class="img-fluid rounded mx-auto d-block my-3" src="{{ Storage::url($karir->gambar_2) }}" alt="Gambar Produk">
                            @else
                                <p>Tidak ada gambar 2 yang diunggah.</p>
                            @endif
                            <input type="file" id="gambar_2" class="form-control {{ $errors->first('gambar_2') ? 'is-invalid' : '' }}" name="gambar_2">
                            <div class="invalid-feedback">{{ $errors->first('gambar_2') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar_3" class="font-weight-bold">Gambar 3</label>
                            @if($karir->gambar_3)
                                <img class="img-fluid rounded mx-auto d-block my-3" src="{{ Storage::url($karir->gambar_3) }}" alt="Gambar Produk">
                            @else
                                <p>Tidak ada gambar 3 yang diunggah.</p>
                            @endif
                            <input type="file" id="gambar_3" class="form-control {{ $errors->first('gambar_3') ? 'is-invalid' : '' }}" name="gambar_3">
                            <div class="invalid-feedback">{{ $errors->first('gambar_3') }}</div>
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
        CKEDITOR.replace('keterangan', {
            filebrowserUploadUrl    : "{{ route('karir.store', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod : 'form'
        });
    </script>
@endsection