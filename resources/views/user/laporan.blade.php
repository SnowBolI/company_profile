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

    body, #about {
    background: 
        linear-gradient(
            to right, 
            rgba(240, 240, 240, 0) 0%, 
            rgba(240, 240, 240, 0.8) 25%, 
            rgba(240, 240, 240, 0.8) 75%, 
            rgba(240, 240, 240, 0) 100%
        ),
        url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23d3d3d3'%3E%3Cpath d='M30 30c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10-10-4.477-10-10z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    background-attachment: fixed;
}

#about {
    background-color: transparent;
} 
</style>
@endsection

@section('hero')
@if($laporanSliders->isNotEmpty())
    @foreach($laporanSliders as $slider)
        <section id="hero" style="background-image: url('{{ asset('storage/' . $slider->gambar) }}');">
            <div class="hero-container">
                <h1>Laporan Keuangan</h1>
                {{-- <h2>Laporan Keuangan Bank Ekadharma</h2> --}}
            </div>
        </section>
    @endforeach
@else
    <section id="hero">
        <div class="hero-container">
            <h1>Laporan</h1>
            {{-- <h2>Laporan Keuangan Bank Ekadharma</h2> --}}
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
                        <div class="col-md-4">
                            <div class="card h-100 border shadow-sm">
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-file-alt text-danger" style="font-size: 48px;"></i>
                                    </div>

                                    <h5 class="card-title mb-4">{{ $laporan->judul }}</h5>


                                    <div class="mt-auto w-100 text-center">
                                        <a href="{{ asset('storage/' . $laporan->file_pdf) }}"
                                            class="btn btn-warning px-4 py-2 w-100" target="_blank">
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
