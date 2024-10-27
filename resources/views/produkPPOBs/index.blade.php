@extends('layouts.admin') {{-- Sesuaikan dengan layout Ela Admin --}}

@section('title', 'Produk PPOB')
@section('breadcrumbs', 'Produk PPOB')

@section('content')
    {{-- <div class="content"> --}}
        <div class="animated fadeIn">
            {{-- <div class="container-fluid"> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <a href="/admin/produk_ppob/create" class="mb-3 btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>

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
                                <form method="GET" action="{{ url('/admin/produk_ppob') }}" class="mb-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Cari PPOB..." value="{{ $search }}">
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
                                                <th style="width: 25%;">Keterangan</th>
                                                <th style="width: 35%;">Gambar</th>
                                                <th style="width: 15%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = ($produkPPOBs->currentPage() - 1) * $produkPPOBs->perPage() + 1;
                                            @endphp
                                            @foreach ($produkPPOBs as $ppob)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $ppob->judul }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{!! $ppob->keterangan !!}</td>
                                                <td>
                                                    <img class="img-fluid rounded mx-auto d-block" src="{{ Storage::url($ppob->gambar) }}" alt="Gambar ppob" style="max-width: 90px;" data-toggle="modal" data-target="#modalGambar{{ $ppob->id }}">
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('produk_ppob.show', $ppob->id) }}" class="btn btn-info btn-sm me-2">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('produk_ppob.edit', $ppob->id) }}" class="btn btn-warning btn-sm me-2">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <!-- Tombol Hapus -->
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $ppob->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>

                                                    <!-- Modal Konfirmasi Hapus -->
                                                    <div class="modal fade" id="modalHapus{{ $ppob->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus ppob dengan judul "{{ $ppob->judul }}"?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <form action="{{ route('produk_ppob.destroy', $ppob->id) }}" method="POST">
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

                                            <!-- Modal Gambar ppob -->
                                            <div class="modal fade" id="modalGambar{{ $ppob->id }}" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel{{ $ppob->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalGambarLabel{{ $ppob->id }}">Gambar ppob</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img class="img-fluid" src="{{ Storage::url($ppob->gambar) }}" alt="Gambar ppob">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Pagination Links -->
                                    {{ $produkPPOBs->links('pagination::bootstrap-4') }}
                                </div>

                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-12 -->
                </div> <!-- /.row -->
            {{-- </div> <!-- /.container-fluid --> --}}
        </div> <!-- /.animated -->
    {{-- </div> <!-- /.content --> --}}
@endsection