<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
        <meta name="description" content="A Igreja Evangélica Ministério Semeando a Verdade é uma igreja que preza pela Palavra de Deus, cujo propósito é fazer com que o evangelho do Senhor Jesus Cristo seja proclamado, anunciado e propagado em toda a Terra.">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@100;300;400;500;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=71">
{{--        <link rel="stylesheet" href="{{ asset('css/flickity.min.css') }}">--}}
{{--        <link rel="stylesheet" href="https://unpkg.com/flickity-fade@2/flickity-fade.css">--}}

        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/icons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/icons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/icons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/icons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/icons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/icons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/icons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/icons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/icons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('img/icons/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/icons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/icons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/icons/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('img/icons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('img/icons/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body class="flex flex-col min-h-full">
        <nav id="menu" class="menu bg-black">
            @include('includes/header')
        </nav>

        <div class="flex-1">
            @yield('content')
        </div>

        @include('includes.footer')

        <a class="btn-scrolling hidden fixed bottom-5 right-5 text-xl w-12 h-12 shadow-md border border-gray-400 bg-gray-300 rounded flex justify-center items-center"
           href="#menu" accesskey="m">
            <ion-icon name="arrow-up-outline"></ion-icon>
        </a>

        <!-- Scripts -->
{{--        <script src="{{ asset('js/flickity.pkgd.min.js') }}" defer></script>--}}
{{--        <script src="{{ asset('js/flickity-fade.js') }}" defer></script>--}}
        <script src="{{ asset('js/app.js') }}?v=11" defer></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
{{--        <script src="{{ asset('js/maskmoney/dist/jquery.maskMoney.min.js') }}"></script>--}}

        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
{{--        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>--}}

        @yield('add-scripts')
    </body>
</html>
