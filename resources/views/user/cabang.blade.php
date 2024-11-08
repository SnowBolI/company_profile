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
    @if($cabangSliders->isNotEmpty())
        @foreach($cabangSliders as $slider)
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
<section id="about">
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-12">
                @if(empty(request()->segment(2)))
                    @component('user.component.all_cabang', ['cabangs' => $cabangs])
                    @endcomponent
                @else
                    @component('user.component.single_cabang', ['cabang' => $cabang])
                    @endcomponent
                @endif
            </div>
        </div>
    </div>
</section>
@endsection