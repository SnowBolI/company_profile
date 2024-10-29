@extends('layouts.admin') {{-- Sesuaikan dengan layout Ela Admin --}}

@section('title', 'Kontak')
@section('breadcrumbs', 'Kontak')

@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('kontak.create') }}" class="mb-3 btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>

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
                        <form method="GET" action="{{ url('/admin/kontak') }}" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Cari Kontak..." value="{{ $search }}">
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
                                        <th style="width: 15%;">Telepon</th>
                                        <th style="width: 20%;">Email</th>
                                        <th style="width: 30%;">Alamat</th>
                                        <th style="width: 15%;">WhatsApp</th>
                                        <th style="width: 15%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = ($kontaks->currentPage() - 1) * $kontaks->perPage() + 1;
                                    @endphp
                                    @foreach ($kontaks as $kontak)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td>{{ $kontak->telepon }}</td>
                                        <td>{{ $kontak->email }}</td>
                                        <td class="text-truncate" style="max-width: 200px;">{{ $kontak->alamat }}</td>
                                        <td>{{ $kontak->whatsapp }}</td>

                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('kontak.show', $kontak->id) }}" class="btn btn-info btn-sm me-2">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ route('kontak.edit', $kontak->id) }}" class="btn btn-warning btn-sm me-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $kontak->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>

                                            <!-- Modal Konfirmasi Hapus -->
                                            <div class="modal fade" id="modalHapus{{ $kontak->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Apakah Anda yakin ingin menghapus kontak dengan telepon "{{ $kontak->telepon }}"?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <form action="{{ route('kontak.destroy', $kontak->id) }}" method="POST">
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
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Pagination Links -->
                            {{ $kontaks->links('pagination::bootstrap-4') }}
                        </div>

                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div> <!-- /.col-lg-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.animated -->
@endsection
