@extends('layouts.user')

@section('header')
    <style>
        #hero{
            background: url('{{asset('user/images/contact.png')}}') top center;
            background-repeat: no-repeat;
            width:100%;
            background-size:cover;
        }
    </style>    
@endsection

@section('hero')
    @if($kontakSliders->isNotEmpty())
        @foreach($kontakSliders as $slider)
            <section id="hero" style="background-image: url('{{ asset('storage/' . $slider->gambar) }}');">
                <div class="hero-container">
                    <h1>{{ $slider->judul ?? 'Tentang Kami' }}</h1>
                    <h2>{{ $slider->keterangan ?? 'Informasi profil bank' }}</h2>
                </div>
            </section>
        @endforeach
    @else
        <section id="hero">
            <div class="hero-container">
              <h1>Contact Jogja-Travel</h1>
              <h2>Bergabung dan liburan bersama Kami</h2>
            </div>
        </section>
    @endif
@endsection

@section('content')

<section id="contact">
    <div class="container">
        <div class="section-header">
            <h3 class="section-title">HUBUNGI KAMI</h3>
            <p class="section-description">Kami Siap Melayani Anda Sepenuh Hati</p>
        </div>

        <!-- Contact Info Section -->
        <div class="contact-info-section">
            <div class="info">
                <div class="info-address">
                    <i class="fa fa-map-marker" style="font-size:24px; color:#2dc997;"></i>
                    <p>{{ $kontakInfo->alamat ?? 'Alamat tidak tersedia' }}</p>
                </div>

                <div>
                    <i class="fas fa-envelope"></i>
                    <p>{{ $kontakInfo->email ?? 'Email tidak tersedia' }}</p>
                </div>

                <div>
                    <i class="fas fa-phone"></i>
                    <p>{{ $kontakInfo->telepon ?? '(Nomor telepon tidak tersedia)' }}</p>
                </div>
            </div>

            <div class="social-links">
                @if($kontakInfo->whatsapp)
                    <a href="https://wa.me/{{ $kontakInfo->whatsapp }}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                @endif
                @if($kontakInfo->facebook)
                    <a href="{{ $kontakInfo->facebook }}" class="facebook"><i class="fab fa-facebook"></i></a>
                @endif
                @if($kontakInfo->instagram)
                    <a href="{{ $kontakInfo->instagram }}" class="instagram"><i class="fab fa-instagram"></i></a>
                @endif
                @if($kontakInfo->youtube)
                    <a href="{{ $kontakInfo->youtube }}" class="youtube"><i class="fab fa-youtube"></i></a>
                @endif
            </div>
        </div>

        <div class="map-form-container">
            <div class="map-section">
                    <!-- Gunakan link embed langsung jika formatnya benar -->
                    
                        {!! $kontakInfo->gmap !!}
    
            </div>

            <!-- Form Section -->
            <div class="form-section">
                <div class="form">
                    <form action="" method="post" role="form" class="contactForm">
                        <input type="text" name="name" placeholder="Your Name" required>
                        <input type="email" name="email" placeholder="Your Email" required>
                        <input type="text" name="subject" placeholder="Subject" required>
                        <textarea name="message" placeholder="Message" required></textarea>
                        <div style="text-align: center;">
                            <button type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    @endsection