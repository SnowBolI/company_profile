@extends('layouts.admin')

@section('title', 'Edit Produk Banner')

@section('breadcrumbs', 'Produk Banner')

@section('second-breadcrumb')
    <li>Edit</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/admin/produk_banner" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('produk_banner.update', $produkBanner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul', $produkBanner->judul) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea id="keterangan" class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}" name="keterangan" placeholder="Keterangan" required>{{ old('keterangan', $produkBanner->keterangan) }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('keterangan') }}</div>
                        </div> --}}
                        <div class="mb-3">
                            <label for="gambar" class="font-weight-bold">Gambar</label>
                            @if($produkBanner->gambar)
                                <img class="img-fluid rounded mx-auto d-block my-3" src="{{ Storage::url($produkBanner->gambar) }}" alt="Gambar Produk">
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
