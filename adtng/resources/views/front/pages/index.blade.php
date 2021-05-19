
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>ADT MutliConcept</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="ADT multi Business concept" />
        <meta name="keywords" content="CryptoCurrency, Bitcoin, Bills, Payment" />
        <meta name="author" content="Taiwo" />
        <meta name="email" content="ajayitaiwo89@gmail.com" />
        <meta name="website" content="" />
        <meta name="Version" content="v1.0.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Magnific -->
        <link href="css/magnific-popup.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../../../unicons.iconscout.com/release/v2.1.9/css/unicons.css">
        <!-- Slider -->
        <link rel="stylesheet" href="css/owl.carousel.min.css"/>
        <link rel="stylesheet" href="css/owl.theme.default.min.css"/>
        <link href="css/swiper.min.css" rel="stylesheet" type="text/css" />
        <!-- Main Css -->
        <link href="css/style.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/default.css" rel="stylesheet" id="color-opt">
    </head>

    <body>
        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
        <!-- Loader -->

        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="{{ route('index') }}">
                        <img src="{{ asset('images/ADTlogo.png') }}" class="l-dark" height="50" alt="">
                        <img src="{{ asset('images/ADTlogo.png') }}" class="l-light" height="50" alt="">
                    </a>
                </div>
                @guest
                    <div class="buy-button" style="margin-top: 15px">
                    <a href="{{ route('register') }}">
                        <div class="btn btn-warning login-btn-warning">Sign Up</div>
                        {{-- <div class="btn btn-light login-btn-light">Sign In</div> --}}
                    </a>
                </div>
                @endguest

                @auth
                    <div class="dropdown buy-button" style="margin-top: 15px">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hello, {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Log out</a>
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                            </div>
                            </div>
                @endauth
                <!--end login button-->
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu nav-light">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li class="has-submenu">
                            <a href="javascript:void(0)">Services</a><span class="menu-arrow"></span>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="{{ route('services') }}">TV Cables</a></li>
                                        <li><a href="{{ route('services') }}">Bitcoin, Eth, USDT</a></li>
                                        <li><a href="{{ route('services') }}">Internet Data</a></li>
                                        <li><a href="{{ route('services') }}">Ghana Cedis and Rmb/CYN</a></li>
                                        <li><a href="{{ route('services') }}">Phones</a></li>
                                        <li><a href="{{ route('services') }}">China procurement</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                         {{-- <li><a href="#">Price</a></li> --}}
                          <li><a href="{{ route('contact') }}">Contact Us</a></li>
                           @guest
                               <li><a href="{{ route('login') }}">Sign In</a></li>
                           @endguest
                    </ul><!--end navigation menu-->
                    @guest
                        <div class="buy-menu-btn d-none">
                        <a href="{{ route('register') }}" target="_blank" class="btn btn-warning">Sign Up</a>
                    </div>
                    @endguest
                    @auth
                    <div class="dropdown buy-menu-btn d-none">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Hello, {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('user.dashboard') }}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Log out</a>
                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                            </div>
                            </div>
                @endauth
                    <!--end login button-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->

        <section class="swiper-slider-hero position-relative d-block vh-100" id="home">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide d-flex align-items-center overflow-hidden">
                        <div class="slide-inner slide-bg-image d-flex align-items-center" style="background: center center;" data-background="images/corporate/1.jpg">
                            <div class="bg-overlay"></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="title-heading text-center">
                                            <h1 class="heading text-white title-dark mb-4">Welcome to Adt, <br>we always have you in mind</h1>
                                            {{-- <p class="para-desc mx-auto text-white-50">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap4 html page.</p> --}}

                                            <div class="mt-4 pt-2">
                                                <a href="{{ route('register') }}" class="btn btn-warning">Get Started</a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end container-->
                        </div><!-- end slide-inner -->
                    </div> <!-- end swiper-slide -->

                    <div class="swiper-slide d-flex align-items-center overflow-hidden">
                        <div class="slide-inner slide-bg-image d-flex align-items-center" style="background: center center;" data-background="images/corporate/2.jpg">
                            <div class="bg-overlay"></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="title-heading text-center">
                                            <h1 class="heading text-white title-dark mb-4">We are your one stop wallet <br><strong>For everything</strong></h1>
                                            {{-- <p class="para-desc mx-auto text-white-50">Launch your campaign and benefit from our expertise on designing and managing conversion centered bootstrap4 html page.</p> --}}

                                            <div class="mt-4 pt-2">
                                                <a href="{{ route('register') }}" class="btn btn-warning">Get Started</a>
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end container-->
                        </div><!-- end slide-inner -->
                    </div> <!-- end swiper-slide -->
                </div>
                <!-- end swiper-wrapper -->

                <!-- swipper controls -->
                <!-- <div class="swiper-pagination"></div> -->
                <div class="swiper-button-next border rounded-circle text-center"></div>
                <div class="swiper-button-prev border rounded-circle text-center"></div>
            </div><!--end container-->
        </section><!--end section-->
        <!-- Hero End -->

        <!-- FEATURES START -->
        <section class="section bg-light">
            <div class="container mt-100 mt-60" id="about">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-5 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <div class="position-relative">
                            <img src="images/company/newabt.jpg" class="img-fluid mx-auto" alt="">
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-7 col-md-7 mt-4 pt-2 mt-sm-0 pt-sm-0">
                        <div class="section-title ml-lg-4">
                            <h4 class="title mb-4">About Us</h4>
                            <p class="text-muted">ADTSERVERHQ is a company that deals in Crytpocurrency trading, sale of airtime & data, and sale of phones,gadgets and console, the company boasts of customers all over Nigeria and beyond. <br/>
                            <br/>ADTSERVERHQ was founded to create a safe and trusted platform where transactions and sales can be made.
                            </p>
                            {{-- <a href="javascript:void(0)" class="btn btn-primary mt-3">Buy Now <i class="mdi mdi-chevron-right"></i></a> --}}
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!--end section-->

        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">Our Services</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-warning font-weight-bold">Adt MultiConcept</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="media key-feature align-items-center p-3 rounded shadow">
                            <div class="icon text-center rounded-circle mr-3">
                                <i data-feather="monitor" class="fea icon-ex-md text-primary"></i>
                            </div>
                            <div class="media-body">
                                <a href="{{ route('services') }}"><h4 class="title mb-0">TV cables</h4></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="media key-feature align-items-center p-3 rounded shadow">
                            <div class="icon text-center rounded-circle mr-3">
                                <i data-feather="eye" class="fea icon-ex-md text-primary"></i>
                            </div>
                            <div class="media-body">
                                <a href="{{ route('services') }}"><h4 class="title mb-0">Internet Data</h4></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="media key-feature align-items-center p-3 rounded shadow">
                            <div class="icon text-center rounded-circle mr-3">
                                <i data-feather="feather" class="fea icon-ex-md text-primary"></i>
                            </div>
                            <div class="media-body">
                                <a href="{{ route('services') }}"><h4 class="title mb-0">Airtime</h4></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="media key-feature align-items-center p-3 rounded shadow">
                            <div class="icon text-center rounded-circle mr-3">
                                <i data-feather="heart" class="fea icon-ex-md text-primary"></i>
                            </div>
                            <div class="media-body">
                                <a href="{{ url('coming-soon') }}"><h4 class="title mb-0">Bitcoin, Eth, USDT</h4></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="media key-feature align-items-center p-3 rounded shadow">
                            <div class="icon text-center rounded-circle mr-3">
                                <i data-feather="bold" class="fea icon-ex-md text-primary"></i>
                            </div>
                            <div class="media-body">
                                <a href="{{ url('coming-soon') }}"><h4 class="title mb-0">Ghana Cedis and Rmb/CYN</h4></a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="media key-feature align-items-center p-3 rounded shadow">
                            <div class="icon text-center rounded-circle mr-3">
                                <i data-feather="code" class="fea icon-ex-md text-primary"></i>
                            </div>
                            <div class="media-body">
                                <a href="{{ url('coming-soon') }}"><h4 class="title mb-0">China procurement</h4></a>
                            </div>
                        </div>
                    </div><!--end col-->

                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->

        <section class="section">
             <!-- Process Start -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">How it works ?</h4>
                            <p class="text-muted para-desc mx-auto mb-0">Start working with <span class="text-warning font-weight-bold">Adt MultiConcept</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-md-3 col-12 mt-4 pt-2">
                        <div class="text-center">
                            <div class="rounded p-4 shadow">
                                <a href="javascript:void(0)"><img src="{{ asset('images/crypto/1.png') }}" height="100" class="mx-auto d-block" alt=""></a>
                            </div>

                            <div class="mt-3">
                                <h5><a href="javascript:void(0)" class="text-warning">Create Account</a></h5>
                                <p class="text-muted mb-0">Earn upto 250Mb</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-3 col-12 mt-4 pt-2">
                        <div class="text-center">
                            <div class="rounded p-4 shadow">
                                <a href="javascript:void(0)"><img src="images/crypto/2.png" height="100" class="mx-auto d-block" alt=""></a>
                            </div>

                            <div class="mt-3">
                                <h5><a href="javascript:void(0)" class="text-warning">Update Profile</a></h5>
                                <p class="text-muted mb-0">Update other Credentials</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-3 col-12 mt-4 pt-2">
                        <div class="text-center">
                            <div class="rounded p-4 shadow">
                                <a href="javascript:void(0)"><img src="images/crypto/3.png" height="100" class="mx-auto d-block" alt=""></a>
                            </div>

                            <div class="mt-3">
                                <h5><a href="javascript:void(0)" class="text-warning">Fund Wallet</a></h5>
                                <p class="text-muted mb-0">Payments with cards</p>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-md-3 col-12 mt-4 pt-2">
                        <div class="text-center">
                            <div class="rounded p-4 shadow">
                                <a href="javascript:void(0)"><img src="images/crypto/4.png" height="100" class="mx-auto d-block" alt=""></a>
                            </div>

                            <div class="mt-3">
                                <h5><a href="javascript:void(0)" class="text-warning">Start Transacting</a></h5>
                                <p class="text-muted mb-0">Transact with wallet coins</p>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
            <!-- Process End -->
        </section>

        <!-- Footer Start -->
            @include('front.partials._footer')
        <!-- Footer End -->
        <!-- Back to top -->
        <a href="#" class="btn btn-icon btn-soft-primary back-to-top"><i data-feather="arrow-up" class="icons"></i></a>
        <!-- Back to top -->

        <!-- javascript -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/scrollspy.min.js"></script>
        <!-- SLIDER -->
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/owl.init.js"></script>
        <script src="js/swiper.min.js"></script>
        <script src="js/swiper.init.js"></script>
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific.init.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <script src="../../../unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/app.js"></script>
    </body>

<!-- Mirrored from shreethemes.in/landrick/layouts/index-corporate.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Sep 2020 15:03:00 GMT -->
</html>
