<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
         <title>Job board HTML-5 Template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="manifest" href="site.webmanifest">
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">

		<!-- CSS here -->
         
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
            <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

            
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
                                <a href="{{ route('index') }}" class="nav-link"><img src="{{ asset('img/logo/logo.png') }}" alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                    @if(auth()->check())
                                        <ul id="navigation">
                                            <li><a href="#" data-url="{{ route('index') }}" class="nav-link dynamic-link">Home</a></li>
                                            <li><a href="#" data-url="{{ route('job_listing') }}" class="nav-link dynamic-link">Find a Jobs </a></li>
                                            <li><a href=" {{ route('about') }}" class="nav-link">About</a></li>
                                            <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href=" {{ route('blog') }}">Blog</a></li>
                                                    <li><a href=" {{ route('single_blog') }}">Blog Details</a></li>
                                                    <li><a href=" {{ route('elements') }}">Elements</a></li>
                                                    <li><a href="#">job Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href=" {{ route('contact') }}">Contact</a></li>
                                        </ul>
                                    @else
                                    <ul id="navigation">
                                            <li><a href=" {{ route('Emp.dashboard') }}">Home</a></li>
                                            <li><a href=" #">Listed jobs</a></li>
                                            <li><a href="#">Page</a>
                                                <ul class="submenu">
                                                    <li><a href="#">Feedback</a></li>
                                                    <li><a href="#">photos</a></li>
                                                    <li><a href="#">Elements</a></li>
                                                    <li><a href="#">job Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>

                                    @endif
                                    </nav>
                                </div>          
                                <!-- Header-btn -->
                                <div class="header-btn d-none f-right d-lg-block">
                                    @if(auth()->check())
                                         <a href="#" data-url="{{ route('user.profile') }}" class="btn head-btn3 dynamic-link">Profile</a>
                                         <a href="{{ route('logout') }}" class="btn head-btn2">Logout</a>
                                    @elseif(auth()->guard('Organization')->check())
                                         <a href="#" data-url="{{ route('user.profile') }}" class="btn head-btn3 dynamic-link">Profile</a>
                                         <a href="{{ route('Emp.logout') }}" class="btn head-btn2">Logout</a>
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
    <main>
    <div id="user-content">

    </div>
    </main>
  <!-- JS here -->
        
	    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script > const routes={
            edu_url:"{{ route('update.edu')}}",
            exp_url:"{{ route('update.exp')}}",
            prof_url:"{{route('edit.user')}}",
            store_edu:"{{route('store.edu')}}",
            index:"{{route('index')}}"
        };</script>
        <script src="{{ asset('js/ajx.js') }}"></script>
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js') }}"></script>
		<!-- Jquery, Popper, Bootstrap -->
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