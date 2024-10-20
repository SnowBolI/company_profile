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
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu"><li class="subtitle"> <i class="menu-icon fa fa-cogs"></i>Components</li><li class="subtitle"> <i class="menu-icon fa fa-cogs"></i>Components</li>                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>

                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item menu-open">
                        <a href="#" class="nav-link {{ Request::is('admin/homesliders') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Home
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                    <a href="/homesliders" class="nav-link {{ Request::is('homesliders') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> Slider</p>
                                    </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="{{$url=='homesliders'?'active':''}}">
                        <a href="{{url('admin/homesliders')}}"><i class="menu-icon fa fa-list-ul"></i>Slider </a>
                    </li>
                    <li class="{{$url=='categories'?'active':''}}">
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
                    </li>
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
