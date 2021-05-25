<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('front.auth.partials._head')
</head>
<body>

    @include('front.auth.partials._nav')

    @yield('contents')

    @include('front.partials._footer')

    @include('front.partials._script')
    
</body>
</html>
