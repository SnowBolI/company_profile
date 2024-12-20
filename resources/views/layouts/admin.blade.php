<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title> @yield('title') - Company Profile</title>

    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('ElaAdmin/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('ElaAdmin/css/style.css')}}">
    
    @yield('css')

</head>

<body>

    @php
        $url = request()->segment(2);
    @endphp

    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{$url=='dashboard'?'active':''}}">
                    <a href="{{url('admin/dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <li class="menu-item-has-children dropdown {{ 
                    Request::is('admin/home_slider*') || 
                    Request::is('admin/home_youtube*') ||
                    Request::is('admin/home_background*') ||
                    Request::is('admin/home_thumbnail*') ||
                    Request::is('admin/home_tabungan*') ||
                    Request::is('admin/home_deposito*')? 'show' : '' 

                    }}">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ 
                    Request::is('admin/home_slider*') || 
                    Request::is('admin/home_youtube*') ||
                    Request::is('admin/home_background*') ||
                    Request::is('admin/home_thumbnail*') ||
                    Request::is('admin/home_deposito*') ||
                    Request::is('admin/home_tabungan*')? 'show' : '' 

                    }}">
                            <i class="menu-icon fa fa-home"></i>Home
                        </a>
                        <ul class="sub-menu children dropdown-menu {{ 
                    Request::is('admin/home_slider*') || 
                    Request::is('admin/home_youtube*') ||
                    Request::is('admin/home_background*') ||
                    Request::is('admin/home_thumbnail*') ||
                    Request::is('admin/home_deposito*') ||
                    Request::is('admin/home_tabungan*')? 'show' : '' 

                    }}">
                            <li><i class="fa fa-angle-right"></i><a href="{{url('admin/home_slider')}}">Slider</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="{{url('admin/home_background')}}">Background</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="{{url('admin/home_thumbnail')}}">Thumbnail</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="{{url('admin/home_youtube')}}">Link YT</a></li>

                            <li><i class="fa fa-angle-right"></i><a href="{{url('admin/home_deposito')}}">Persen Deposito</a></li>
                            <li><i class="fa fa-angle-right"></i><a href="{{url('admin/home_tabungan')}}">Persen Tabungan</a></li>
                        </ul>
                    </li>

                    {{-- profile --}}
                    <li class="menu-item-has-children dropdown {{ 
                        Request::is('admin/profile_banner*') || 
                        Request::is('admin/profile_tentang*') ||
                        Request::is('admin/profile_sejarah_visi*') ||
                        Request::is('admin/profile_struktur*') ||
                        Request::is('admin/profile_milestone*')? 'show' : '' 
                        }}">
    
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ 
                        Request::is('admin/profile_banner*') || 
                        Request::is('admin/profile_tentang*') ||
                        Request::is('admin/profile_sejarah_visi*') ||
                        Request::is('admin/profile_struktur*') ||
                        Request::is('admin/profile_milestone*')? 'show' : '' 
                        }}">
                                <i class="menu-icon fa fa-user"></i>Profile
                            </a>
                            <ul class="sub-menu children dropdown-menu {{ 
                        Request::is('admin/profile_banner*') || 
                        Request::is('admin/profile_penhargaan*') || 
                        Request::is('admin/profile_tentang*') ||
                        Request::is('admin/profile_sejarah_visi*') ||
                        Request::is('admin/profile_struktur*') ||
                        Request::is('admin/profile_milestone*')? 'show' : ''  
                        }}">
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/profile_banner')}}">Banner</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/profile_penghargaan')}}">Penghargaan</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/profile_tentang')}}">Tentang Kami</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/profile_sejarah_visi')}}">Sejarah Visi</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/profile_struktur')}}">Gambar Struktur</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/profile_milestone')}}">Milestone</a></li>
                            </ul>
                    </li>

                    {{-- Produk --}}

                    <li class="menu-item-has-children dropdown {{ 
                        Request::is('admin/produk_banner*') || 
                        Request::is('admin/produk_tabungan*') ||
                        Request::is('admin/produk_deposito*') ||
                        Request::is('admin/produk_kredit*') ||
                        Request::is('admin/produk_ppob*')? 'show' : '' 
                        }}">
    
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ 
                        Request::is('admin/produk_banner*') || 
                        Request::is('admin/produk_tabungan*') ||
                        Request::is('admin/produk_deposito*') ||
                        Request::is('admin/produk_kredit*') ||
                        Request::is('admin/produk_ppob*')? 'show' : '' 
                        }}">
                                <i class="menu-icon fa fa-archive"></i>Produk
                            </a>
                            <ul class="sub-menu children dropdown-menu {{ 
                        Request::is('admin/produk_banner*') || 
                        Request::is('admin/produk_tabungan*') ||
                        Request::is('admin/produk_deposito*') ||
                        Request::is('admin/produk_kredit*') ||
                        Request::is('admin/produk_ppob*')? 'show' : ''  
                        }}">
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/produk_banner')}}">Banner</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/produk_tabungan')}}">Tabungan</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/produk_deposito')}}">Deposito</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/produk_kredit')}}">Kredit</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/produk_ppob')}}">PPOB</a></li>
                            </ul>
                    </li>

                    {{-- Edukasi --}}

                    <li class="menu-item-has-children dropdown {{ 
                        Request::is('admin/edukasi_banner*') || 
                        Request::is('admin/edukasi*')? 'show' : '' 
                        }}">
    
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ 
                        Request::is('admin/edukasi_banner*') || 
                        Request::is('admin/edukasi*')? 'show' : '' 
                        }}">
                                <i class="menu-icon fa fa-list-alt"></i>Edukasi
                            </a>
                            <ul class="sub-menu children dropdown-menu {{ 
                        Request::is('admin/edukasi_banner*') || 
                        Request::is('admin/edukasi*')? 'show' : ''  
                        }}">
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/edukasi_banner')}}">Banner</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/edukasi')}}">Edukasi</a></li>
                            </ul>
                    </li>

                    {{-- Kantor --}}

                    <li class="menu-item-has-children dropdown {{ 
                        Request::is('admin/kantor_banner*') || 
                        Request::is('admin/kantor_cabang*')? 'show' : '' 
                        }}">
    
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ 
                        Request::is('admin/kantor_banner*') || 
                        Request::is('admin/kantor_cabang*')? 'show' : '' 
                        }}">
                                <i class="menu-icon fa fa-sitemap"></i>Kantor
                            </a>
                            <ul class="sub-menu children dropdown-menu {{ 
                        Request::is('admin/kantor_banner*') || 
                        Request::is('admin/kantor_cabang*')? 'show' : ''  
                        }}">
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/kantor_banner')}}">Banner</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/kantor_cabang')}}">Cabang</a></li>
                            </ul>
                    </li>

                    {{-- Karir --}}

                    <li class="menu-item-has-children dropdown {{ 
                        Request::is('admin/karir_banner*') || 
                        Request::is('admin/karir*')? 'show' : '' 
                        }}">
    
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ 
                        Request::is('admin/karir_banner*') || 
                        Request::is('admin/karir*')? 'show' : '' 
                        }}">
                                <i class="menu-icon fa fa-group"></i>Karir
                            </a>
                            <ul class="sub-menu children dropdown-menu {{ 
                        Request::is('admin/karir_banner*') || 
                        Request::is('admin/karir')? 'show' : ''  
                        }}">
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/karir_banner')}}">Banner</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/karir')}}">Karir</a></li>
                            </ul>
                    </li>

                    {{-- Berita --}}

                    <li class="menu-item-has-children dropdown {{ 
                        Request::is('admin/berita_banner*') || 
                        Request::is('admin/berita*')? 'show' : '' 
                        }}">
    
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ 
                        Request::is('admin/berita_banner*') || 
                        Request::is('admin/berita*')? 'show' : '' 
                        }}">
                                <i class="menu-icon fa fa-tags"></i>Berita
                            </a>
                            <ul class="sub-menu children dropdown-menu {{ 
                        Request::is('admin/berita_banner*') || 
                        Request::is('admin/berita*')? 'show' : ''  
                        }}">
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/berita_banner')}}">Banner</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/berita')}}">Berita</a></li>
                            </ul>
                    </li>

                    {{-- Laporan --}}

                    <li class="menu-item-has-children dropdown {{ 
                        Request::is('admin/laporan_banner*') || 
                        Request::is('admin/laporan*')? 'show' : '' 
                        }}">
    
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ 
                        Request::is('admin/laporan_banner*') || 
                        Request::is('admin/laporan*')? 'show' : '' 
                        }}">
                                <i class="menu-icon fa fa-book"></i>Laporan
                            </a>
                            <ul class="sub-menu children dropdown-menu {{ 
                        Request::is('admin/laporan_banner*') || 
                        Request::is('admin/laporan*')? 'show' : ''  
                        }}">
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/laporan_banner')}}">Banner</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/laporan')}}">Laporan</a></li>
                            </ul>
                    </li>

                    {{-- Kontak --}}

                    <li class="menu-item-has-children dropdown {{ 
                        Request::is('admin/kontak_banner*') || 
                        Request::is('admin/kontak*')? 'show' : '' 
                        }}">
    
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="{{ 
                        Request::is('admin/kontak_banner*') || 
                        Request::is('admin/kontak*')? 'show' : '' 
                        }}">
                                <i class="menu-icon fa fa-phone"></i>Kontak
                            </a>
                            <ul class="sub-menu children dropdown-menu {{ 
                        Request::is('admin/kontak_banner*') || 
                        Request::is('admin/kontak*')? 'show' : ''  
                        }}">
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/kontak_banner')}}">Banner</a></li>
                                <li><i class="fa fa-angle-right"></i><a href="{{url('admin/kontak')}}">Kontak</a></li>
                            </ul>
                    </li>

                    {{-- <li class="{{$url=='categories'?'active':''}}">
                        <a href="{{url('admin/categories')}}"><i class="menu-icon fa fa-list-ul"></i>Categories </a>
                    </li>
                    <li class="{{$url=='articles'?'active':''}}">
                        <a href="{{url('admin/articles')}}"> <i class="menu-icon fa fa-newspaper-o"></i> Articles</a>
                    </li>
                    <li class="{{$url=='destinations'?'active':''}}">
                        <a href="{{url('admin/destinations')}}"><i class="menu-icon fa fa-paper-plane-o"></i>Destinations </a>
                    </li>
                    <li class="{{$url=='abouts'?'active':''}}">
                        <a href="{{url('admin/abouts')}}"><i class="menu-icon fa fa-user"></i>About </a>
                    </li> --}}
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->


    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
            <header id="header" class="header">
                <div class="top-left">
                    <div class="navbar-header">
                        {{-- <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('ElaAdmin/images/logo.png')}}" alt="Logo"></a> --}}
                        <a class="navbar-brand text-success" href="{{url('admin/dashboard')}}" > <i class="fa fa-user-circle-o" style="font-size:34px"></i>  <span class="font-weight-bold " style="font-size:26px">Administrator</span></a>
                        <a class="navbar-brand hidden " href="{{url('/')}}"><img src="{{asset('ElaAdmin/images/logo2.png')}}" alt="Logo"></a>
                        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
                <div class="top-right">
                    <div class="header-menu">
                        <div class="header-left">
                            <div class="dropdown for-notification">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                    <span class="count {{ $dashboardData['total'] > 0 ? 'bg-danger' : '' }}">{{ $dashboardData['total'] }}</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="notification">
                                    @if ($dashboardData['total'] > 0)
                                        <p class="red">{{ $dashboardData['total'] }} Notifikasi Baru</p>
                                        @foreach ($dashboardData['notifications'] as $notification)
                                            @php
                                                $route = '#'; // Default route
                                                if (strtolower($notification->subjek) === 'tabungan') {
                                                    $route = route('pesan_tabungan.index');
                                                } elseif (strtolower($notification->subjek) === 'deposito') {
                                                    $route = route('pesan_deposito.index'); // Replace with actual route for deposito
                                                } elseif (strtolower($notification->subjek) === 'kredit') {
                                                    $route = route('pesan_kredit.index'); // Replace with actual route for kredit
                                                } else {
                                                    $route = route('pesan_kontak.index');
                                                }
                                            @endphp
                                            <a class="dropdown-item media" href="{{ $route }}">
                                                <i class="fa fa-info"></i> 
                                                <p>{{ $notification->nama }}</p> 
                                            </a>
                                        @endforeach
                                    @else
                                        <p class="text-center">Tidak ada notifikasi baru</p>
                                    @endif
                                </div>
                                
                            </div>
                            
                            
                            
                            
                            <div class="user-area dropdown float-right">
                                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img class="user-avatar rounded-circle" src="{{asset('ElaAdmin/images/admin.jpg')}}" alt="User Avatar">
                                </a>
    
                                <div class="user-menu dropdown-menu">
                                    <a class="nav-link" href="#"><i class="fa fa-cog"></i>Ganti Password</a>
                                    {{-- <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> 
                                        <i class="fa fa-power-off"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form> --}}
    
                                    <div class="nav-link" style="cursor:pointer" onclick="logout()" data-target="#modalLogout" data-toggle="modal"> 
                                        <i class="fa fa-power-off"></i> Logout
                                    </div>
    
    
    
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
            </header>
        <!-- /#header -->
        
        <div class="breadcrumbs mt-3">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1 class="text-success">@yield('breadcrumbs')</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('/'.Request::segment(1))}}">{{Request::segment(1)}}</a></li>
                                    @yield('second-breadcrumb')
                                    @yield('third-breadcrumb')
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
            <div class="content">
                <!-- Animated -->
                <div class="animated fadeIn">
                    
                    @yield('content')
                    
                </div>
                <!-- .animated -->
            </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; 2018 Ela Admin
                    </div>
                    <div class="col-sm-6 text-right">
                        Designed by <a href="https://colorlib.com">Colorlib</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->


    <!-- Modal Logout -->
        <div class="modal fade" id="modalLogout" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-inline">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure want to end this session?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form action="" id="url-logout" method="POST" class="d-inline">
                    @csrf 
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    <!-- End Modal Logout -->





    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        // Alert
        $(".alert").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
            $(".alert").empty();
        });

        // Logout
        function logout(){ 
            var url = '{{ route("logout") }}';    
            document.getElementById("url-logout").setAttribute("action", url);
            $('#modalLogout').modal();
        }
    </script>
    
    <!--Local Stuff-->
    @yield('script')
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{asset('ElaAdmin/js/main.js')}}"></script>




    
</body>
</html>