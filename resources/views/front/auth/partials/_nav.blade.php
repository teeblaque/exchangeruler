<nav class="navbar h-auto" style="">
      <div class="container-fluid">
        <div class="col-12 col-lg-7"><a href="{{ route('index') }}">
          <img src="{{ asset('images/logo_1.png') }}" style="height: 30px;width: auto;" alt="brand logo" class="img-fluid logo spin"></a>
        <div class="d-inline-block ml-5 ml-xl-3" style="margin-left: 20% !important;"><span class="bitcoin-price">1 BTC = ${{ $menu }}</span></div>
        </div>
        <span class="ant-dropdown-link ant-dropdown-trigger d-flex d-xl-none hamburger-cont high-index button1"  href="#drops"class="button1"><i
          aria-label="icon: menu" class="anticon anticon-menu hamburger ant-dropdown-link"><svg
          viewBox="64 64 896 896" focusable="false" class="" data-icon="menu" width="1em" height="1em"
          fill="currentColor" aria-hidden="true">
          <path
          d="M904 160H120c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-64c0-4.4-3.6-8-8-8zm0 624H120c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-64c0-4.4-3.6-8-8-8zm0-312H120c-4.4 0-8 3.6-8 8v64c0 4.4 3.6 8 8 8h784c4.4 0 8-3.6 8-8v-64c0-4.4-3.6-8-8-8z">
        </path>
      </svg></i>
    </span>
    <div class="ant-dropdown  ant-dropdown-placement-bottomRight drops" style="left: 280px; top: 56px;">
      <ul class="ant-dropdown-menu ant-dropdown-menu-light ant-dropdown-menu-root ant-dropdown-menu-vertical" role="menu"
      tabindex="0">
    @guest
        <li class="ant-dropdown-menu-item" role="menuitem"><a href="{{ route('login') }}">Login</a></li>
      <li class=" ant-dropdown-menu-item-divider"></li>
      <li class="ant-dropdown-menu-item" role="menuitem"><a href="{{ route('register') }}">Create Account</a></li>
      <li class=" ant-dropdown-menu-item-divider"></li>
    @endguest
      <li class="ant-dropdown-menu-item" role="menuitem"><a href="{{ route('about') }}">About Us</a></li>
      <li class=" ant-dropdown-menu-item-divider"></li>
      <li class="ant-dropdown-menu-item" role="menuitem"><a href="{{ route('contact') }}">Contact Us</a></li>
      <li class=" ant-dropdown-menu-item-divider"></li>
      @auth
          <li class="ant-dropdown-menu-item" role="menuitem"><a href="{{ route('user.index') }}">Dashboard</a></li>
      @endauth
    </ul>
  </div>
  <div class="col-5 d-none d-lg-flex justify-content-end align-items-center" >
    <div class="d-xl-inline-block mr-4" style="min-width:450px !important">
     <a href="{{ route('about') }}"><button type="button" class="ant-btn naked ant-btn-link"><span>About Us</span></button></a>
     <a href="{{ route('index') }}#howtouse"> <button type="button" class="ant-btn naked ant-btn-link"><span>How to use</span></button></a>
     <a href="{{ route('contact') }}"><button type="button"
     class="ant-btn naked ant-btn-link"><span>Contact Us</span></button></a>
     {{-- @guest --}}
         <a href="{{ route('login') }}"><button type="button" class="ant-btn naked ant-btn-link" ant-click-animating-without-extra-node="false"><span>login</span></button></a>
     {{-- @endguest --}}
   </div>
   @guest
       <div class="d-inline-block mr-4" style="margin-left:-6%;"><a href="{{ route('register') }}"><button type="button" class=" btn-secondary ant-btn naked ant-btn-link"><span>Create Account</span></button></a></div>
   @endguest
   {{-- @auth
       <div class="dropdown">
       <button class="btn btn-lg naked green" id="showbutton"><i class="glyphicon glyphicon-user"></i>&nbsp;Welcome, {{ Auth::user()->name }}&nbsp;<span class="glyphicon glyphicon-chevron-down"></span></button>
    <div class="dropdown-menu" id="showing">
      <a class="dropdown-item btn hover green" href="{{ route('user.index') }}"><i class="glyphicon glyphicon-dashboard"></i>&nbsp;&nbsp;<strong>Dashboard</strong></a>
      <div>
          <a class="dropdown-item btn hover red" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-log-out"></i>&nbsp;&nbsp;<strong>Logout</strong></a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
      </div>
    </div>
  </div>
   @endauth --}}
</div>
</div>
</nav>
