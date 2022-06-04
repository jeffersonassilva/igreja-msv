<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@100;300;400;500;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 grid
            grid-cols-[220px,1fr]
            grid-rows-[70px,1fr]
        ">
            <x-menu></x-menu>

            <section class="bg-black flex items-center justify-between pr-4 col-span-2 shadow-md">
                <div class="w-[220px] h-full flex justify-center items-center bg-blue-400">
                    <img class="h-[50px]" src="{{ asset('img/logo-branca.png') }}" alt="logomarca">
                </div>
                <div class="flex justify-center items-center gap-2 md:gap-4">
                    <div class="text-sm text-white block md:hidden bg-blue-400 w-8 h-8 flex justify-center items-center rounded-full">
                        {{ strstr(Auth::user()->name, ' ', true)[0] . trim(strstr(Auth::user()->name, ' ')[1]) }}
                    </div>
                    <div class="text-white text-sm hidden md:block">
                        {{ Auth::user()->name }}
                    </div>
                    <div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="block rounded-full"
                               href="route('logout')"
                               onclick="event.preventDefault();
                               this.closest('form').submit();">
                                <span class="text-2xl bg-gray-200 w-8 h-8 md:w-10 md:h-10 flex justify-center items-center rounded-full
                                focus:outline-none focus:bg-gray-300 hover:bg-gray-300 transition duration-150 ease-in-out">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </span>
                            </a>
                        </form>
                    </div>
                </div>
            </section>

            <main class="p-0 md:p-4">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
