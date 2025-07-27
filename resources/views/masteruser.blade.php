<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job board HTML-5 Template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
            <link rel="stylesheet" href="{{ asset('css/price_rangs.css') }}">
            <link rel="stylesheet" href="{{ asset('css/slicknav.css') }}">
            <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
            <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
            <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
            <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
            <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
            <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
   </head>

   <body>
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('img/logo/logo.png') }}" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->
    <header>
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo">
                                <a href=" {{ route('index') }}"><img src="{{ asset('img/logo/logo.png') }}" alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation">
                                            <li><a href=" {{ route('index') }}">Home</a></li>
                                            <li><a href=" {{ route('job_listing') }}">Find a Jobs </a></li>
                                            <li><a href=" {{ route('about') }}">About</a></li>
                                            <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href=" {{ route('blog') }}">Blog</a></li>
                                                    <li><a href=" {{ route('single_blog') }}">Blog Details</a></li>
                                                    <li><a href=" {{ route('elements') }}">Elements</a></li>
                                                    <li><a href=" {{ route('job_details') }}">job Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href=" {{ route('contact') }}">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    @if(auth()->check())
    <a href="{{ route('user.profile') }}" class="btn head-btn3">Profile</a>
    <a href=" {{ route('logout') }}" class="btn head-btn2">Logout</a>
    @else
    <a href=" {{ route('registerpage') }}" class="btn head-btn1">Register</a>
    <a href="{{ route('loginpage') }}" class="btn head-btn2">Login</a>
@endif

                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>
    @yield('content')
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-bg footer-padding">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                       <div class="single-footer-caption mb-50">
                         <div class="single-footer-caption mb-30">
                            <!-- Add JS files here -->
                            <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
                            <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
                            <script src="{{ asset('js/popper.min.js') }}"></script>
                            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
                            <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>
                            <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
                            <script src="{{ asset('js/slick.min.js') }}"></script>
                            <script src="{{ asset('js/wow.min.js') }}"></script>
                            <script src="{{ asset('js/animated.headline.js') }}"></script>
                            <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
                            <script src="{{ asset('js/gijgo.min.js') }}"></script>
                            <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
                            <script src="{{ asset('js/jquery.sticky.js') }}"></script>
                            <script src="{{ asset('js/contact.js') }}"></script>
                            <script src="{{ asset('js/jquery.form.js') }}"></script>
                            <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
                            <script src="{{ asset('js/mail-script.js') }}"></script>
                            <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
                            <script src="{{ asset('js/jquery.easypiechart.min.js') }}"></script>
                            <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
                            <script src="{{ asset('js/waypoints.min.js') }}"></script>
                            <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
                            <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
                            <script src="{{ asset('js/price_rangs.js') }}"></script>
                            <script src="{{ asset('js/main.js') }}"></script>
                        </div>
                         </div>
                       </div>
                    </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area footer-bg">
            <div class="container">
                <div class="footer-border">
                     <div class="row d-flex justify-content-between align-items-center">
                         <div class="col-xl-10 col-lg-10 ">
                             <div class="footer-copy-right">
                                 <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                             </div>
                         </div>
                         <div class="col-xl-2 col-lg-2">
                             <div class="footer-social f-right">
                                 <a href="#"><i class="fab fa-facebook-f"></i></a>
                                 <a href="#"><i class="fab fa-twitter"></i></a>
                                 <a href="#"><i class="fas fa-globe"></i></a>
                                 <a href="#"><i class="fab fa-behance"></i></a>
                             </div>
                         </div>
                     </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>

  <!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ asset('js/jquery.slicknav.min.js') }}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/slick.min.js') }}"></script>
        <script src="{{ asset('js/price_rangs.js') }}"></script>
        
		<!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('js/wow.min.js') }}"></script>
		<script src="{{ asset('js/animated.headline.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('js/jquery.sticky.js') }}"></script>
        
        <!-- contact js -->
        <script src="{{ asset('js/contact.js') }}"></script>
        <script src="{{ asset('js/jquery.form.js') }}"></script>
        <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/mail-script.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
        
    </body>
</html>