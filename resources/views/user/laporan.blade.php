@extends('layouts.user')

@section('header')
    <style>
        #hero {
            background: url('{{ asset('user/images/Tugu-Jogja.png') }}') top center;
            background-repeat: no-repeat;
            width: 100%;
            background-size: cover;
        }
        .form-control:focus {
            box-shadow: none;
        }
        .form-control::placeholder {
            font-size: 0.95rem;
            color: #aaa;
            font-style: italic;
        }
        .article {
            line-height: 1.6;
            font-size: 15px;
        } 
    </style>    
@endsection

@section('hero')
@if($laporanSliders->isNotEmpty())
@foreach($laporanSliders as $slider)
    <section id="hero" style="background-image: url('{{ asset('storage/' . $slider->gambar) }}');">
        <div class="hero-container">
            <h1>Laporan Keuangan</h1>
            <h2>Laporan Keuangan Bank Ekadharma</h2>
        </div>
    </section>
@endforeach
@else
<section id="hero">
    <div class="hero-container">
        <h1>Laporan</h1>
        <h2>Laporan Keuangan Bank Ekadharma</h2>
    </div>
</section>
@endif
@endsection

@section('content')  
    <!--========================== Article Section ============================-->
    <section id="about" class="py-5">
    <div class="container">
        @foreach($laporans as $tahun => $laporanList)
            <div class="mb-5">
                <h2 class="mb-4">Laporan Tahun {{ $tahun }}</h2>
                
                <div class="row g-4">
                    @foreach($laporanList as $laporan)
                    <div class="col-md-3">
                        <div class="card h-100 border rounded shadow-sm">
                            <div class="card-body d-flex flex-column align-items-center justify-content-between p-4">
                                <div class="text-center w-100">
                                    <div class="mb-4">
                                        <i class="fas fa-file-alt text-danger" style="font-size: 48px;"></i>
                                    </div>
                                    
                                    <h5 class="card-title" style="font-size: 16px; line-height: 1.4; min-height: 70px;">
                                        {{ $laporan->judul }}
                                    </h5>
                                </div>
                                
                                <div class="mt-auto w-100 text-center">
                                    <a href="{{ asset('storage/' . $laporan->file_pdf) }}" 
                                       class="btn btn-warning px-4 py-2 w-100">
                                        Selengkapnya →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    </section>
@endsection
