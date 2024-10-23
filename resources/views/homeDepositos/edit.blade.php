@extends('layouts.admin')

@section('title', 'Edit Home Deposito')

@section('breadcrumbs', 'Home Deposito')

@section('second-breadcrumb')
    <li>Edit</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/admin/home_deposito" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('home_deposito.update', $homeDeposito->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul', $homeDeposito->judul) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="nilai_persentase" class="font-weight-bold">Persentase</label>
                            <input type="number" step="0.1" min="0" max="100" id="nilai_persentase" class="form-control {{ $errors->first('nilai_persentase') ? 'is-invalid' : '' }}" name="nilai_persentase" placeholder="5.5" value="{{ old('nilai_persentase', $homeDeposito->nilai_persentase*100) }}" required>
                            
                            <div class="invalid-feedback">{{ $errors->first('nilai_persentase') }}</div>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="gambar" class="font-weight-bold">Gambar</label>
                            @if($homeDeposito->gambar)
                                <img class="img-fluid rounded mx-auto d-block my-3" src="{{ Storage::url($homeDeposito->gambar) }}" alt="Gambar Produk">
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
