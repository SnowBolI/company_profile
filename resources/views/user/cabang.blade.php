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
        .cabang-card {
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 30px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        .cabang-card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .cabang-card .card-body {
            padding: 20px;
        }
        .cabang-title {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-weight: 600;
        }
        .cabang-info {
            color: #666;
            font-size: 0.9rem;
        }
        .contact-btn {
            background-color: #ffc107;
            color: #000;
            padding: 8px 20px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        .contact-btn:hover {
            background-color: #ffb300;
            transform: translateY(-2px);
        }
    </style>    
@endsection

@section('hero')
<section id="hero">
    <div class="hero-container">
        <h1>Tentang Kami</h1>
        <h2>Informasi profil bank</h2>
    </div>
</section>
@endsection

@section('content')
<section class="container mt-5">
    <!-- Main Branch cabang -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="cabang-card">
            <img src="{{ asset('user/images/fua.png') }}" alt="Kantor Cabang Utama">
                <div class="card-body">
                    <h3 class="cabang-title">Kantor Cabang Utama</h3>
                    <div class="cabang-info">
                        <p>
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Jl. Raya Jemiran - Ngadirejo, Kecamatan Kawedanan
                            Kabupaten Magetan Provinsi Jawa Timur 63382
                        </p>
                        <p>
                            <i class="fas fa-phone me-2"></i>
                            (0351) 439872
                        </p>
                        <div class="text-center mt-3">
                            <a href="#" class="contact-btn">Kontak Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Other Branch cabangs -->
    <div class="row">
        <!-- Trenggalek Branch -->
        <div class="col-md-4">
            <div class="cabang-card">
            <img src="{{ asset('user/images/ayaya.jpeg') }}" alt="Kantor Cabang Trenggalek">
                <div class="card-body">
                    <h3 class="cabang-title">Kantor Cabang Trenggalek</h3>
                    <div class="cabang-info">
                        <p>
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Timahan Asri, Trenggalek, Jawa Timur
                        </p>
                        <p>
                            <i class="fas fa-phone me-2"></i>
                            (0351) 869713
                        </p>
                        <div class="text-center mt-3">
                            <a href="#" class="contact-btn">Kontak Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Madiun Branch -->
        <div class="col-md-4">
            <div class="cabang-card">
            <img src="{{ asset('user/images/ayaya.jpeg') }}" alt="Kantor Cabang Madiun">
                <div class="card-body">
                    <h3 class="cabang-title">Kantor Cabang Madiun</h3>
                    <div class="cabang-info">
                        <p>
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Jl. Raya Ponorogo No. 134, Geger Madiun
                        </p>
                        <p>
                            <i class="fas fa-phone me-2"></i>
                            (0351) 869713
                        </p>
                        <div class="text-center mt-3">
                            <a href="#" class="contact-btn">Kontak Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ponorogo Branch -->
        <div class="col-md-4">
            <div class="cabang-card">
            <img src="{{ asset('user/images/ayaya.jpeg') }}" alt="Kantor Cabang Ponorogo">
                <div class="card-body">
                    <h3 class="cabang-title">Kantor Cabang Ponorogo</h3>
                    <div class="cabang-info">
                        <p>
                            <i class="fas fa-map-marker-alt me-2"></i>
                            Jl. Basuki Rahmat, Ponorogo
                        </p>
                        <p>
                            <i class="fas fa-phone me-2"></i>
                            (0352) 483459
                        </p>
                        <div class="text-center mt-3">
                            <a href="#" class="contact-btn">Kontak Kami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection