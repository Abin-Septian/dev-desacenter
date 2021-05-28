@extends('layoutlanding/layoutlanding')

@section('title','desacenter')

@section('container')

 <!-- Start Slider Area -->
    <div class="slider-area ">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="slider-carousel owl-carousel">
                        <div class="single-slider slider-bg-1 text-center">
                            <div class="slider-inner">
                                <!-- <h1>WELCOME TO BE-ONE</h1>
                                ><h5>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa cum sociic</h5> -->
                                <a class="btn get-started-btn rounded" href="{{ url('login') }}">Get Started</a>
                            </div>
                        </div>
                        <div class="single-slider slider-bg-2 text-center">
                            <div class="slider-inner">
                                <!-- <h1>Free MULTIPURPSE TEMPLATE</h1>
								<h5>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis n</h5 -->
>                                <a class="btn get-started-btn rounded"  href="{{ url('login') }}">Get Started</a>
                            </div>
                        </div>
                        <!-- <div class="single-slider slider-bg-3 text-center">
                            <div class="slider-inner">
                                <h1>WE PROMOTE YOUR BUSINESS</h1>
								<h5>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis n</h5>
                                <a class="btn get-started-btn" href="#">Get Started</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->
    <!-- Start Hire Us Area -->
    <div class="hire-us-area theme-bg js--sticky-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-9 col-12 mt-2">
                    <div class="hire-us-content">
                    <!-- <span>100+</span>  -->
                        <h6>Bergabung Sekarang Bersama Kami di Desacenter.id</h6> 
                    </div>  
                </div>
                <div class="col-lg-3 col-md-3  offset-lg-2 col-12 text-right">
                    <a class="btn hire-us-button" href="{{ url('login') }}">Bergabung</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hire Us Area -->
    <!-- Start Icon Box Area -->
    <div class="icon-box-area pt-70 pb-70" id="feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-icon-box icon-box-img-1 card" id="rcard">
                        <div class="icon-box-content">
                            <h6 class="iconbox-content-heading"><i class="far fa-chart-bar"></i> APA ITU DESACENTER</h6>
                            <div class="iconbox-content-body">
                                
                                <a class="btn btn-inline read-more-btn" href="{{ url('apa') }}"><i class="fas fa-plus-square"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-icon-box icon-box-img-2 card" id="rcard">
                        <div class="icon-box-content">
                            <h6 class="iconbox-content-heading"><i class="fas fa-cogs"></i> BAGAIMANA CARA BERGABUNG DENGAN KAMI</h6>
                            <div class="iconbox-content-body">
                                <p>Penjelasan singkat</p>
                                <a class="btn btn-inline read-more-btn" href="#"><i class="fas fa-plus-square"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-icon-box icon-box-img-3 card" id="rcard">
                        <div class="icon-box-content">
                            <h6 class="iconbox-content-heading"><i class="fas fa-chart-line"></i> POTENSI DESA KEDEPAN</h6>
                            <div class="iconbox-content-body">
                                <p >Penjelasan singkat</p>
                                <a class="btn btn-inline read-more-btn" href="#"><i class="fas fa-plus-square"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Icon Box Area -->
    <!-- Start We are Bemax Area -->
    <!-- <div class="bemax-area gray-bg pt-65 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-70">
                    <div class="section-title">
                        <h4>We are Be-One</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-bemax-item d-flex">
                        <div class="item-icon">
                           <a href="#"> <i class="fas fa-desktop"></i></a>
                        </div>
                        <div class="item-content">
                            <h6><a href="#">Responsive Design</a></h6>
                            <p class="text-muted">Vestibulum non diam quis nisl dignissim posuere a vulputate urna nunc velit</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-bemax-item d-flex">
                        <div class="item-icon">
                            <a href="#"><i class="far fa-gem"></i></a>
                        </div>
                        <div class="item-content">
                            <h6><a href="#">Very Easy Customize</a></h6>
                            <p class="text-muted">Vestibulum non diam quis nisl dignissim posuere a vulputate urna nunc velit</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-bemax-item d-flex">
                        <div class="item-icon">
                            <a href="#"><i class="fas fa-bullhorn"></i></a>
                        </div>
                        <div class="item-content">
                            <h6><a href="#">Free Font Icons</a></h6>
                            <p class="text-muted">Vestibulum non diam quis nisl dignissim posuere a vulputate urna nunc velit</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-bemax-item d-flex">
                        <div class="item-icon">
                            <a href="#"><i class="fas fa-tablet-alt"></i></a>
                        </div>
                        <div class="item-content">
                            <h6><a href="#">Mobile Ready</a></h6>
                            <p class="text-muted">Vestibulum non diam quis nisl dignissim posuere a vulputate urna nunc velit</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-bemax-item d-flex">
                        <div class="item-icon">
                            <a href="#"><i class="fas fa-pencil-alt"></i></a>
                        </div>
                        <div class="item-content">
                            <h6><a href="#">Modern Style</a></h6>
                            <p class="text-muted">Vestibulum non diam quis nisl dignissim posuere a vulputate urna nunc velit</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-bemax-item d-flex">
                        <div class="item-icon">
                            <a href="#"><i class="fas fa-comments"></i></a>
                        </div>
                        <div class="item-content">
                            <h6><a href="#">Awesome Support</a></h6>
                            <p class="text-muted">Vestibulum non diam quis nisl dignissim posuere a vulputate urna nunc velit</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End We are Bemax Area -->
    <!-- Start Latest Project Area -->
    <div class="latest-project-area blue-bg pt-70 pb-70" id="portfolio">
        <div class="container">
        <div class="row">
                <div class="col-lg-12 text-center mb-70">
                    <div class="section-title">
                        <h4>PENDAFTAR DESACENTER.id</h4>
                    </div>
                </div>
            </div>
        <div class="row" style="margin-top: 30px;">
                <div class="col-xl-3" style="margin: 10px;text-align: center;vertical-align: middle;">
                    <h2 id="totalPendaftaran"></h2>
                    <h6><span>Total Pendaftaran Pelatihan Online</span></h6>
                </div>
                <div class="col-xl-8" style="margin: 10px;text-align: center;vertical-align: middle;">
                    <div class="row">
                        <div class="col-sm-4" style="margin: 10px 0px;text-align: center;">
                            <h6>Daftar</h6>
                            <div style="background-image: radial-gradient(circle, #fee2e1, #fee2e1 66%, transparent 66%);height: 10em;width: 10em;text-align: center;vertical-align: middle;padding: 35px;margin: 0px 20%;">
                                <span style="color: #f83f37;font-size: 54px;" id="daftarPelatihan"></span>    
                          </div>
                        </div>
                        <div class="col-sm-4" style="margin: 20px 0px;text-align: center;">
                            <h6>Aktif</h6>
                            <div style="background-image: radial-gradient(circle, #e1e5f3, #e1e5f3 66%, transparent 66%);height: 10em;width: 10em;text-align: center;vertical-align: middle;padding: 35px;margin: 0px 20%;">
                                <span style="color: #3a55b1;font-size: 54px;" id="aktifPelatihan"></span>

                            </div>
                        </div>
                        <div class="col-sm-4" style="margin: 20px 0px;text-align: center;">
                            <h6>Selesai</h6>
                            <div style="background-image: radial-gradient(circle, #ddf3e3, #ddf3e3 66%, transparent 66%);height: 10em;width: 10em;text-align: center;vertical-align: middle;padding: 35px;margin: 0px 20%;">
                                <span style="color: #22af47;font-size: 54px;" id="selesaiPelatihan"></span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Latest Project Area -->
    <!-- Start Why Choose Us Area -->
    <div class="choose-us-area pt-70 pb-70" id="page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-70">
                    <div class="section-title">
                        <h4>PENGUMUMAN PEMENANG DESACENTER batch 1 </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                <div class="video-container">
                 <iframe src="https://www.youtube.com/embed/H7BEjR02S6Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-choose-item">
                        <h6><a href="#"><i class="fas fa-cogs"></i> Awesome Design</a></h6>
                        <p>Morbi vehicula a nibh in commodo. Aliquam quis dolor eget lectus pulvinar malesuada. Suspendisse eu rhoncus ligula.</p>
                    </div>
                    <div class="single-choose-item">
                        <h6><a href="#"><i class="fas fa-gem"></i> Flexible Layouts </a></h6>
                        <p>Nam orci metus, varius at nisl at, tempor facilisis magna. Ut maximus felis et tincidunt lacinia. Nulla malesuada ipsum at magna condimentum pharetra.</p>
                    </div>
                    <div class="single-choose-item">
                        <h6><a href="#"><i class="fas fa-briefcase"></i> Easy to Use</a></h6>
                        <p>Fusce viverra risus diam, in luctus nulla porta vel. Etiam nunc lorem, dapibus id augue vitae, lacinia pharetra eros. Fusce ac egestas purus, non porta est.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Why Choose Us Area -->
    <!-- Start Working With Us Area -->
    <div class="working-with-us-area gray-bg">
        <div class="container"> 
            <div class="row">
                <div class="col-md-6 col-12 text-center d-flex align-items-center">
                    <div class="hire-us-content">
                        <div class="section-title">
                            <h4>Working With Us</h4>
                        </div>
                        <p class="text-muted">We’ve completed more than <span>100+</span>project for our am azing clients, If you interested?</p>
                        <a href="#" class="btn hire-us-btn">Hire Us</a>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div class="hire-us-img">
                        <img src="assetslanding/img/hire_us.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Working With Us Area -->
    <!-- Start Carousel Area -->
    <!-- <div class="carousel-area pt-80 pb-80" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h4>Latest blog Posts</h4>
                    </div>
                    <div class="blog-carousel owl-carousel">
                        <div class="single-blog-item">
                            <div class="single-blog-img">
                                <img src="assets/img/blog_01.jpg" alt="">
                                <span>October 25, 2017</span>
                            </div>
                            <div class="blog-content">
                                <h5 class="post-heading"><a href="#">10 Tips for a Business Strong Start</a> </h5>
                                <p class="post-content-text">Donec sit amet neque lectus. Ut vitae turpis justo. Nullam a sodales est, at viverra sem. Mauris vitae pellentesque nisi, sit amet viverra orci.</p>
                                <div class="blog-btn">
                                    <div class="blog-tags">
                                        <i class="fas fa-tags"></i>
                                        <a href="#">Development</a>,
                                        <a href="#">Maketing</a>
                                    </div>
                                    <a href="#" class="btn btn-inline read-more-btn"><i class="fas fa-plus-square"></i>Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-blog-item">
                            <div class="single-blog-img">
                                <img src="assets/img/blog_02.jpg" alt="">
                                <span>October 25, 2017</span>
                            </div>
                            <div class="blog-content">
                                <h5 class="post-heading"><a href="#">10 Tips for a Business Strong Start</a> </h5>
                                <p class="post-content-text">Donec sit amet neque lectus. Ut vitae turpis justo. Nullam a sodales est, at viverra sem. Mauris vitae pellentesque nisi, sit amet viverra orci.</p>
                                <div class="blog-btn">
                                    <div class="blog-tags">
                                        <i class="fas fa-tags"></i>
                                        <a href="#">Development</a>,
                                        <a href="#">Maketing</a>
                                    </div>
                                    <a href="#" class="btn btn-inline read-more-btn"><i class="fas fa-plus-square"></i>Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-blog-item">
                            <div class="single-blog-img">
                                <img src="assets/img/blog_03.jpg" alt="">
                                <span>October 25, 2017</span>
                            </div>
                            <div class="blog-content">
                                <h5 class="post-heading"><a href="#">10 Tips for a Business Strong Start</a> </h5>
                                <p class="post-content-text">Donec sit amet neque lectus. Ut vitae turpis justo. Nullam a sodales est, at viverra sem. Mauris vitae pellentesque nisi, sit amet viverra orci.</p>
                                <div class="blog-btn">
                                    <div class="blog-tags">
                                        <i class="fas fa-tags"></i>
                                        <a href="#">Development</a>,
                                        <a href="#">Maketing</a>
                                    </div>
                                    <a href="#" class="btn btn-inline read-more-btn"><i class="fas fa-plus-square"></i>Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-blog-item">
                            <div class="single-blog-img">
                                <img src="assets/img/blog_04.jpg" alt="">
                                <span>October 25, 2017</span>
                            </div>
                            <div class="blog-content">
                                <h5 class="post-heading"><a href="#">10 Tips for a Business Strong Start</a> </h5>
                                <p class="post-content-text">Donec sit amet neque lectus. Ut vitae turpis justo. Nullam a sodales est, at viverra sem. Mauris vitae pellentesque nisi, sit amet viverra orci.</p>
                                <div class="blog-btn">
                                    <div class="blog-tags">
                                        <i class="fas fa-tags"></i>
                                        <a href="#">Development</a>,
                                        <a href="#">Maketing</a>
                                    </div>
                                    <a href="#" class="btn btn-inline read-more-btn"><i class="fas fa-plus-square"></i>Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-title">
                        <h4>Testimonials</h4>
                    </div>
                    <div class="testimonial-carousel owl-carousel">
                        <div class="single-testimonial-item ">
                            <div class="testimonial-content d-flex">
                                <i class="fas fa-quote-left"></i>
                                <p> Nullam faucibus, magna non fringilla ullamcorper, mi libero tempus arcu, fermentum lacinia sapien lacus eget dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tincidunt odio dolor</p>
                            </div>
                            <div class="author-details d-flex">
                                <div class="author-img">
                                    <img src="assets/img/user_01.png" alt="">
                                </div>
                                <div class="author-content">
                                   <a href="#">Michael Green</a>
                                   <span>Product Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-item ">
                            <div class="testimonial-content d-flex">
                                <i class="fas fa-quote-left"></i>
                                <p> Nullam faucibus, magna non fringilla ullamcorper, mi libero tempus arcu, fermentum lacinia sapien lacus eget dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tincidunt odio dolor</p>
                            </div>
                            <div class="author-details d-flex">
                                <div class="author-img">
                                    <img src="assets/img/user_02.png" alt="">
                                </div>
                                <div class="author-content">
                                   <a href="#">Michael Green</a>
                                   <span>Product Manager</span>
                                </div>
                            </div>
                        </div>
                        <div class="single-testimonial-item ">
                            <div class="testimonial-content d-flex">
                                <i class="fas fa-quote-left"></i>
                                <p> Nullam faucibus, magna non fringilla ullamcorper, mi libero tempus arcu, fermentum lacinia sapien lacus eget dui. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tincidunt odio dolor</p>
                            </div>
                            <div class="author-details d-flex">
                                <div class="author-img">
                                    <img src="assets/img/user_03.png" alt="">
                                </div>
                                <div class="author-content">
                                   <a href="#">Michael Green</a>
                                   <span>Product Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Carousel Area -->
    <!-- Start Brands Area -->
    <!-- <div class="brand-area gray-bg pt-70 pb-70">
        <div class="container">
            <div class="brand-carousel owl-carousel">
                <div class="brand-item">
                    <div class="brand-item-inner">
                        <a href="#"><img src="assets/img/brands/1.png" alt=""></a>
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-item-inner">
                        <a href="#"><img src="assets/img/brands/2.png" alt=""></a>
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-item-inner">
                        <a href="#"><img src="assets/img/brands/3.png" alt=""></a>
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-item-inner">
                        <a href="#"><img src="assets/img/brands/4.png" alt=""></a>
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-item-inner">
                        <a href="#"><img src="assets/img/brands/5.png" alt=""></a>
                    </div>
                </div>
                <div class="brand-item">
                    <div class="brand-item-inner">
                        <a href="#"><img src="assets/img/brands/6.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End Brands Area -->
   
    @endsection