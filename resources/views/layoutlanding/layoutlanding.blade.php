<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="description" content="Be-one is a clean HTML5/CSS3 template suitable for Business, Corporate, Taxes, Broker, Ad...">
   <meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Title -->
<title>@yield('title')</title>

<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="assetslanding/img/desabrilian.png">


<!-- CSS Here -->
   <!-- MagnificPopup.css -->
   <link rel="stylesheet" href="{{asset('assetslanding/css/magnific-popup.css')}}">
   <!-- SlickNav.css -->
   <link rel="stylesheet" href="{{(asset('assetslanding/css/slicknav.min.css'))}}">
   <!-- Owl.carousel.css -->
   <link rel="stylesheet" href="{{(asset('assetslanding/css/owl.carousel-2.3.4.min.css'))}}">
   <!-- Fontawesome.css -->
   <link rel="stylesheet" href="{{(asset('assetslanding/css/fontawesome-free-5.12.0.min.css'))}}">
   <!-- Bootstrap.css -->
   <link rel="stylesheet" href="{{(asset('assetslanding/css/bootstrap-4.3.1.min.css'))}}">
   <!-- Default.css -->
   <link rel="stylesheet" href="{{(asset('assetslanding/css/default.css'))}}">
   <!-- Style.css -->
   <link rel="stylesheet" href="{{(asset('assetslanding/css/style.css'))}}">
   <!-- Responsive.css -->
   <link rel="stylesheet" href="{{(asset('assetslanding/css/responsive.css'))}}">

   <!-- ColorNip.css -->
   <link rel="stylesheet" href="{{(asset('assetslanding/css/colornip.min.css'))}}">
   <link id="theme" rel="stylesheet" href="{{(asset('assetslanding/css/theme-colors/theme-default.css'))}}">


   <!-- Jquery -->
   <script src="{{(asset('assetslanding/js/jquery-3.4.1.min.js'))}}"></script>
<style type="text/css">
    .logo{
        width: 100px;
        height: 100%;
    }
    #myBtn {
                    right: 10px;
                    bottom: 10px;
                }

    #btnwhatsapp{
                    right: 10px;
                    bottom: 10px;
                }
    .btnlogin{
    
        border-radius: 30px;
    }
    .video-container {
    overflow: hidden;
    position: relative;
    width:100%;
}

.video-container::after {
    padding-top: 56.25%;
    display: block;
    content: '';
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
#rcard {
  border-radius: 30px 30px 30px 30px; 
}
</style>
</head>
<body>
    <!-- Color Nip -->
   <!--  <div class="Switcher">
    <button id="Switcher__control" class="Switcher__control">
        <i class="fas fa-cogs"></i>
    </button>
    <h5 style="margin-bottom: 5px">Change Color</h5>
    <ul id="colors" data-dir="assets/css/theme-colors/">
        <li data-scheme="theme-default" data-color="#4272d7" style="background-color:#4272d7"></li>
        <li data-scheme="theme-red" data-color="#fa4251" style="background-color:#fa4251"></li>
        <li data-scheme="theme-green" data-color="#63c76a" style="background-color:#63c76a"></li>
        <li data-scheme="theme-yellow" data-color="#ffe048" style="background-color:#ffe048"></li>
        <li data-scheme="theme-orange" data-color="#f39c12" style="background-color:#f39c12"></li>
    </ul>
    </div> -->
    <!-- End Color Nip -->
    <div class="search-overlay"></div>
    <!-- Search Modal -->
    <div class="modal fade" id="search-modal">
        <div class="modal-dialog">
             <div class="modal-content">
                 <form action="index.html" class="search-popup-wrapper">
                     <input type="search" placeholder="Search here...">
                     <i class="fas fa-search"></i>
                 </form>
             </div>
         </div>
     </div>
     <!-- End Search Modal -->
    <!-- Start Header Area -->
    <div class="header-area">
        <div class="container">
            <div class="header-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="site-logo logo">
							<img src="{{(asset('assetslanding/img/desabrilian.png'))}}" class="logo">
                        </div>
                    </div>
                    <div class="col-6 d-lg-none static text-right">
                        <div class="show-mobile-menu"></div>
                    </div>
                    <div class="col-lg-9 text-right d-none d-lg-block">
                        <nav class="menu-wrapper">
                            <ul class="main-menu" id="mobile-menu">
                                <li class="active"><a href="{{url('/')}}">Home</a></li>
                                <li><a href="#feature">Features</a></li>
                                <!-- <li><a href="#portfolio">Portfolio</a></li> -->
                                <li><a href="#page">Pages</a></li>
                                <li><a href="#blog">Blog</a></li>
                                <li><a href="#contact-us">Contact Us</a></li>
                                <li> <a class="btn rounded btnlogin p-3 " id="btnlogin" href="{{ url('login/') }}">DAFTAR / BERGABUNG</a> </li>
                               
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Area -->
   

    @yield('container')


    <!-- Start Footer Area -->
    <a id="myBtn" style="display:none;" target="_blank" href="https://wa.me/6281996900800?text=Saya%20mengalami%20kesulitan%2C%20tolong%20dibantu." title="Go to top"><i class="fas fa-whatsapp" style="font-size: 20px;"></i>&nbsp; Hubungi Kami</a>

        <div id="btnwhatsapp" style="position: fixed;bottom: 30px;right: 20px;z-index:99;">
          <div class="btn-group dropup">
            <button type="button" class="btn btn-default dropdown-toggle" style="border-radius: 40px;background: #3bdf58;padding: 0px;padding-right: 10px;color: #fff;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="fab fa-whatsapp" style="border-radius: 50%;padding: 10px;background: #43c059;font-size: 16px;"></span> Hubungi Kami <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" style="background: #3bdf58;margin-bottom: 5px;border: 1px solid #fff;">
              
               <li><a target="_blank" href="https://wa.me/6281996900800?text=Saya%20mengalami%20kesulitan%2C%20tolong%20dibantu." style="color: #fff;">CS 1</a></li>
              <li role="separator" class="divider" style="color: #fff;"></li>
              
              <li><a target="_blank" href="https://wa.me/628572900800?text=Saya%20mengalami%20kesulitan%2C%20tolong%20dibantu." style="color: #fff;">CS 2</a></li>
            </ul>
          </div>
        </div>
    <footer class="footer-area pt-60 pb-60 black-bg" id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">DESACENTER.id</a>
                            
                        </div>
                        <div class="footer-dec">
                            <p>Website ini dalam masa development</p>
                        </div>
                        <ul class="social-links">
                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h6>Features</h6>
                        </div>
                        <ul class="footer-menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Our Story</a></li>
                            <li><a href="#">Terms &and; Condition</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h6>Contact us</h6>
                        </div>
                        <div class="address-line">
                            <p>Address: 379 5th Ave  New York, NYC 10018, United States</p>
                            <p>Phone: <a href="tel:+112345 6999">+(112) 345 6999</a></p>
                            <p>Fax: +(112) 345 8999</p>
                            <p>Email: <a href="mailto:contact@be-one.com">contact@be-one.com</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h6>Newsletter</h6>
                        </div>
                        <div class="newsletter-text">
                            <p>Subscribe to Newsletters and Stay informed about our news and events</p>
                        </div>
                        <form action="index.html" class="newsletter-form">
                            <input type="email" placeholder="Your email">
                            <input class="btn newsletter-btn" type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->
    <!-- End Copyright Area -->
    <div class="copyright-area black-bg">
        <div class="container">
            <div class="row ">
                <div class="col-12 text-center">
                    <div class="copyright-area ">
                        <p>Copyright © 2021 Designed by <a href="https://www.desacenter.id">desacenter.id</a>. by wiiest_tech(STDC)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area -->
<!-- JS -->

   <!-- Popper.js -->
   <script src="{{asset('assetslanding/js/popper.min.js')}}"></script>
   <!-- Bootstrap.js -->
   <script src="{{(asset('assetslanding/js/bootstrap-4.3.1.min.js'))}}"></script>
   <!-- Modernizr.js -->
   <script src="{{(asset('assetslanding/js/vendor/modernizr-3.5.0.min.js'))}}"></script>
   <!-- Owl.Carousel.js -->
   <script src="{{(asset('assetslanding/js/vendor/owl.carousel-2.3.4.min.js'))}}"></script>
   <script src="{{(asset('assetslanding/js/vendor/owl.carousel2.thumbs.min.js'))}}"></script>
   <!-- Waypoints.js -->
   <script src="{{(asset('assetslanding/js/vendor/waypoints-4.0.1.min.js'))}}"></script>
   <!-- ColorNip.js -->
   <script src="{{(asset('assetslanding/js/vendor/colornip.min.js'))}}"></script>
   <!-- SlickNav.js -->
   <script src="{{(asset('assetslanding/js/vendor/slicknav.min.js'))}}"></script>
   <!-- ScrollUp.js -->
   <!-- <script src="{{(asset('assets/js/vendor/jquery.scrollUp.min.js'))}}"></script> -->
   <!-- MagnificPopup.js -->
   <script src="{{(asset('assetslanding/js/vendor/magnific-popup.min.js'))}}"></script>

   <!-- Main.js -->
   <script src="{{(asset('assetslanding/js/main.js'))}}"></script>
    
</body>
</html>
