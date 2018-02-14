<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='{{asset("css/app.css")}}' rel="stylesheet" type="text/css" >
    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <!-- Styles -->
    @include('templates/styles')
</head>
@include('templates/navbar')
<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        {{-- <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endauth
        </div> --}}
        @endif

        <div class="content">
            <div class="title m-b-md">
                @yield('TitlePageName')
            </div>
            @include('flash-message')
            @yield('content')
        </div>
    </div>
</body>
</html>
