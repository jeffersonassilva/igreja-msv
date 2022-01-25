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
    </head>
    <body>
        <section class="main">
            @include('includes/header')

            <div class="content">
                @yield('content')
            </div>

            <div class="indicator">
                <a href="#fotos">
                    <ion-icon name="arrow-down-outline"></ion-icon>
                </a>
            </div>
        </section>

        @include('includes.fotos')
        @include('includes.footer')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                let lastKnownScrollPosition = 0;
                let ticking = false;

                function doSomething(scrollPos) {
                    if (scrollPos > 0) {
                        $('.indicator').hide();
                    } else {
                        $('.indicator').show();
                    }
                }

                document.addEventListener('scroll', function(e) {
                    lastKnownScrollPosition = window.scrollY;

                    if (!ticking) {
                        window.requestAnimationFrame(function() {
                            doSomething(lastKnownScrollPosition);
                            ticking = false;
                        });

                        ticking = true;
                    }
                });

                //TOGGLE MENU
                const navigation = document.querySelector('.navigation');
                const menuToggle = document.querySelector('.toggle');
                const body = document.querySelector('body');
                menuToggle.onclick = function () {
                    body.classList.toggle('overflow-hidden');
                    navigation.classList.toggle('active');
                    menuToggle.classList.toggle('active');
                }

                //SLIDER
                const slides = document.querySelectorAll('.slides');
                const prev = document.querySelector('.prev');
                const next = document.querySelector('.next');
                i = 0;

                function ActiveSlide(n) {
                    for (slide of slides) {
                        slide.classList.remove('active');
                        slides[n].classList.add('active');
                    }
                }

                next.addEventListener('click', function () {
                    if (i == slides.length - 1) {
                        i = 0;
                    } else {
                        i++;
                    }
                    ActiveSlide(i);
                });

                prev.addEventListener('click', function () {
                    if (i == 0) {
                        i = slides.length - 1;
                    } else {
                        i--;
                    }
                    ActiveSlide(i);
                });

                // Add smooth scrolling to all links
                $("a").on('click', function(event) {

                    $('.link').on('click', function () {
                        body.classList.remove('overflow-hidden');
                        navigation.classList.remove('active');
                        menuToggle.classList.remove('active');
                    });

                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {
                        // Prevent default anchor click behavior
                        event.preventDefault();

                        // Store hash
                        var hash = this.hash;

                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 800, function(){

                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        });
                    } // End if
                });
            });
        </script>
    </body>
</html>
