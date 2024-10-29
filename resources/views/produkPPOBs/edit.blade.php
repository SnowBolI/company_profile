@extends('layouts.admin')

@section('title', 'Edit Produk PPOB')

@section('breadcrumbs', 'Produk PPOB')

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
                    <a href="/admin/produk_ppob" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('produk_ppob.update', $produkPPOB->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul', $produkPPOB->judul) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea id="keterangan" class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}" name="keterangan" placeholder="Keterangan" required>{{ old('keterangan', $produkPPOB->keterangan) }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('keterangan') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="font-weight-bold">Gambar</label>
                            @if($produkPPOB->gambar)
                                <img class="img-fluid rounded mx-auto d-block my-3" src="{{ Storage::url($produkPPOB->gambar) }}" alt="Gambar Produk">
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
@section('script')
    {{-- CKEditor --}}
    <script>
        CKEDITOR.replace('keterangan', {
            filebrowserUploadUrl    : "{{ route('produk_ppob.store', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod : 'form'
        });
    </script>
@endsection