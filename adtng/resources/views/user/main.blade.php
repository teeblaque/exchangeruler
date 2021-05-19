<!DOCTYPE html>
<html lang="en">
<head>
    @include('user.partials._head')
</head>
<body>
    @include('user.partials._loader')

    @include('user.partials._nav')

    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="search-overlay"></div>

        @include('user.partials._sidebar')

        @yield('contents')
    </div>

    @include('user.partials._script')
</body>
</html>
