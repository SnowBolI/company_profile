@extends('layouts.admin')

@section('title', 'Edit Profile Milestone')

@section('breadcrumbs', 'Profile Milestone')

@section('second-breadcrumb')
    <li>Edit</li>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="/admin/profile_milestone" class="mb-3 btn btn-primary">Kembali</a>
                    <form action="{{ route('profile_milestone.update', $profileMilestone->id) }}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="tahun" class="font-weight-bold">Tahun</label>
                            <input type="text" id="tahun" class="form-control {{ $errors->first('tahun') ? 'is-invalid' : '' }}" name="tahun" placeholder="Tahun" value="{{ old('tahun', $profileMilestone->tahun) }}" required>
                            <div class="invalid-feedback">{{ $errors->first('tahun') }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="font-weight-bold">Keterangan</label>
                            <textarea id="keterangan" class="form-control {{ $errors->first('keterangan') ? 'is-invalid' : '' }}" name="keterangan" placeholder="Keterangan" required>{{ old('keterangan', $profileMilestone->keterangan) }}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('keterangan') }}</div>
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

