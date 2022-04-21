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
            grid-cols-[60px,1fr]
            grid-rows-[70px,1fr]
        ">
{{--            @include('layouts.navigation')--}}

{{--            <!-- Page Heading -->--}}
{{--            <header class="bg-white shadow">--}}
{{--                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                    {{ $header }}--}}
{{--                </div>--}}
{{--            </header>--}}

            <!-- Page Content -->
            <section class="bg-white border-r-[1px] row-start-1 row-end-3 flex flex-col items-center">
                <div class="h-[70px] w-full flex justify-center items-center p-3">
                    <img class="h-full" src="{{ asset('img/logo-vazada.png') }}" alt="logomarca">
                </div>
                <ul class="text-2xl mt-4 py-4 flex-1">
                    <li class="p-3 my-1 hover:bg-gray-100 rounded-md @if(request()->routeIs('dashboard')) bg-indigo-400 @endif">
                        <a class="flex @if(request()->routeIs('dashboard')) text-white @endif" href="{{ route('dashboard') }}">
                            <ion-icon name="grid-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="p-3 my-1 hover:bg-gray-100 rounded-md @if(request()->routeIs('home')) bg-indigo-400 @endif">
                        <a class="flex @if(request()->routeIs('home')) text-white @endif" href="{{ route('home') }}">
                            <ion-icon name="image-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="p-3 my-1 hover:bg-gray-100 rounded-md">
                        <a class="flex" href="{{ route('home') }}">
                            <ion-icon name="locate-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="p-3 my-1 hover:bg-gray-100 rounded-md">
                        <a class="flex" href="#">
                            <ion-icon name="calendar-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="p-3 my-1 hover:bg-gray-100 rounded-md">
                        <a class="flex" href="#">
                            <ion-icon name="person-outline"></ion-icon>
                        </a>
                    </li>
                </ul>
            </section>

            <section class="bg-white flex items-center justify-between px-4">
                <div>{{ $header }}</div>
                <div class="flex justify-center items-center gap-2 md:gap-4">
                    <div class="text-sm text-white block md:hidden bg-indigo-400 w-8 h-8 flex justify-center items-center rounded-full">
                        {{ strstr(Auth::user()->name, ' ', true)[0] . trim(strstr(Auth::user()->name, ' ')[1]) }}
                    </div>
                    <div class="text-sm hidden md:block">
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

            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
