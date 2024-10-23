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
            background-color: #FF9800;
            color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .nav-pills .nav-link i {
            margin-right: 8px; 
        }

        .nav-pills .nav-link:hover {
            transform: translateY(-3px);
            background-color: #FF9800;
            color: #ffffff;
        }

        .profile-content {
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        #profile {
            padding: 0;
        }

        .tab-pane h3 {
            color: #2e7d32;
            margin-bottom: 20px;
        }

        .tab-pane h4 {
            color: #388e3c;
            margin: 15px 0;
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
        }
    </style>
@endsection

@section('hero')
    <h1>Tentang Kami</h1>
    <h2>Informasi profil bank</h2>
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
                </ul>
            </div>
        </div>

        <div class="container wow fadeIn">
            <div class="profile-content">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-tentang" role="tabpanel" 
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
                    </div>

                    <div class="tab-pane fade" id="pills-sejarah" role="tabpanel" 
                         aria-labelledby="pills-sejarah-tab" tabindex="0">
                        <h3>Sejarah</h3>
                        <p>{{ $profileData['sejarah'] }}</p>
                    </div>

                    <div class="tab-pane fade" id="pills-visimisi" role="tabpanel" 
                         aria-labelledby="pills-visimisi-tab" tabindex="0">
                        <h3>Visi & Misi</h3>
                        <h4>Visi</h4>
                        <p>{{ $profileData['visi_misi']['visi'] }}</p>
                        <h4>Misi</h4>
                        <p>{{ $profileData['visi_misi']['misi'] }}</p>
                    </div>

                    <div class="tab-pane fade" id="pills-struktur" role="tabpanel" 
                        aria-labelledby="pills-struktur-tab" tabindex="0">
                        <h3>Struktur Organisasi</h3>
                        <p>{{ $profileData['struktur_organisasi'] }}</p>
                        @if(isset($profileData['gambar']))
                            <img src="{{ asset($profileData['gambar']) }}" alt="Struktur Organisasi" class="img-fluid">
                        @endif
                    </div>

                    <div class="tab-pane fade" id="pills-milestone" role="tabpanel"
                        aria-labelledby="pills-milestone-tab" tabindex="0">
                        <h3>Milestone</h3>
                        <ul class="list-unstyled">
                            @foreach($profileData['milestone'] as $year => $event)
                                <li><strong>{{ $year }}</strong>: {{ $event }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection