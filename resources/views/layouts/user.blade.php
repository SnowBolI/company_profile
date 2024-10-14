<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BPR Ekadharma</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{asset('user/images/logobank.png')}}" rel="icon">
  <link href="{{asset('user/images/apple-touch-icon.png')}}" rel="apple-touch-icon">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('user/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('user/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('user/lib/animate/animate.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('user/css/style.css')}}" rel="stylesheet">

  @yield('header')


</head>

<body>
  <!-- Essential Scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    
    <!-- WOW JS for animations -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
  @php
        $url = request()->segment(1);
  @endphp

  <!--========================== Header ============================-->
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <a href="#hero">
          <img src="{{asset('user/images/logobank.png')}}" style="margin-right:0px; width: auto; height: 60px;"/></img>
          <h2 class="d-inline text-light" style="text-decoration: none;">Ekadharma</h2>
        </a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="{{$url=='home'?'menu-active':''}}"><a href="{{url('home')}}" style="color: black;">Home</a></li>
          <li class="{{$url=='profile'?'menu-active':''}}"><a href="{{url('profile')}}" style="color: black;">Profile</a></li>
          <li class="{{$url=='blog'?'menu-active':''}}"><a href="{{url('blog')}}" style="color: black;">Blog</a></li>
          <li class="{{$url=='destination'?'menu-active':''}}"><a href="{{url('destination')}}" style="color: black;">Destination</a></li>
          <li class="{{$url=='contact'?'menu-active':''}}"><a href="{{url('contact')}}" style="color: black;">Contact </a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--========================== Hero Section ============================-->
  <section id="hero">
    <div class="hero-container">
      @yield('hero')
    </div>
  </section>

  <main id="main">

    @yield('content')

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
        <div class="footer-content">
            <div class="logo-section">
                <img src="user/images/logobank.png" alt="Bank Ekadharma" style="max-width: 50%;">
                <img src="user/images/boot.png" alt="Logo1" style="max-width: 100%;">
                <img src="user/images/boot.png" alt="Logo2" style="max-width: 100%;">
                <img src="user/images/boot.png" alt="Logo3" style="max-width: 100%;">
                <img src="user/images/boot.png" alt="Logo4" style="max-width: 100%;">
            </div>
            <div class="info-section">
                <div class="contact-section">
                    <h3>Hubungi Kami</h3>
                    <ul>
                        <li>Jl. Raya Jaranan - Ngadirejo</li>
                        <li>Kecamatan Kawedanan Kabupaten Magetan Provinsi Jawa Timur 63382</li>
                        <li>bank.ekadharma@gmail.com</li>
                        <li>Telepon/FAX: (0351) 439872</li>
                    </ul>
                    <div class="social-icons">
                        <a href="#" aria-label="Facebook">F</a>
                        <a href="#" aria-label="Instagram">I</a>
                    </div>
                </div>
                <div class="links-section">
                    <h3>Link</h3>
                    <ul>
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Profil BPR</a></li>
                        <li><a href="#">Produk</a></li>
                        <li><a href="#">Edukasi & Webinar</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Laporan</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="registered-section">
                    <h3>Terdaftar & Diawasi</h3>
                    <img src="path_to_lps_logo.png" alt="LPS">
                    <img src="user/images/ojeka.png" alt="OJK">
                </div>
            </div>
        </div>
        <div class="copyright">
            Copyright © 2024 PT BPR Ekadharma Bhinaraharja | Developed by Archipelago Digital Studio
        </div>
    </footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{asset('user/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('user/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('user/lib/wow/wow.min.js')}}"></script>

  <script src="{{asset('user/lib/superfish/superfish.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  {{-- <script src="{{asset('user/contactform/contactform.js')}}"></script> --}}

  <!-- Template Main Javascript File -->
  <script src="{{asset('user/js/main.js')}}"></script>

</body>
</html>
