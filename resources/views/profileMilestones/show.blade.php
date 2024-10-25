@extends('layouts.admin')

@section('title', 'Detail Profile Milestone')

@section('breadcrumbs', 'Profile Milestone')

@section('second-breadcrumb')
    <li>Detail</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="/admin/profile_milestone" class="mb-3 btn btn-primary">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <!-- Tampilkan detail Home Slider -->
                    <div class="mb-3">
                        <label for="tahun" class="font-weight-bold">Tahun</label>
                        <p id="tahun" class="form-control-plaintext">{{ $profileMilestone->tahun }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="font-weight-bold">Keterangan</label>
                        <p id="keterangan" class="form-control-plaintext">{{ $profileMilestone->keterangan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
