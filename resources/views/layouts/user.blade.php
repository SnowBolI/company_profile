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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700"
    rel="stylesheet">

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
          <img src="{{asset('user/images/logonew.png')}}" style="margin-right:0px; width: auto; height: 45px;" /></img>
        </a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="{{$url == 'home' ? 'menu-active' : ''}}"><a href="{{url('home')}}" style="color: black;">Beranda</a></li>
          <li class="{{$url == 'profile' ? 'menu-active' : ''}}"><a href="{{url('profile')}}" style="color: black;">Profile</a></li>
          <li class="{{$url == 'blog' ? 'menu-active' : ''}}"><a href="{{url('blog')}}" style="color: black;">Edukasi</a></li>
          <li class="{{$url == 'destination' ? 'menu-active' : ''}}"><a href="{{url('destination')}}" style="color: black;">Berita</a></li>
          <li class="{{$url == 'contact' ? 'menu-active' : ''}}"><a href="{{url('contact')}}" style="color: black;">Kontak
            </a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--========================== Hero Section ============================-->
  {{-- <section id="hero">
    <div class="hero-container">
      @yield('hero')
    </div>
  </section> --}}
  @yield('hero')

  <main id="main">

    @yield('content')

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer class="footer">
  <div class="footer-container">
    <div class="footer-section">
      <h3>Contact Us</h3>
      <ul class="contact-info">
        <li><i class="fas fa-map-marker-alt"></i>
        Jl. Raya Jaranan – Ngadirejo, Kecamatan Kawedanan Kabupaten Magetan Provinsi Jawa Timur 63382</li>
        <li><i class="fas fa-envelope"></i>bank.ekadharma@gmail.com</li>
        <li><i class="fas fa-phone"></i>Telepon/FAX: (0351) 439872</li>
      </ul>
    </div>
    <div class="footer-section">
      <h3>Quick Links</h3>
      <ul class="quick-links">
        <li><a href="{{url('home')}}">Beranda</a></li>
        <li><a href="{{url('profile')}}">Profile BPR</a></li>
        <li><a href="{{url('blog')}}">Edukasi</a></li>
        <li><a href="{{url('destination')}}">Berita</a></li>
        <li><a href="{{url('contact')}}">Contact</a></li>
        <li><a href="{{url('home')}}">FAQ</a></li>
      </ul>
    </div>
    <div class="footer-section">
      <h3>Newsletter</h3>
      <p>Subscribe to our newsletter for updates.</p>
      <div class="email-subscribe">
        <input type="email" placeholder="Enter your email">
        <button><i class="fas fa-paper-plane"></i></button>
      </div>
      <div class="social-icons">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin-in"></i></a>
      </div>
    </div>
  </div>
  

  {{-- <div class="footer-banner">
    <div class="logo-scroll">
      <div class="logo-item">
        <img src="user/images/logobank.png" alt="Logo 1">
      </div>
      <div class="logo-item">
        <img src="user/images/bi.png" alt="Logo 2">
      </div>
      <div class="logo-item">
        <img src="user/images/indo2.png" alt="Logo 3">
      </div>
      <div class="logo-item">
        <img src="user/images/ayobank.png" alt="Logo 4">
      </div>
      <div class="logo-item">
        <img src="user/images/bpr.png" alt="Logo 5">
      </div>
      <div class="logo-item">
        <img src="user/images/magetan.png" alt="Logo 6">
      </div>
      <div class="logo-item">
        <img src="user/images/lps.png" alt="Logo 6">
      </div>
      <div class="logo-item">
        <img src="user/images/ojk.png" alt="Logo 6">
      </div>
    </div>
  </div> --}}
  <div class="footer-banner">
  <div class="banner-text">
      Terdaftar dan Diawasi
    </div>
    <div class="logo-container">
      <div class="logo">
        <img src="user/images/logobank.png" alt="Logo 1">
        <img src="user/images/bi.png" alt="Logo 2">
        <img src="user/images/indo2.png" alt="Logo 3">
        <img src="user/images/ayobank.png" alt="Logo 4">
        <img src="user/images/bpr.png" alt="Logo 5">
        <img src="user/images/magetan.png" alt="Logo 6">
        <img src="user/images/lps.png" alt="Logo 7">
        <img src="user/images/ojk.png" alt="Logo 8">

      </div>
      <div class="logo">
        <img src="user/images/logobank.png" alt="Logo 1">
        <img src="user/images/bi.png" alt="Logo 2">
        <img src="user/images/indo2.png" alt="Logo 3">
        <img src="user/images/ayobank.png" alt="Logo 4">
        <img src="user/images/bpr.png" alt="Logo 5">
        <img src="user/images/magetan.png" alt="Logo 6">
        <img src="user/images/lps.png" alt="Logo 7">
        <img src="user/images/ojk.png" alt="Logo 8">
      </div>
    </div>
  </div>
</footer>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{asset('user/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('user/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('user/lib/wow/wow.min.js')}}"></script>

  <script src="{{asset('user/lib/superfish/superfish.min.js')}}"></script>

  <!-- Contact Form JavaScript File -->
  {{--
  <script src="{{asset('user/contactform/contactform.js')}}"></script> --}}

  <!-- Template Main Javascript File -->
  <script src="{{asset('user/js/main.js')}}"></script>


</body>

</html>