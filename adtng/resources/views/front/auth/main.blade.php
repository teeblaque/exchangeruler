<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('front.auth.partials._head')
</head>
<body class="form">

    @yield('contents')

    @include('front.auth.partials._script')
</body>
</html>
