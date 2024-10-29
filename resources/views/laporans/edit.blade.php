@extends('layouts.admin')

@section('title', 'Edit Laporan')

@section('breadcrumbs', 'Laporan')

@section('second-breadcrumb')
    <li>Edit</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/admin/laporan" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="font-weight-bold">Judul</label>
                            <input type="text" id="judul" class="form-control {{ $errors->first('judul') ? 'is-invalid' : '' }}" name="judul" placeholder="Judul" value="{{ old('judul', $laporan->judul) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('judul') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="font-weight-bold">Tanggal</label>
                            <input type="date" id="tanggal" class="form-control {{ $errors->first('tanggal') ? 'is-invalid' : '' }}" name="tanggal"  placeholder="Tanggal" value="{{ old('judul', $laporan->judul) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('tanggal') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="file_pdf" class="font-weight-bold">File PDF</label>
                            @if($laporan->file_pdf)
                                <embed src="{{ Storage::url($laporan->file_pdf) }}" type="application/pdf" width="100%" height="600px" class="my-3"/>
                            @else
                                <p>Tidak ada file PDF yang diunggah.</p>
                            @endif
                            <input type="file" id="file_pdf" class="form-control {{ $errors->first('file_pdf') ? 'is-invalid' : '' }}" name="file_pdf">
                            <div class="invalid-feedback">{{ $errors->first('file_pdf') }}</div>
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
