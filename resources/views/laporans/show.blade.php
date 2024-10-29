@extends('layouts.admin')

@section('title', 'Detail Laporan')

@section('breadcrumbs', 'Laporan')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/laporan" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail laporan -->
                    <div class="mb-3">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <p id="judul" class="form-control-plaintext">{{ $laporan->judul }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="font-weight-bold">Tanggal</label>
                        <p id="tanggal" class="form-control-plaintext">{{ $laporan->tanggal }}</p>
                    </div>
                
                    <div class="mb-3">
                        <label class="font-weight-bold">File PDF</label>
                        @if($laporan->file_pdf)
                            <iframe src="{{ Storage::url($laporan->file_pdf) }}" style="width:100%; height:600px;" frameborder="0"></iframe>
                        @else
                            <p class="text-muted">Tidak ada file PDF</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
