@extends('layouts.admin') {{-- Sesuaikan dengan layout Ela Admin --}}

@section('title', 'Laporan')
@section('breadcrumbs', 'Laporan')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <a href="/admin/laporan/create" class="mb-3 btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>

                        {{-- Display success message --}}
                        @if ($message = Session::get('message'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <strong>Berhasil!</strong>
                                <p>{{ $message }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <!-- Form Pencarian -->
                        <form method="GET" action="{{ url('/admin/laporan') }}" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari Laporan..." value="{{ $search }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">Cari</button>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered border-light table-hover">
                                <thead class="text-light" style="background-color:#33b751 !important">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Tanggal</th>
                                        <th>File PDF</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($laporans->currentPage() - 1) * $laporans->perPage() + 1;
                                    @endphp
                                    @foreach ($laporans as $laporan)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="text-truncate" style="max-width: 150px;">{{ $laporan->judul }}</td>
                                        <td class="text-truncate" style="max-width: 150px;">{{ $laporan->tanggal }}</td>
                                        <td class="text-center">
                                            @if($laporan->file_pdf)
                                                <a href="{{ Storage::url($laporan->file_pdf) }}" target="_blank" class="btn btn-link">
                                                    <i class="fa fa-file-pdf"></i> Lihat PDF
                                                </a>
                                            @else
                                                <p class="text-muted">Tidak ada file PDF</p>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            {{ $laporans->links('pagination::bootstrap-4') }}
                        </div>

                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.animated -->
@endsection
