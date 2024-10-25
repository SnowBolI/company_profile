@extends('layouts.user')

@section('header')
    <style>
        #hero {
            background: url('{{ asset('user/images/bank.jpg') }}') top center;
            background-repeat: no-repeat;
            width: 100%;
            background-size: cover;
        }
        .nav-pills .nav-link {
            color: #4CAF50;
            border-radius: 0;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        .nav-pills .nav-link.active {
            background-color: #4CAF50;
            color: white;
        }
        .profile-content {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            margin-top: 20px;
        }
        #profile {
            padding: 50px 0;
        }
    </style>
@endsection

{{-- @section('hero')

    <h1>Tentang Kami</h1>
    <h2>Informasi profil bank</h2>
@endsection --}}
@section('hero')
    @if($profileSliders->isNotEmpty())
        @foreach($profileSliders as $slider)
            <section id="hero" style="background-image: url('{{ asset('storage/' . $slider->gambar) }}');">
                <div class="hero-container">
                    <h1>Tentang Kami</h1>
                    <h2>Informasi profil bank</h2>
                </div>
            </section>
        @endforeach
    @else
        <section id="hero">
            <div class="hero-container">
                <h1>Tentang Kami</h1>
                <h2>Informasi profil bank</h2>
            </div>
        </section>
    @endif
@endsection

@section('content')  
    <section id="profile">
        <div class="container wow fadeIn">
                    <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-tentang-tab" data-bs-toggle="pill" 
                            data-bs-target="#pills-tentang" type="button" role="tab" 
                            aria-controls="pills-tentang" aria-selected="true">
                        <i class="fas fa-info-circle"></i> Tentang
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-sejarah-tab" data-bs-toggle="pill" 
                            data-bs-target="#pills-sejarah" type="button" role="tab" 
                            aria-controls="pills-sejarah" aria-selected="false">
                        <i class="fas fa-book"></i> Sejarah
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-visimisi-tab" data-bs-toggle="pill" 
                            data-bs-target="#pills-visimisi" type="button" role="tab" 
                            aria-controls="pills-visimisi" aria-selected="false">
                        <i class="fas fa-bullseye"></i> Visi & Misi
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-struktur-tab" data-bs-toggle="pill" 
                            data-bs-target="#pills-struktur" type="button" role="tab" 
                            aria-controls="pills-struktur" aria-selected="false">
                        <i class="fas fa-sitemap"></i> Struktur Organisasi
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-milestone-tab" data-bs-toggle="pill" 
                            data-bs-target="#pills-milestone" type="button" role="tab" 
                            aria-controls="pills-milestone" aria-selected="false">
                        <i class="fas fa-flag-checkered"></i> Milestone
                    </button>
                </li>
            </ul>

            
            <div class="profile-content">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-tentang" role="tabpanel" 
                         aria-labelledby="pills-tentang-tab" tabindex="0">
                        <h3>Tentang</h3>
                        <p>{{ $profileData['index'] }}</p>
                    </div>

                    {{-- <div class="tab-pane fade" id="pills-sejarah" role="tabpanel" 
                         aria-labelledby="pills-sejarah-tab" tabindex="0">
                        <h3>Sejarah</h3>
                        <p>{{ $profileData['sejarah'] }}</p>
                    </div> --}}
                    <div class="tab-pane fade" id="pills-sejarah" role="tabpanel" 
                        aria-labelledby="pills-sejarah-tab" tabindex="0">
                        <h3>Sejarah</h3>
                        <p>{!! $profileDataSejarah !!}</p> 
                    </div>
                    <div class="tab-pane fade" id="pills-visimisi" role="tabpanel" 
                         aria-labelledby="pills-visimisi-tab" tabindex="0">
                        <h3>Visi & Misi</h3>
                        <h4>Visi</h4>
                        <p>{!! $profileDataVisi !!}</p>
                        <h4>Misi</h4>
                        <p>{!! $profileDataMisi !!}</p>
                    </div>

                    {{-- <div class="tab-pane fade" id="pills-struktur" role="tabpanel" 
                        aria-labelledby="pills-struktur-tab" tabindex="0">
                        <h3>Struktur Organisasi</h3>
                        <p>{{ $profileData['struktur_organisasi'] }}</p>
                        
                        <!-- Akses path gambar dengan benar -->
                        @if(isset($profileData['gambar']))
                            <img src="{{ asset($profileData['gambar']) }}" alt="Struktur Organisasi" class="img-fluid">
                        @endif
                    </div> --}}
                    <div class="tab-pane fade" id="pills-struktur" role="tabpanel" 
                        aria-labelledby="pills-struktur-tab" tabindex="0">
                        <h3>Struktur Organisasi</h3>
                        @if($profileStrukturs->isNotEmpty())
                            @foreach($profileStrukturs as $struktur)
                                <p>{{ $struktur->judul }}</p>
                                 <img src="{{ Storage::url($struktur->gambar) }}"  alt="Struktur Organisasi" class="img-fluid"/>
                            @endforeach
                        @else
                            <p>Tidak ada data yang ditemukan</p>
                            <img src="" alt="Struktur Organisasi" class="img-fluid"/>
                        @endif
                       
                    </div>

                    <div class="tab-pane fade" id="pills-milestone" role="tabpanel" aria-labelledby="pills-milestone-tab" tabindex="0">
                        <h3>Milestone</h3>
                        @if($profileMilestones->isEmpty())
                            <p>Tidak ada data yang ditemukan</p>
                        @else
                            <ul>
                                @foreach($profileMilestones as $milestone)
                                    <li><strong>{{ $milestone->tahun }}</strong>: {{ $milestone->keterangan }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
