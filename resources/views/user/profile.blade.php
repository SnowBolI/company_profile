@extends('layouts.user')

@section('header')
    <style>
        #hero {
            background: url('{{ asset('user/images/bank.jpg') }}') top center;
            background-repeat: no-repeat;
            width: 100%;
            background-size: cover;
            margin-bottom: 0;
        }

        .nav-wrapper {
            background-color: #4CAF50;
            padding: 40px 0;
            width: 100%;
            margin-top: 0;
            margin-bottom: 10px;
        }

        #hero .container {
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .nav-pills .nav-link {
            color: #4CAF50;
            margin: 0 10px;
            transition: all 0.3s ease;
            border-radius: 5px;
            background-color: #ffffff; 
            padding: 12px 25px;
            font-weight: 500;
        }

        .nav-pills .nav-link.active {
            background-color: #FFC107;
            color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .nav-pills .nav-link i {
            margin-right: 8px; 
        }

        .nav-pills .nav-link:hover {
            transform: translateY(-3px);
            background-color:#FFC107;
            color: #ffffff;
        }

        .profile-content {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            min-height: 500px;
        }

        #profile {
            padding: 0;
            
        }

        .tab-pane h3 {
            color: #2e7d32;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .tab-pane h4 {
            color: #388e3c;
            margin: 0 0;
        }

        .tab-pane p {
            line-height: 1.6;
            color: #333;
        }

        .tab-pane ul li {
            margin-bottom: 10px;
        }

        .img-fluid {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        /* Modified Management Team Styles for Horizontal Layout */
        .management-team {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .management-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .management-card:hover {
            transform: translateY(-5px);
        }

        .management-photo {
            width: 180px;
            height: 180px;
            border-radius: 10px;
            object-fit: cover;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            margin-bottom: 15px;
        }

        .management-info {
            text-align: center;
            padding: 10px;
        }

        .management-name {
            color: #2e7d32;
            font-size: 1.1rem;
            font-weight: 600;
            margin: 10px 0 5px;
        }

        .management-title {
            color: #4CAF50;
            font-size: 1rem;
            font-weight: 500;
            margin: 0 0 10px;
        }

        #pills-sejarah p, #pills-visimisi p {
            text-align: justify;
        }

        .vision-section h4, .mission-section h4 {
            color: #4CAF50; /* Hijau cerah untuk sub judul */
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        /* Text for Visi & Misi */
        .vision-section p, .mission-section p {
            color: #333; /* Warna teks utama */
            font-size: 18px;
            line-height: 1.8;
            margin-bottom: 20px;
            text-align: justify;
            padding: 10px 20px;
            background-color: #f9f9f9; /* Latar belakang abu-abu terang */
            border-left: 4px solid #FF9800; /* Garis dekoratif di sebelah kiri */
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Efek bayangan lembut */
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .management-team {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-wrapper {
                padding: 30px 0;
            }
            .penghargaan-grid {
                grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
                gap: 20px;
                padding: 15px;
            }
            .penghargaan-content {
                padding: 15px;
            }

            .penghargaan-content h4 {
                font-size: 16px;
            }

            .penghargaan-content p {
                font-size: 13px;
            }
            
            .nav-pills .nav-link {
                margin: 5px;
                padding: 10px 20px;
                font-size: 14px;
            }

            .profile-content {
                padding: 20px;
            }

            .management-team {
                grid-template-columns: 1fr;
            }

            .management-photo {
                width: 150px;
                height: 150px;
            }

            .section-title {
            text-align: center;
            margin-bottom: 2rem;
            color: #333;
            font-size: 2rem;
            }

            /* penghargaan */
            .award-card {
            max-width: 45%; /* Mengatur lebar maksimum kontainer agar gambar tidak terlalu besar */
            margin: 0 auto; /* Menempatkan elemen di tengah */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            flex: 0 1 45%;
            text-align: center;
            }

            .award-photo {
            width: 100%; /* Menjaga agar gambar responsif */
            border-radius: 5px;
            height: auto;
            max-height: 100px
            object-fit: cover;
            }

            .award-info {
            margin-top: 10px;
            }
        }
    </style>
@endsection

@section('hero')
@if($profileSliders->isNotEmpty())
@foreach($profileSliders as $slider)
    <section id="hero" style="background-image: url('{{ asset('storage/' . $slider->gambar) }}');">
        <div class="hero-container">
            <h1>Profil</h1>
            {{-- <h2>Informasi profil bank</h2> --}}
        </div>
    </section>
@endforeach
@else
<section id="hero">
    <div class="hero-container">
        <h1>Profil</h1>
        {{-- <h2>Informasi profil bank</h2> --}}
    </div>
</section>
@endif
@endsection


@section('content')  
    <section id="profile">
        <div class="nav-wrapper">
            <div class="container">
                <ul class="nav nav-pills mb-0 justify-content-center" id="pills-tab" role="tablist">
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
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-penghargaan-tab" data-bs-toggle="pill" 
                                data-bs-target="#pills-penghargaan" type="button" role="tab" 
                                aria-controls="pills-penghargaan" aria-selected="false">
                            <i class="fas fa-trophy"></i>Penghargaan
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container wow fadeIn">
            <div class="profile-content">
                <div class="tab-content" id="pills-tabContent">
                    {{-- <div class="tab-pane fade show active" id="pills-tentang" role="tabpanel" 
                         aria-labelledby="pills-tentang-tab" tabindex="0">
                        <h3>Tentang</h3>
                        
                        <div class="management-team">
                            <div class="management-card">
                                <img src="{{ asset('user/images/orang.png') }}" alt="Direktur Utama" class="management-photo">
                                <div class="management-info">
                                    <h4 class="management-title">Direktur Utama</h4>
                                    <p class="management-name">Muhammad Nuf Bernadin, SE</p>
                                </div>
                            </div>

                            <div class="management-card">
                                <img src="{{ asset('user/images/orang.png') }}" alt="Direktur" class="management-photo">
                                <div class="management-info">
                                    <h4 class="management-title">Direktur</h4>
                                    <p class="management-name">Dwiatmodjo Bahagio, SP</p>
                                </div>
                            </div>

                            <div class="management-card">
                                <img src="{{ asset('user/images/orang.png') }}" alt="Komisaris Utama" class="management-photo">
                                <div class="management-info">
                                    <h4 class="management-title">Komisaris Utama</h4>
                                    <p class="management-name">Drs. Hariyadi, MM</p>
                                </div>
                            </div>

                            <div class="management-card">
                                <img src="{{ asset('user/images/orang.png') }}" alt="Komisaris" class="management-photo">
                                <div class="management-info">
                                    <h4 class="management-title">Komisaris</h4>
                                    <p class="management-name">Dr. Arqom Kuswanjono M. Hum</p>
                                </div>
                            </div>
                        </div>

                        <!-- <p>{{ $profileData['index'] }}</p> -->
                    </div> --}}
                    <div class="tab-pane fade show active" id="pills-tentang" role="tabpanel" 
                        aria-labelledby="pills-tentang-tab" tabindex="0">
                        <h3>Tentang</h3>
                        
                        <div class="management-team">
                            @if($profileTentangs->isEmpty())
                                <p>Tidak ada data yang ditemukan</p>
                            @else
                                @foreach($profileTentangs as $tentang)
                                    <div class="management-card">
                                        <img src="{{ asset('storage/' . $tentang->gambar) }}" alt="{{ $tentang->jabatan }}" class="management-photo">
                                        <div class="management-info">
                                            <h4 class="management-title">{{ $tentang->jabatan }}</h4>
                                            <p class="management-name">{{ $tentang->nama }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>


                    <div class="tab-pane fade" id="pills-sejarah" role="tabpanel" 
                         aria-labelledby="pills-sejarah-tab" tabindex="0">
                        <h3>Sejarah</h3>
                        <p class="text-justify">{!! $profileDataSejarah !!}</p>
                    </div>


                    <div class="tab-pane fade" id="pills-visimisi" role="tabpanel" aria-labelledby="pills-visimisi-tab" tabindex="0">
                        <h3>Visi & Misi</h3>

                        <!-- Visi Section -->
                        <div class="vision-section">
                            <h4>Visi</h4>
                            {!! $profileDataVisi !!}
                        </div>

                        <!-- Misi Section -->
                        <div class="mission-section">
                            <h4>Misi</h4>
                            {!! $profileDataMisi !!}
                        </div>
                    </div>



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

                    <div class="tab-pane fade" id="pills-milestone" role="tabpanel"
                    aria-labelledby="pills-milestone-tab" tabindex="0">
                    <h3>Milestone</h3>
                    @if($profileMilestones->isEmpty())
                        <p>Tidak ada data yang ditemukan</p>
                    @else
                        <div class="timeline">
                            @foreach($profileMilestones as $milestone)
                                <div class="timeline__event animated fadeInUp timeline__event--type1">
                                    <div class="timeline__event__icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="timeline__event__date">
                                        {{ $milestone->tahun }}
                                    </div>
                                    <div class="timeline__event__content">
                                        <div class="timeline__event__description">
                                            <p>{{ $milestone->keterangan }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                   <!-- Tab Penghargaan -->
                    <div class="tab-pane fade" id="pills-penghargaan" role="tabpanel" 
                        aria-labelledby="pills-penghargaan-tab" tabindex="0">
                        <h3>Penghargaan</h3>
                        
                        <div class="row">
                            <!-- Sertifikat 1 -->
                            <div class="col-md-6 mb-4">
                                <div class="award-card text-center">
                                    <img src="{{ asset('user/images/bank3.jpeg') }}" alt="Sertifikat 1" class="award-photo img-fluid">
                                    <div class="award-info mt-2">
                                        <h4 class="award-title">Penghargaan 1</h4>
                                        <p class="award-description">Deskripsi singkat tentang sertifikat ini.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sertifikat 2 -->
                            <div class="col-md-6 mb-4">
                                <div class="award-card text-center">
                                    <img src="{{ asset('user/images/infobank_2022.jpg') }}" alt="Sertifikat 2" class="award-photo img-fluid">
                                    <div class="award-info mt-2">
                                        <h4 class="award-title">Penghargaan 2</h4>
                                        <p class="award-description">Deskripsi singkat tentang sertifikat ini.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sertifikat 3 -->
                            <div class="col-md-6 mb-4">
                                <div class="award-card text-center">
                                    <img src="{{ asset('user/images/sertif3.jpeg') }}" alt="Sertifikat 3" class="award-photo img-fluid">
                                    <div class="award-info mt-2">
                                        <h4 class="award-title">Penghargaan 3</h4>
                                        <p class="award-description">Deskripsi singkat tentang sertifikat ini.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sertifikat 4 -->
                            <div class="col-md-6 mb-4">
                                <div class="award-card text-center">
                                    <img src="{{ asset('user/images/sertif4.jpeg') }}" alt="Sertifikat 4" class="award-photo img-fluid">
                                    <div class="award-info mt-2">
                                        <h4 class="award-title">Penghargaan 4</h4>
                                        <p class="award-description">Deskripsi singkat tentang sertifikat ini.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sertifikat 5 -->
                            <div class="col-md-6 mb-4">
                                <div class="award-card text-center">
                                    <img src="{{ asset('user/images/sertifikat5.jpg') }}" alt="Sertifikat 5" class="award-photo img-fluid">
                                    <div class="award-info mt-2">
                                        <h4 class="award-title">Penghargaan 5</h4>
                                        <p class="award-description">Deskripsi singkat tentang sertifikat ini.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Sertifikat 6 -->
                            <div class="col-md-6 mb-4">
                                <div class="award-card text-center">
                                    <img src="{{ asset('user/images/sertifikat6.jpg') }}" alt="Sertifikat 6" class="award-photo img-fluid">
                                    <div class="award-info mt-2">
                                        <h4 class="award-title">Penghargaan 6</h4>
                                        <p class="award-description">Deskripsi singkat tentang sertifikat ini.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection