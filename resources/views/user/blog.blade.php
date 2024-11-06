@extends('layouts.user')

@section('header')
    <style>
        #hero{
            background: url('{{asset('user/images/Tugu-Jogja.png')}}') top center;
            background-repeat: no-repeat;
            width:100%;
            background-size:cover;
        }
        .form-control:focus {
          box-shadow: none;
        }

        .form-control::placeholder {
          font-size: 0.95rem;
          color: #aaa;
          font-style: italic;
        }
        .article{
          line-height: 1.6;
          font-size: 15px;
        } 
    </style>    
@endsection

{{-- @section('hero')
    <h1>Blog Jogja-Travel</h1>
    <h2>Kumpulan artikel-artikel wisata Jogja, Tips travelling, dan kesehatan</h2>
@endsection --}}

@section('hero')
    {{-- @if($profileSliders->isNotEmpty())
        @foreach($profileSliders as $slider)
            <section id="hero" style="background-image: url('{{ asset('storage/' . $slider->gambar) }}');">
                <div class="hero-container">
                    <h1>Tentang Kami</h1>
                    <h2>Informasi profil bank</h2>
                </div>
            </section>
        @endforeach
    @else --}}
        <section id="hero">
            <div class="hero-container">
              <h1>Edukasi & Webinar</h1>
              <h2>Kumpulan edukasi dan Webinar</h2>
            </div>
        </section>
    {{-- @endif --}}
@endsection


@section('content')  
      <!--========================== Article Section ============================-->
      <section id="about">
      @foreach($laporans as $tahun => $laporanList)
    <h2>Laporan Tahun {{ $tahun }}</h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($laporanList as $laporan)
        <div class="border rounded p-4">
            <div class="flex justify-center mb-4">
                <i class="document-icon text-red-500">📄</i>
            </div>
            
            <h3 class="text-center mb-4">{{ $laporan->judul }}</h3>
            
            <div class="text-center">
                <a href="{{ asset('storage/' . $laporan->file_pdf) }}" 
                   class="bg-yellow-400 text-white px-4 py-2 rounded">
                    Selengkapnya →
                </a>
            </div>
        </div>
        @endforeach
    </div>
@endforeach
      </section><!-- #services -->
  
     
@endsection