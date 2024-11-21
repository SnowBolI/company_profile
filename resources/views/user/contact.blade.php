@extends('layouts.user')

@section('header')
    <style>
        #hero{
            background: url('{{asset('user/images/contact.png')}}') top center;
            background-repeat: no-repeat;
            width:100%;
            background-size:cover;
        }
        body, #contact {
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

#contact {
    background-color: transparent;
}
    </style>    
@endsection

@section('hero')
    @if($kontakSliders->isNotEmpty())
        @foreach($kontakSliders as $slider)
            <section id="hero" style="background-image: url('{{ asset('storage/' . ($slider->gambar ?? 'default-image.jpg')) }}');">
                <div class="hero-container">
                    <h1>Kontak</h1>
                    {{-- <h2>Bergabung dan liburan bersama Kami</h2> --}}
                </div>
            </section>
        @endforeach
    @else
        <section id="hero">
            <div class="hero-container">
              <h1>Kontak</h1>
              {{-- <h2>Bergabung dan liburan bersama Kami</h2> --}}
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
                    <p>{{ $kontakInfo->telepon ?? 'Nomor telepon tidak tersedia' }}</p>
                </div>
            </div>

            <!-- Social Links -->
            <div class="social-links">
                <a href="https://wa.me/{{ $kontakInfo->whatsapp ?? '00000000000' }}" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                <a href="{{ $kontakInfo->facebook ?? '#' }}" class="facebook"><i class="fab fa-facebook"></i></a>
                <a href="{{ $kontakInfo->instagram ?? '#' }}" class="instagram"><i class="fab fa-instagram"></i></a>
                <a href="{{ $kontakInfo->youtube ?? '#' }}" class="youtube"><i class="fab fa-youtube"></i></a>
            </div>
        </div>

        <div class="map-form-container">
            <!-- Map Section -->
            <<div class="map-section">
                @if($kontakInfo && $kontakInfo->gmap)
                    <!-- Gunakan link embed langsung jika formatnya benar -->
                    {!! $kontakInfo->gmap !!}
                @else
                    <!-- Map default jika gmap kosong atau tidak dalam format embed -->
                    <iframe 
                        src="https://www.google.com/maps?q=default+location&output=embed" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                @endif
            </div>
            
            

            <!-- Form Section -->
            <div class="form-section">
                @if (($message = Session::get('message')))
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>Berhasil!</strong>
                    <p>{{ $message }}</p>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="form">
                    <form action="{{ route('contact.store') }}" method="post" role="form" class="contactForm">
                        @csrf

                        <input type="text" name="nama" id="nama" placeholder="Nama" required>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                        <input type="text" name="subjek" id="subjek" placeholder="Subjek" required>
                        <textarea name="pesan" id="pesan" placeholder="Pesan" required></textarea>
                        <div style="text-align: center;">
                            <button type="submit">Kirim Pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
