@extends('layouts.admin') {{-- Sesuaikan dengan layout Ela Admin --}}

@section('title', 'Pesan Kontak')
@section('breadcrumbs', 'Pesan Kontak')

@section('content')
    {{-- <div class="content"> --}}
        <div class="animated fadeIn">
            {{-- <div class="container-fluid"> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <!-- Form Pencarian -->
                                <form method="GET" action="{{ url('/admin/dashboard/pesan_kontak') }}" class="mb-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Cari Pesan..." value="{{ $search }}">
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
                                                <th style="width: 15%;">Subjek</th>
                                                <th style="width: 10%;">Status</th>
                                                <th style="width: 10%;">Tanggal</th>
                                                <th style="width: 25%;">Nama</th>
                                                <th style="width: 25%;">Pesan</th>
                                                <th style="width: 15%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = ($pesanKontaks->currentPage() - 1) * $pesanKontaks->perPage() + 1;
                                            @endphp
                                            @foreach ($pesanKontaks as $pesanKontak)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $pesanKontak->subjek }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $pesanKontak->status }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $pesanKontak->tanggal }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $pesanKontak->nama }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $pesanKontak->pesan }}</td>
                                                
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('pesan_kontak.show', $pesanKontak->id) }}" class="btn btn-info btn-sm me-2">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <form id="update-status-form-{{ $pesanKontak->id }}" action="{{ route('pesan_kontak.update', $pesanKontak->id) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('PATCH')
                                                            <input type="hidden" name="status" value="dibaca">
                                                        </form>
                                                        
                                                        <!-- Tombol yang akan mengirimkan form -->
                                                        <a href="javascript:void(0);" class="btn btn-warning btn-sm me-2" onclick="document.getElementById('update-status-form-{{ $pesanKontak->id }}').submit();">
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        

                                                        <!-- Tombol Hapus -->
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $pesanKontak->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>

                                                    <!-- Modal Konfirmasi Hapus -->
                                                    <div class="modal fade" id="modalHapus{{ $pesanKontak->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus pesan kontak dengan Subjek "{{ $pesanKontak->subjek }}"?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <form action="{{ route('pesan_kontak.destroy', $pesanKontak->id) }}" method="POST">
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
                                    {{ $pesanKontaks->links('pagination::bootstrap-4') }}
                                </div>

                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-12 -->
                </div> <!-- /.row -->
            {{-- </div> <!-- /.container-fluid --> --}}
        </div> <!-- /.animated -->
    {{-- </div> <!-- /.content --> --}}
@endsection