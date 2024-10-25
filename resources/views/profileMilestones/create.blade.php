@extends('layouts.admin')

@section('title', 'Create Profile Milestone')

@section('breadcrumbs', 'Profile Milestone')

@section('second-breadcrumb')
    <li>Create</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="col-12 mb-3">
                        <h3 align="center">Tambah Milestone</h3>
                    </div>
                    <form action="{{ route('profile_milestone.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tahun" class="font-weight-bold">Tahun</label>
                            <input type="number" id="tahun" class="form-control {{ $errors->first('tahun') ? 'is-invalid' : '' }}" name="tahun" placeholder="Tahun" value="{{ old('tahun') }}" required>
                            <div class="invalid-feedback">{{ $errors->first('tahun') }}</div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea id="keterangan" class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}" name="keterangan" placeholder="Keterangan" required>{{ old('keterangan') }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('keterangan') }}</div>
                        </div>
                        <div class="form-group mt-4">
                            <a href="{{ route('profile_milestone.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

