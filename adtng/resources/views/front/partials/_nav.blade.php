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
                        {{-- <li><a href="{{ route('index') }}#prices">Prices</a></li> --}}
                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                        @guest
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                            <li>
                            <div class="dropdown" style="margin-top: 15px">
                                <a href="{{ route('register') }}" class="btn btn-warning">Create Account</a>
                            </div>
                        </li>
                        @endguest
                        @auth
                            <li>
                            <div class="dropdown" style="margin-top: 15px">
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
                        </li>
                        @endauth
                        {{-- <li><a href="{{ route('register') }}" class="btn btn-warning btn-outline btn-sm">Create Account</a></li> --}}
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
