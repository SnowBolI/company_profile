@extends('layouts.admin')

@section('title', 'Edit Home Youtube')

@section('breadcrumbs', 'Home Youtube')

@section('second-breadcrumb')
    <li>Edit</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/admin/home_youtube" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('home_youtube.update', $homeYT->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul', $homeYT->judul) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="linkyt" class="font-weight-bold">Link YT</label>
                            <textarea id="linkyt" class="form-control {{ $errors->first('linkyt') ? 'is-invalid' : '' }}" name="linkyt" placeholder="Link YT" required>{{ old('linkyt', $homeYT->linkyt) }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('linkyt') }}</div>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="gambar" class="font-weight-bold">Gambar</label>
                            @if($homeYT->gambar)
                                <img class="img-fluid rounded mx-auto d-block my-3" src="{{ Storage::url($homeYT->gambar) }}" alt="Gambar Produk">
                            @else
                                <p>Tidak ada gambar yang diunggah.</p>
                            @endif
                            <input type="file" id="gambar" class="form-control {{ $errors->first('gambar') ? 'is-invalid' : '' }}" name="gambar">
                            <div class="invalid-feedback">{{ $errors->first('gambar') }}</div>
                        </div> --}}
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
