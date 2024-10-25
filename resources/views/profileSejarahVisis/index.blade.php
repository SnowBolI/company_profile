@extends('layouts.admin') {{-- Sesuaikan dengan layout Ela Admin --}}

@section('title', 'Profile Sejarah Visi')
@section('breadcrumbs', 'Profile Sejarah Visi')

@section('content')
    {{-- <div class="content"> --}}
        <div class="animated fadeIn">
            {{-- <div class="container-fluid"> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <a href="/admin/profile_sejarah_visi/create" class="mb-3 btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>

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
                                <form method="GET" action="{{ url('/admin/profile_sejarah_visi') }}" class="mb-3">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Cari Sejarah Visi..." value="{{ $search }}">
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
                                                <th style="width: 55%;">Konten</th>
                                                <th style="width: 15%;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = ($profileSejarahVisis->currentPage() - 1) * $profileSejarahVisis->perPage() + 1;
                                            @endphp
                                            @foreach ($profileSejarahVisis as $sejarahvisi)
                                            <tr>
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{{ $sejarahvisi->judul }}</td>
                                                <td class="text-truncate" style="max-width: 150px;">{!! $sejarahvisi->konten !!}</td>

                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('profile_sejarah_visi.show', $sejarahvisi->id) }}" class="btn btn-info btn-sm me-2">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <a href="{{ route('profile_sejarah_visi.edit', $sejarahvisi->id) }}" class="btn btn-warning btn-sm me-2">
                                                            <i class="fa fa-edit"></i>
                                                        </a>

                                                        <!-- Tombol Hapus -->
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus{{ $sejarahvisi->id }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>

                                                    <!-- Modal Konfirmasi Hapus -->
                                                    <div class="modal fade" id="modalHapus{{ $sejarahvisi->id }}" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Hapus</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Apakah Anda yakin ingin menghapus sejarah visi dengan judul "{{ $sejarahvisi->judul }}"?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                    <form action="{{ route('profile_sejarah_visi.destroy', $sejarahvisi->id) }}" method="POST">
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

                                            <!-- Modal Gambar sejarahvisi -->
                                            {{-- <div class="modal fade" id="modalGambar{{ $sejarahvisi->id }}" tabindex="-1" role="dialog" aria-labelledby="modalGambarLabel{{ $sejarahvisi->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalGambarLabel{{ $sejarahvisi->id }}">Gambar sejarahvisi</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img class="img-fluid" src="{{ Storage::url($sejarahvisi->gambar) }}" alt="Gambar sejarahvisi">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!-- Pagination Links -->
                                    {{ $profileSejarahVisis->links('pagination::bootstrap-4') }}
                                </div>

                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col-lg-12 -->
                </div> <!-- /.row -->
            {{-- </div> <!-- /.container-fluid --> --}}
        </div> <!-- /.animated -->
    {{-- </div> <!-- /.content --> --}}
@endsection
