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

{{-- @section('hero')
    <h1>Contact Jogja-Travel</h1>
    <h2>Bergabung dan liburan bersama Kami</h2>
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
              <h1>Contact Jogja-Travel</h1>
              <h2>Bergabung dan liburan bersama Kami</h2>
            </div>
        </section>
    {{-- @endif --}}
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
    <p>
      Jl. Raya Jaranan
      Ngadirejo, Kecamatan Kawedanan, Kabupaten Magetan
      Provinsi Jawa Timur
      63382
    </p>
                </div>

                <div>
                    <i class="fas fa-envelope"></i>
                    <p>bank.ekadharma@gmail.com</p>
                </div>

                <div>
                    <i class="fas fa-phone"></i>
                    <p>(0351) 439872</p>
                </div>
            </div>

            <div class="social-links">
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" class="linkedin"><i class="fab fa-linkedin"></i></a>
            </div>
        </div>

        <!-- Map and Form Container -->
        <div class="map-form-container">
            <!-- Map Section -->
            <div class="map-section">
            <iframe 
                src="https://www.google.com/maps?q=Bank%20Ekadharma,%20Jl.%20Raya%20Jaranan%20%E2%80%93%20Ngadirejo,%20Kecamatan%20Kawedanan,%20Kabupaten%20Magetan,%20Jawa%20Timur%2063382&output=embed" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
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