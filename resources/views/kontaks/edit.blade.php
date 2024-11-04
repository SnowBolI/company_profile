@extends('layouts.admin')

@section('title', 'Edit Kontak')

@section('breadcrumbs', 'Kontak')

@section('second-breadcrumb')
    <li>Edit</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('kontak.index') }}" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('kontak.update', $kontak->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="telepon" class="font-weight-bold">Telepon</label>
                            <input type="text" id="telepon" class="form-control {{ $errors->first('telepon') ? 'is-invalid' : '' }}" name="telepon" placeholder="Telepon" value="{{ old('telepon', $kontak->telepon) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('telepon') }}</div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="font-weight-bold">Email</label>
                            <input type="email" id="email" class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email', $kontak->email) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                        </div>

                        <div class="mb-3">
                            <label for="alamat" class="font-weight-bold">Alamat</label>
                            <textarea id="alamat" class="form-control {{ $errors->first('alamat') ? 'is-invalid' : '' }}" name="alamat" placeholder="Alamat" required>{{ old('alamat', $kontak->alamat) }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('alamat') }}</div>
                        </div>

                        <div class="mb-3">
                            <label for="gmap" class="font-weight-bold">Google Maps Link</label>
                            <textarea id="gmap" class="form-control {{ $errors->first('gmap') ? 'is-invalid' : '' }}" name="gmap" placeholder="Link Google Maps" required>{{ old('gmap', $kontak->gmap) }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('gmap') }}</div>
                        </div>

                        <div class="mb-3">
                            <label for="whatsapp" class="font-weight-bold">WhatsApp</label>
                            <input type="text" id="whatsapp" class="form-control {{ $errors->first('whatsapp') ? 'is-invalid' : '' }}" name="whatsapp" placeholder="WhatsApp" value="{{ old('whatsapp', $kontak->whatsapp) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('whatsapp') }}</div>
                        </div>

                        <div class="mb-3">
                            <label for="facebook" class="font-weight-bold">Facebook</label>
                            <input type="text" id="facebook" class="form-control {{ $errors->first('facebook') ? 'is-invalid' : '' }}" name="facebook" placeholder="URL Facebook" value="{{ old('facebook', $kontak->facebook) }}">
                            <div class="invalid-feedback">{{ $errors->first('facebook') }}</div>
                        </div>

                        <div class="mb-3">
                            <label for="instagram" class="font-weight-bold">Instagram</label>
                            <input type="text" id="instagram" class="form-control {{ $errors->first('instagram') ? 'is-invalid' : '' }}" name="instagram" placeholder="URL Instagram" value="{{ old('instagram', $kontak->instagram) }}">
                            <div class="invalid-feedback">{{ $errors->first('instagram') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="youtube" class="font-weight-bold">Youtube</label>
                            <input type="text" id="youtube" class="form-control {{ $errors->first('youtube') ? 'is-invalid' : '' }}" name="youtube" placeholder="URL youtube" value="{{ old('youtube', $kontak->youtube) }}">
                            <div class="invalid-feedback">{{ $errors->first('youtube') }}</div>
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
