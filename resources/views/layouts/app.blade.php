<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main-style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="icon" href="{{ asset('img/favicons/icon-favicon.ico') }}">
</head>
<body>
    @if (Request::is('dashboard'))
        @include('includes.header-connected')
    @else
        @include('includes.header-non-connected')
    @endif
    
    <div class='container'>
        @yield('content')
    </div>

    @if (Request::is('dashboard'))
        @include('includes.footer-connected')
    @else
        @include('includes.footer-non-connected')
    @endif
</body>
</html>