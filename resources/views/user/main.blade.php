<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('user.partials._head')
</head>
<body>
    

    <div id="loader-wrapper" style="position: fixed;">
    <div id="loader">
      <img src="{{ asset('userback/images/logo_1.png') }}" width="70" height="70" alt="" class="load">
    </div>

    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
  </div>

  <div id="app">
      @include('user.partials._sidebar')

      @include('user.partials._nav')

      <div id="app">
          @include('user.partials._header')

          @include('user.partials._success')

          @include('user.partials._failure')

          @yield('contents')
      </div>
  </div>

  @include('user.partials._script')
</body>
</html>
