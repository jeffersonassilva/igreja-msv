<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@100;300;400;500;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}?v=97">

        <!-- Scripts -->
        <script>
            let theme = localStorage.getItem("msv:web-theme");
            if (theme === "dark") {
                document.documentElement.classList.add("dark");
            }
        </script>
        <script src="{{ asset('js/app.js') }}?v=12" defer></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

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

    <body class="bg-gray-100 dark:bg-[#1c2039]">
        <div id="container" class="w-full grid mx-auto md:h-[100vh] lg:grid-cols-[17rem,1fr]">

            <aside id="adm__aside" class="hidden lg:block fixed left-[-100%] lg:relative bg-white w-[70%] max-w-[280px]
                    lg:max-w-full lg:w-auto min-h-full h-[100vh] z-30 shadow-md overflow-y-auto dark:bg-[#252c47]">
                <div class="flex justify-between items-center bg-gray-100 lg:bg-white dark:bg-[#252c47]">
                    <div class="flex justify-center py-6">
                        <img class="w-2/3 lg:w-3/6"
                             src="{{ asset('img/logo-branca.png') }}"
                             alt="logo"
                             id="sidenav-logo">
                    </div>
                    <button class="lg:hidden cursor-pointer text-3xl flex justify-center items-center
                                   p-3 text-gray-800 dark:text-[#d0d9e6]" id="aside__close-btn">
                        <ion-icon name="close-outline"></ion-icon>
                    </button>
                </div>

                <x-adm-menu></x-adm-menu>
            </aside>

            <main class="lg:overflow-y-auto lg:px-6 lg:py-2">
                <section class="fixed w-full h-16 z-20 lg:relative flex justify-between items-center bg-white
                        lg:bg-transparent shadow-sm lg:shadow-none mb-4 px-4 lg:px-0 border-b
                        dark:border-[#263141] dark:bg-[#252c47] lg:dark:bg-[#1c2039]">
                    <button id="adm__menu-btn"
                            class="text-3xl flex items-center lg:hidden text-gray-800 dark:text-[#d0d9e6]">
                        <ion-icon name="menu-outline"></ion-icon>
                    </button>
                    <h2 class="font-thin text-base sm:text-xl md:text-2xl text-gray-500 dark:text-[#d0d9e6]">
                        {{ $header ?? '' }}
                    </h2>
                    <div class="adm__profile flex items-center gap-1 md:gap-2 lg:gap-4">
                        <div class="info hidden lg:block dark:text-[#d0d9e6]">
                            <span class="font-thin">Olá, <b>{{ Auth::user()->name }}</b></span>!
                        </div>
                        <div class="lg:hidden text-sm text-white bg-blue-400 dark:bg-[#51596b]
                                    w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 flex justify-center items-center rounded-full">
                            {{ strstr(Auth::user()->name, ' ', true)[0] . trim(strstr(Auth::user()->name, ' ')[1]) }}
                        </div>
                        <div class="hidden lg:block text-gray-800 dark:text-[#d0d9e6]">|</div>
                        <div>
                            <button onclick="toggleTheme()"
                                    class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 lg:w-6 lg:h-6
                                           flex justify-center items-center text-4xl text-gray-800 dark:text-[#d0d9e6]">
                                <ion-icon name="contrast-outline"></ion-icon>
                            </button>
                        </div>
                    </div>
                </section>
                <section class="mt-12 lg:mt-0 p-4 lg:p-0">
                    <x-alert class="my-4" />
                    <x-required-fields />
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
    </style>

    <script type="text/javascript">
        const sideMenu = document.querySelector("aside");
        const menuBtn = document.querySelector("#adm__menu-btn");
        const closeBtn = document.querySelector("#aside__close-btn");

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

        /**
         * Função responsável por abrir e fechar submenus na área administrativa
         * @param event
         * @param id
         */
        function toggleSubmenu(event, id) {
            event.preventDefault();
            let submenu = document.getElementById(id);
            submenu.classList.toggle('hidden');
        }

        /**
         * Função responsável por trocar a imagem da logo sidenav
         * @param src
         */
        function trocarLogoSideNav(src) {
            let logoImage = document.getElementById("sidenav-logo");
            logoImage.src = src;
        }

        /**
         * Função responsável por trocar o tema do site
         */
        function toggleTheme() {
            let htmlTag = document.documentElement;
            htmlTag.classList.toggle("dark");

            let isDarkMode = htmlTag.classList.contains("dark");

            if (isDarkMode) {
                localStorage.setItem("msv:web-theme", "dark");
                trocarLogoSideNav("{{ asset('img/logo-branca.png') }}");
            } else {
                localStorage.setItem("msv:web-theme", "light");
                trocarLogoSideNav("{{ asset('img/logo-preta.png') }}");
            }
        }

        /**
         * Verificar a preferência do usuário ao carregar a página
         */
        window.addEventListener("DOMContentLoaded", function() {
            let theme = localStorage.getItem("msv:web-theme");
            if (theme !== "dark") {
                trocarLogoSideNav("{{ asset('img/logo-preta.png') }}");
            }
        });
    </script>
</html>
