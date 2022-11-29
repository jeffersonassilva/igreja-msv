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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=41">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}?v=9" defer></script>
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

    <body class="bg-gray-100">
        <div id="container" class="w-full grid mx-auto md:h-[100vh] md:grid-cols-[5rem,1fr] lg:grid-cols-[14rem,1fr]">

            <aside id="adm__aside" class="hidden md:block fixed left-[-100%] md:relative bg-white w-[70%] max-w-[270px] md:w-[5rem] lg:w-auto min-h-full h-[100vh] z-30 shadow-md overflow-y-auto">
                <div class="flex justify-between items-center bg-gray-100 md:bg-white pl-6 py-6 md:py-6 md:pl-0 lg:p-6 h-[6rem]">
                    <div class="md:mx-auto">
                        <img class="w-2/3 md:hidden lg:block" src="{{ asset('img/logo-preta.png') }}" alt="logo">
                        <img class="h-12 hidden md:block lg:hidden" src="{{ asset('img/logo-vazada.png') }}" alt="logo">
                    </div>
                    <button class="md:hidden cursor-pointer text-3xl flex justify-center items-center p-3" id="aside__close-btn">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>

                <x-adm-menu></x-adm-menu>
            </aside>

            <main class="md:overflow-y-auto md:px-6 md:py-2">
                <section class="fixed w-full h-[65px] z-20 md:relative flex justify-between items-center bg-white md:bg-transparent shadow-sm md:shadow-none mb-4 px-4 md:px-0 border-b">
                    <button id="adm__menu-btn" class="text-3xl flex items-center md:hidden">
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>
                    <h2 class="font-thin text-xl md:text-2xl text-gray-500">
                        {{ $header ?? '' }}
                    </h2>
                    <div class="adm__profile flex items-center gap-2">
                        <div class="info hidden md:block">
                            <span class="font-thin">Olá, <b>{{ Auth::user()->name }}</b></span>!
                        </div>
                        <div class="md:hidden text-sm text-white block bg-blue-400 w-8 h-8 flex justify-center items-center rounded-full">
                            {{ strstr(Auth::user()->name, ' ', true)[0] . trim(strstr(Auth::user()->name, ' ')[1]) }}
                        </div>
                    </div>
                </section>
                <section class="mt-16 md:mt-0 p-4 md:p-0">
                    @if (session('message'))
                        <div id="message_alert" class="bg-green-200 p-4 mb-4 rounded-md flex justify-between items-center">
                            <span class="text-gray-700">
                                {{ session('message') }}
                            </span>
                            <span class="text-2xl flex items-center cursor-pointer" id="close-message-btn">
                                <ion-icon name="close-outline"></ion-icon>
                            </span>
                        </div>
                    @endif

                    {{ $slot }}
                </section>
            </main>
        </div>
    </body>

    <style>
        #adm__aside {
            animation: showMenu 400ms ease forwards;
        }
        @keyframes showMenu {
            to {
                left: 0;
            }
        }
        #adm__aside .sidebar a ion-icon {
            font-size: 1.4rem;
        }
        #adm__aside .sidebar a.active {
            color: #3b82f6;
        }
    </style>

    <script type="text/javascript">
        const sideMenu = document.querySelector("aside");
        const menuBtn = document.querySelector("#adm__menu-btn");
        const closeBtn = document.querySelector("#aside__close-btn");
        const closeMessageBtn = document.querySelector("#close-message-btn");
        const messageAlert = document.querySelector("#message_alert");

        if (menuBtn) {
            menuBtn.addEventListener('click', () => {
                sideMenu.style.display = 'block';
            });
        }

        if (closeBtn) {
            closeBtn.addEventListener('click', () => {
                sideMenu.style.display = 'none';
            });
        }

        if (closeMessageBtn) {
            closeMessageBtn.addEventListener('click', () => {
                messageAlert.style.display = 'none';
            });
        }
    </script>
</html>
