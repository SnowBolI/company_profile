@extends('layouts.admin') {{-- Sesuaikan dengan layout Ela Admin --}}

@section('title', 'Edukasi')
@section('breadcrumbs', 'Edukasi')

@section('content')
    {{-- <div class="content"> --}}
        <div class="animated fadeIn">
            {{-- <div class="container-fluid"> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <a href="/admin/edukasi/create" class="mb-3 btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>

                                {{-- Display success message --}}
                                @if (($message = Session::get('message')))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <strong>Berhasil!</strong>
                                        <p>{{ $message }}</p>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <!-- Form Pencarian -->
                                <form method="GET" action="{{ url('/admin/edukasi') }}" class="mb-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Cari Edukasi..." value="{{ $search }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-secondary">Cari</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="table-responsive">
                                    <table class="table table-bordered border-light table-hover">
                                        <thead class="text-light" style="background-color:#33b751 !important">
                                            <tr>
                                                <th style="width: 5%;">No</th>
                                                <th style="width: 25%;">Judul</th>
                                                <th style="width: 10%;">Tanggal</th>
                                                <th style="width: 25%;">Keterangan</th>
                                                <th style="width: 25%;">Gambar</th>
                                                <th style="width: 15%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = ($edukasis->currentPage() - 1) * $edukasis->perPage() + 1;
                                            @endphp
                                            @foreach ($edukasis as $edukasi)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $edukasi->judul }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $edukasi->tanggal }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{!! $edukasi->keterangan !!}</td>
                                                <td>
                                                    <img class="img-fluid rounded mx-auto d-block" src="{{ Storage::url($edukasi->gambar) }}" alt="Gambar edukasi" style="max-width: 90px;" data-toggle="modal" data-target="#modalGambar{{ $edukasi->id }}">
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('edukasi.show', $edukasi->id) }}" class="btn btn-info btn-sm me-2">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('edukasi.edit', $edukasi->id) }}" class="btn btn-warning btn-sm me-2">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <!-- Tombol Hapus -->
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $edukasi->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>

                                                    <!-- Modal Konfirmasi Hapus -->
                                                    <div class="modal fade" id="modalHapus{{ $edukasi->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus edukasi dengan judul "{{ $edukasi->judul }}"?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <form action="{{ route('edukasi.destroy', $edukasi->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Modal Gambar edukasi -->
                                            <div class="modal fade" id="modalGambar{{ $edukasi->id }}" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel{{ $edukasi->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalGambarLabel{{ $edukasi->id }}">Gambar edukasi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img class="img-fluid" src="{{ Storage::url($edukasi->gambar) }}" alt="Gambar edukasi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Pagination Links -->
                                    {{ $edukasis->links('pagination::bootstrap-4') }}
                                </div>

                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-12 -->
                </div> <!-- /.row -->
            {{-- </div> <!-- /.container-fluid --> --}}
        </div> <!-- /.animated -->
    {{-- </div> <!-- /.content --> --}}
@endsection