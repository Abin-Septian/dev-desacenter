
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DesaCenter.ID - Ini tagline.</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/dsc_logo.png') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    
</head>

<body>
    
    <!--*******************
        Preloader start
    ********************-->
    {{-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> --}}
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo"><a href="{{"/"}}"><b><img src="../../assets/images/logo.png" alt=""> </b><span class="brand-title"><img src="../../assets/images/logo-text.png" alt=""></span></a>
            </div>
            <div class="nav-control">
                <div class="hamburger"><span class="line"></span>  <span class="line"></span>  <span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content">
                <div class="header-left">
                        {{-- masih kosong --}}
                </div>
                <div class="header-right">
                    <ul>
                        <li class="icons">
                            <a href="javascript:void(0)" class="log-user">
                                <img src="../../assets/images/avatar/1.jpg" alt=""> <span>Nanda Fathurrizki</span>  <i class="fa fa-caret-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-profile animated bounceInDown">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="{{ url('/profil/akun') }}"><i class="icon-power"></i> <span>Akun Anda</span></a></li>
                                        <li><a href="#" onclick="signOut()"><i class="mdi mdi-power text-danger"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>

                    <li class="mega-menu mega-menu-lg">
                        <a class="" href="{{ url('/')}}" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a class="" href="{{ url('/join-desa')}}" aria-expanded="false">
                            <i class="mdi mdi-account-box"></i><span class="nav-text">Join Desa</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a class="" href="{{ url('/profil')}}" aria-expanded="false">
                            <i class="mdi mdi-account-box"></i><span class="nav-text">Profil Desa</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a class="" href="{{ url('/member')}}" aria-expanded="false">
                            <i class="mdi mdi-account-multiple"></i><span class="nav-text">Member/Pengurus</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a class="" href="{{ url('/unit-usaha')}}" aria-expanded="false">
                            <i class="mdi mdi-store"></i><span class="nav-text">Unit Usaha</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a class="" href="{{ url('/assesment')}}" aria-expanded="false">
                            <i class="mdi mdi-content-copy"></i><span class="nav-text">Assesment</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-lg">
                        <a class="" href="{{ url('/edukasi')}}" aria-expanded="false">
                            <i class="mdi mdi-help-circle"></i><span class="nav-text">Konten Edukasi</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        
        @yield('content')
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Developed by <a href="#">Desacenter.id</a> 2021</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    
    <script src="{{ asset('assets/plugins/common/common.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/gleek.js') }}"></script>
    <script src="{{ asset('assets/js/styleSwitcher.js') }}"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.2/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.4.0/firebase-auth.js"></script>
    <script src="{{ asset('assets/js/firebase.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
</body>

</html>