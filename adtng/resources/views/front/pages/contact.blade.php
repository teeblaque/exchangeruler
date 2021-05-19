
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
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../../../unicons.iconscout.com/release/v2.1.9/css/unicons.css">
        <!-- Magnific -->
        <link href="css/magnific-popup.css" rel="stylesheet" type="text/css" />
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
                        <img src="{{ asset('images/ADTlogo.png') }}" height="50" alt="">
                    </a>
                </div>
                @guest
                    <div class="buy-button" style="margin-top: 15px">
                    <a href="{{ route('register') }}" target="_blank" class="btn btn-warning">Sign Up</a>
                </div>
                @endguest
                <!--end login button-->
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
                    <ul class="navigation-menu">
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

        <!-- Start Contact -->
        <section class="section pt-5 mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="card map border-0">
                            <div class="card-body p-0">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.577973307684!2d3.8849357151091493!3d7.401092394659919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x843e2e16f0f4f355!2sCentral%20Mosque!5e0!3m2!1sen!2s!4v1606618991144!5m2!1sen!2s" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

           <div class="container mt-100 mt-60">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6 mt-4 mt-sm-0 pt-2 pt-sm-0 order-2 order-md-1">
                        <div class="card custom-form rounded shadow border-0">
                            <div class="card-body">
                                <div id="message"></div>
                                <form method="post" action="{{ route('contact') }}" name="contact-form" id="contact-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group position-relative">
                                                <label>Your Name <span class="text-danger">*</span></label>
                                                <i data-feather="user" class="fea icon-sm icons"></i>
                                                <input name="name" id="name" type="text" class="form-control pl-5" placeholder="Full Name :" required>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-6">
                                            <div class="form-group position-relative">
                                                <label>Your Email <span class="text-danger">*</span></label>
                                                <i data-feather="mail" class="fea icon-sm icons"></i>
                                                <input name="email" id="email" type="email" class="form-control pl-5" placeholder="Your email :" required>
                                            </div>
                                        </div><!--end col-->
                                         <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Your Phone Number <span class="text-danger">*</span></label>
                                                <i data-feather="phone" class="fea icon-sm icons"></i>
                                                <input name="mobile" id="mobile" type="tel" class="form-control pl-5" placeholder="Your Mobile :" required>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Message</label>
                                                <i data-feather="message-circle" class="fea icon-sm icons"></i>
                                                <textarea name="contents" id="contents" rows="4" class="form-control pl-5" placeholder="Your Message :" required></textarea>
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <button type="submit" id="submit" class="submitBnt btn btn-warning btn-block">Send Message</button>
                                            {{-- <input type="submit" id="submit" name="send" class="submitBnt btn btn-warning btn-block" value="Send Message"> --}}
                                            <div id="simple-msg"></div>
                                        </div><!--end col-->
                                    </div><!--end row-->
                                </form><!--end form-->
                            </div>
                        </div><!--end custom-form-->
                    </div><!--end col-->

                    <div class="col-lg-7 col-md-6 order-1 order-md-2">
                        <div class="title-heading ml-lg-4">
                            <h4 class="mb-4">Contact Details</h4>
                            <p class="text-muted">Start working with <span class="text-warning font-weight-bold">ADT MultiConcept</span> that can provide everything you need to generate awareness, drive traffic, connect.</p>
                            <div class="media contact-detail align-items-center mt-3">
                                <div class="icon">
                                    <i data-feather="mail" class="fea icon-m-md text-dark mr-3"></i>
                                </div>
                                <div class="media-body content">
                                    <h4 class="title font-weight-bold mb-0">Email</h4>
                                    <a href="mailto:contact@example.com" class="text-warning">info@adtng.biz</a>
                                </div>
                            </div>

                            <div class="media contact-detail align-items-center mt-3">
                                <div class="icon">
                                    <i data-feather="phone" class="fea icon-m-md text-dark mr-3"></i>
                                </div>
                                <div class="media-body content">
                                    <h4 class="title font-weight-bold mb-0">Phone</h4>
                                    <a href="tel:+152534-468-854" class="text-warning">+152 534-468-854</a>
                                </div>
                            </div>

                            <div class="media contact-detail align-items-center mt-3">
                                <div class="icon">
                                    <i data-feather="map-pin" class="fea icon-m-md text-dark mr-3"></i>
                                </div>
                                <div class="media-body content">
                                    <h4 class="title font-weight-bold mb-0">Location</h4>
                                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.577973307684!2d3.8849357151091493!3d7.401092394659919!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x843e2e16f0f4f355!2sCentral%20Mosque!5e0!3m2!1sen!2s!4v1606618991144!5m2!1sen!2s" class="video-play-icon text-warning">View on Google map</a>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End contact -->

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
        <!-- Magnific Popup -->
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/magnific.init.js"></script>
        <!-- Contact Js -->
        <script src="js/contact.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <script src="../../../unicons.iconscout.com/release/v2.1.9/script/monochrome/bundle.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/app.js"></script>

         <script>
        $('document').ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

         function isEmpty(value){
            return (value == null || value.length === 0);
        }

        $('#submit_mail').click(function(e){
            e.preventDefault();

            var email = $("#email").val();
            var name = $("#name").val();
            var mobile = $("#mobile").val();
            var contents = $("#contents").val();

            if (isEmpty(email) || isEmpty(name) || isEmpty(mobile) || isEmpty(contents)) {
                alert('All fields are required');
            } else {
                $.ajax({
                    type: "POST",
                    url: "{{ route('contact') }}",
                    data: {email: email, name: name, mobile: mobile, contents: contents}

                }).done(function(data){
                    console.log(data);
                    alert(data);
                    window.location.reload();

                }).fail(function(data){
                    console.log(data);
                });
            }
        });
        });
    </script>
    </body>


</html>
