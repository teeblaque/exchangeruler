<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="background:transparent !important; ">
<head>
   @include('front.partials._head')
</head>
<body data-gr-c-s-loaded="true" style="overflow-x: hidden;background: transparent !important;">
 
    @include('front.partials._loader')

    <div id="root">
        @include('front.partials._nav')

        @yield('contents')

        @include('front.partials._footer')

        @include('front.partials._script')
    </div>
</body>
</html>
