@extends('layouts.admin')

@section('title', 'Edit Kantor Kas')

@section('breadcrumbs', 'Kantor Kas ' . $namaCabang->nama)

@section('second-breadcrumb')
    <li>Edit</li>
@endsection

@section('css')
    <script src="/templateEditor/ckeditor/ckeditor.js"></script> 
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/admin/kantor_cabang/{{ $idkantorcabang }}/kantor_kas" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('kantor_kas.update', [$idkantorcabang, $kantorKas->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="nama" class="font-weight-bold">Nama Kas</label>
                            <input type="text" id="nama" class="form-control {{ $errors->first('nama') ? 'is-invalid' : '' }}" name="nama" placeholder="Nama Kas" value="{{ old('nama', $kantorKas->nama) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('nama') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="font-weight-bold">Alamat</label>
                            <textarea id="alamat" class="form-control {{ $errors->first('alamat') ? 'is-invalid' : '' }}" name="alamat" placeholder="Alamat" required>{{ old('alamat', $kantorKas->alamat) }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('alamat') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="gmap" class="font-weight-bold">Link Gmap</label>
                            <input type="text" id="gmap" class="form-control {{ $errors->first('gmap') ? 'is-invalid' : '' }}" name="gmap" placeholder="Link Gmap" value="{{ old('gmap', $kantorKas->gmap) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('gmap') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="telepon" class="font-weight-bold">Telepon</label>
                            <input type="number" id="telepon" class="form-control {{ $errors->first('telepon') ? 'is-invalid' : '' }}" name="telepon" placeholder="Telepon" value="{{ old('telepon', $kantorKas->telepon) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('telepon') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="font-weight-bold">Gambar</label>
                            @if($kantorKas->gambar)
                                <img class="img-fluid rounded mx-auto d-block my-3" src="{{ Storage::url($kantorKas->gambar) }}" alt="Gambar Produk">
                            @else
                                <p>Tidak ada gambar yang diunggah.</p>
                            @endif
                            <input type="file" id="gambar" class="form-control {{ $errors->first('gambar') ? 'is-invalid' : '' }}" name="gambar">
                            <div class="invalid-feedback">{{ $errors->first('gambar') }}</div>
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
@section('script')
    {{-- CKEditor --}}
    <script>
        CKEDITOR.replace('keterangan', {
            filebrowserUploadUrl    : "{{ route('kantor_kas.store', [$idkantorcabang, $kantorKas->id], ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod : 'form'
        });
    </script>
@endsection