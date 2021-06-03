<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>Desacenter.id</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="{{asset('landing/images/favicon.png')}}" type="image/png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assetslanding/img/desabrilian.png')}}">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{asset('landing/css/slick.css')}}">
        
    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{asset('landing/css/font-awesome.min.css')}}">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{asset('landing/css/LineIcons.css')}}">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{asset('landing/css/animate.css')}}">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{asset('landing/css/magnific-popup.css')}}">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{asset('landing/css/bootstrap.min.css')}}">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{asset('landing/css/default.css')}}">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{asset('landing/css/style.css')}}">
    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
   
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="navbar-area headroom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="{{ (asset('assetslanding/img/desabrilian.png')) }}"  style="width:4em;" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#about">About </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#services">Services</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                            
                            <div class="navbar-btn d-none d-sm-inline-block">
                                <a class="main-btn" href="{{ url('login') }}">Daftar</a>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
        <div id="home" class="header-hero bg_cover d-lg-flex align-items-center" style="background-image: url({{asset('landing/images/header-hero.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="header-hero-content">
                            <h1 class="hero-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"><b>Gerbang</b> Menuju  <span>Desa</span> <b>Brilian</b></h1>
                            <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Melalui desa yang mandiri, berdaya saing dan maju bersama kita wujudkan ketahanan ekonomi Nasional.</p>
                            <div class="wow fadeInUp mt-4" data-wow-duration="1s" data-wow-delay="0.8s">
                                <a href="{{ url('login') }}" class="main-btn">Masuk</a>
                            </div>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-hero-image d-flex align-items-center wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="1.1s">
                <div class="image">
                    <img src="{{asset('landing/images/hero-image.svg')}}" alt="Hero Image">
                </div>
            </div> <!-- header hero image -->
        </div> <!-- header hero -->
    </header>
    
    <!--====== HEADER PART ENDS ======-->
    
    <!--====== ABOUT PART START ======-->
    
    <section id="about" class="about-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="about-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6 class="welcome">WELCOME</h6>
                        <h3 class="title"><span>Our 10 years working experience to </span> take care of your business goal.</h3>
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-image mt-60 wow fadeIn d-flex justify-content-center" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{asset('landing/images/about.svg')}}" alt="about" style="width: 75vh">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="about-content pt-45">
                        <p class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">Duis et metus et massa tempus lacinia. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas ultricies, orci molestie blandit interdum. ipsum ante pellentesque nisl, eget mollis turpis quam nec eros. ultricies, orci molestie blandit interdum.</p>
                        
                        <div class="about-counter pt-60">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="single-counter counter-color-1 mt-30 d-flex wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                                        <div class="counter-shape">
                                            <span class="shape-1"></span>
                                            <span class="shape-2"></span>
                                        </div>
                                        <div class="counter-content media-body">
                                            <span class="counter-count"><span class="counter">350</span></span>
                                            <p class="text">Clients</p>
                                        </div>
                                    </div> <!-- single counter -->
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-counter counter-color-2 mt-30 d-flex wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                                        <div class="counter-shape">
                                            <span class="shape-1"></span>
                                            <span class="shape-2"></span>
                                        </div>
                                        <div class="counter-content media-body">
                                            <span class="counter-count"><span class="counter">99</span>%</span>
                                            <p class="text">Satisfaction</p>
                                        </div>
                                    </div> <!-- single counter -->
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-counter counter-color-3 mt-30 d-flex wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                                        <div class="counter-shape">
                                            <span class="shape-1"></span>
                                            <span class="shape-2"></span>
                                        </div>
                                        <div class="counter-content media-body">
                                            <span class="counter-count"><span class="counter">870</span></span>
                                            <p class="text">Projects</p>
                                        </div>
                                    </div> <!-- single counter -->
                                </div>
                            </div> <!-- row -->
                        </div> <!-- about counter -->
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== ABOUT PART ENDS ======-->
    
    <!--====== OUR SERVICE PART START ======-->
    
    <section id="services" class="our-services-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-9">
                    <div class="section-title text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h6 class="sub-title">Our services</h6>
                        <h4 class="title">Bunch of Services <span>to Rock Your Business</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="our-services-tab pt-30">
                        <ul class="nav justify-content-center wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="business-tab" data-toggle="tab" href="#business" role="tab" aria-controls="business" aria-selected="true">
                                    <i class="lni-briefcase"></i> <span>Business <br> Consultancy</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="digital-tab" data-toggle="tab" href="#digital" role="tab" aria-controls="digital" aria-selected="false">
                                    <i class="lni-bullhorn"></i> <span>Digital <br> Marketing</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a id="market-tab" data-toggle="tab" href="#market" role="tab" aria-controls="market" aria-selected="false">
                                    <i class="lni-stats-up"></i> <span>Market <br> Analysis</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="business" role="tabpanel" aria-labelledby="business-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="our-services-image mt-50">
                                            <img src="{{asset('landing/images/our-service.svg')}}" alt="service">
                                        </div> <!-- our services image -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="our-services-content mt-45">
                                            <h3 class="services-title">Business Consultancy <span>for Your Business Growth.</span></h3>
                                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec est arcu. Maecenas semper tortor.  <br>  <br> In elementum in risus sed commodo. Phasellus nisi ligula, luctus at tempor vitae, placerat at ante. Cras sed consequat justo. Curabitur laoreet eu est vel convallis. </p>
                                            
                                            <div class="our-services-progress d-flex align-items-center mt-55">
                                                <div class="circle" id="circles-1"></div>
                                                <div class="progress-content">
                                                    <h4 class="progress-title">Consultancy<br> Agency Skill.</h4>
                                                </div>
                                            </div>
                                        </div> <!-- our services content -->
                                    </div>
                                </div> <!-- row -->
                            </div>
                            
                            <div class="tab-pane fade" id="digital" role="tabpanel" aria-labelledby="digital-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="our-services-image mt-50">
                                            <img src="{{asset('landing/images/our-service.svg')}}" alt="service">
                                        </div> <!-- our services image -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="our-services-content mt-45">
                                            <h3 class="services-title">Digital Marketing  <span>for Your Business Growth.</span></h3>
                                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec est arcu. Maecenas semper tortor.  <br>  <br> In elementum in risus sed commodo. Phasellus nisi ligula, luctus at tempor vitae, placerat at ante. Cras sed consequat justo. Curabitur laoreet eu est vel convallis. </p>
                                            
                                            <div class="our-services-progress d-flex align-items-center mt-55">
                                                <div class="circle" id="circles-2"></div>
                                                <div class="progress-content">
                                                    <h4 class="progress-title">Digital Marketing <br> Skill.</h4>
                                                </div>
                                            </div>
                                        </div> <!-- our services content -->
                                    </div>
                                </div> <!-- row -->
                            </div>
                            
                            <div class="tab-pane fade" id="market" role="tabpanel" aria-labelledby="market-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="our-services-image mt-50">
                                            <img src="{{asset('landing/images/our-service.svg')}}" alt="service">
                                        </div> <!-- our services image -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="our-services-content mt-45">
                                            <h3 class="services-title">Market Analysis  <span>for Your Business Growth.</span></h3>
                                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam nec est arcu. Maecenas semper tortor.  <br>  <br> In elementum in risus sed commodo. Phasellus nisi ligula, luctus at tempor vitae, placerat at ante. Cras sed consequat justo. Curabitur laoreet eu est vel convallis. </p>
                                            
                                            <div class="our-services-progress d-flex align-items-center mt-55">
                                                <div class="circle" id="circles-3"></div>
                                                <div class="progress-content">
                                                    <h4 class="progress-title">Market Analysis <br> Agency Skill.</h4>
                                                </div>
                                            </div>
                                        </div> <!-- our services content -->
                                    </div>
                                </div> <!-- row -->
                            </div>
                        </div> <!-- tab content -->
                    </div> <!-- our services tab -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== OUR SERVICE PART ENDS ======-->
    
    <!--====== SERVICE PART START ======-->
    
    <section id="service" class="service-area pt-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h6 class="sub-title">Why Us</h6>
                        <h4 class="title">The reasons to choose us <span>as your business partner</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="service-wrapper mt-60 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                <div class="row no-gutters justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service d-flex">
                            <div class="service-icon">
                                <img src="{{asset('landing/images/service-1.png')}}" alt="Icon">
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">Highly Experienced</h4>
                                <p class="text">Lorem Ipsum is simply dummy tex of the printing and typesetting industry. Lorem Ipsum .</p>
                            </div>
                            <div class="shape shape-1">
                                <img src="{{asset('landing/images/shape/shape-1.svg')}}" alt="shape">
                            </div>
                            <div class="shape shape-2">
                                <img src="{{asset('landing/images/shape/shape-2.svg')}}" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service service-border d-flex">
                            <div class="service-icon">
                                <img src="{{asset('landing/images/service-2.png')}}" alt="Icon">
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">Bunch of Services</h4>
                                <p class="text">Lorem Ipsum is simply dummy tex of the printing and typesetting industry. Lorem Ipsum .</p>
                            </div>
                            <div class="shape shape-3">
                                <img src="{{asset('landing/images/shape/shape-3.svg')}}" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service d-flex">
                            <div class="service-icon">
                                <img src="{{asset('landing/images/service-3.png')}}" alt="Icon">
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">Quality Support</h4>
                                <p class="text">Lorem Ipsum is simply dummy tex of the printing and typesetting industry. Lorem Ipsum .</p>
                            </div>
                            <div class="shape shape-4">
                                <img src="{{asset('landing/images/shape/shape-4.svg')}}" alt="shape">
                            </div>
                            <div class="shape shape-5">
                                <img src="{{asset('landing/images/shape/shape-5.svg')}}" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="service-btn text-center pt-25 pb-15">
                            <a class="main-btn main-btn-2" href="#">All Services</a>
                        </div> <!-- service btn -->
                    </div>
                </div> <!-- row -->
            </div> <!-- service wrapper -->
        </div> <!-- container -->
    </section>
    
    <!--====== SERVICE PART ENDS ======-->
    
    <!--====== FOOTER PART START ======-->
    
    <footer id="footer" class="footer-area bg_cover" style="background-image: url({{asset('landing/images/footer-bg.jpg)')}}">
        <div class="container">
            <div class="footer-widget pt-30 pb-70">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 order-sm-1 order-lg-1">
                        <div class="footer-about pt-40">
                            <a href="#">
                                <img src="{{ (asset('assetslanding/img/desabrilian.png')) }}"  style="width:4em;" alt="Logo">
                            </a>
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, repudiandae! Totam, nemo sed? Provident.</p> <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus</p>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-sm-6 order-sm-3 order-lg-2">
                        <div class="footer-link pt-40">
                            <div class="footer-title">
                                <h5 class="title">Services</h5>
                            </div>
                            <ul>
                                <li><a href="#">Business Consultancy</a></li>
                                <li><a href="#">Digital Marketing</a></li>
                                <li><a href="#">Market Analysis</a></li>
                                <li><a href="#">Web Development</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 order-sm-4 order-lg-3">
                        <div class="footer-link pt-40">
                            <div class="footer-title">
                                <h5 class="title">About Us</h5>
                            </div>
                            <ul>
                                <li><a href="#">Overview</a></li>
                                <li><a href="#">Why us</a></li>
                                <li><a href="#">Awards & Recognitions</a></li>
                                <li><a href="#">Team</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 order-sm-2 order-lg-4">
                        <div class="footer-contact pt-40">
                            <div class="footer-title">
                                <h5 class="title">Contact Info</h5>
                            </div>
                            <div class="contact pt-10">
                                {{-- <p class="text">21 King Street, Melbourne <br>
                                    Victoria, 1202 Australia.</p>
                                <p class="text">support@uideck.com</p>
                                <p class="text">+99 000 555 66 22</p> --}}

                                <ul class="social mt-40">
                                    <li><a href="#"><i class="lni-facebook"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter"></i></a></li>
                                    <li><a href="#"><i class="lni-instagram"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin"></i></a></li>
                                </ul>
                            </div> <!-- contact -->
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright text-center">
                <p class="text">© 2022 Crafted by <a href="https://uideck.com" rel="nofollow">UIdeck</a> All Rights Reserved.</p>
            </div>
        </div> <!-- container -->
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->  




    <!--====== Jquery js ======-->
    <script src="{{asset('landing/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('landing/js/vendor/modernizr-3.7.1.min.js')}}"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="{{asset('landing/js/popper.min.js')}}"></script>
    <script src="{{asset('landing/js/bootstrap.min.js')}}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{asset('landing/js/slick.min.js')}}"></script>
    
    <!--====== Isotope js ======-->
    <script src="{{asset('landing/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('landing/js/isotope.pkgd.min.js')}}"></script>
    
    <!--====== Counter Up js ======-->
    <script src="{{asset('landing/js/waypoints.min.js')}}"></script>
    <script src="{{asset('landing/js/jquery.counterup.min.js')}}"></script>
    
    <!--====== Circles js ======-->
    <script src="{{asset('landing/js/circles.min.js')}}"></script>
    
    <!--====== Appear js ======-->
    <script src="{{asset('landing/js/jquery.appear.min.js')}}"></script>
    
    <!--====== WOW js ======-->
    <script src="{{asset('landing/js/wow.min.js')}}"></script>
    
    <!--====== Headroom js ======-->
    <script src="{{asset('landing/js/headroom.min.js')}}"></script>
    
    <!--====== Jquery Nav js ======-->
    <script src="{{asset('landing/js/jquery.nav.js')}}"></script>
    
    <!--====== Scroll It js ======-->
    <script src="{{asset('landing/js/scrollIt.min.js')}}"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{asset('landing/js/jquery.magnific-popup.min.js')}}"></script>
    
    <!--====== Main js ======-->
    <script src="{{asset('landing/js/main.js')}}"></script>
    
</body>

</html>
