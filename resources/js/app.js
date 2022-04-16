require('./bootstrap');

// SLIDER BANNER FLICKITY
// const Flickity = require('flickity');
// require('flickity-fade');
//
// new Flickity('.main-carousel', {
//     prevNextButtons: false,
//     wrapAround: true,
//     autoPlay: 5000,
//     lazyLoad: true,
//     fade: true,
// });

import { Fancybox } from "@fancyapps/ui";
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(document).ready(function () {
    let lastKnownScrollPosition = 0;
    let ticking = false;

    function toogleBtnScrolling(scrollPos) {
        if (scrollPos > 600) {
            $('.btn-scrolling').removeClass('hidden');
        } else {
            $('.btn-scrolling').addClass('hidden');
        }
    }

    document.addEventListener('scroll', function(e) {
        lastKnownScrollPosition = window.scrollY;
        if (!ticking) {
            window.requestAnimationFrame(function() {
                toogleBtnScrolling(lastKnownScrollPosition);
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
    const balls = document.querySelectorAll('.balls');
    let i = 0;

    function ActiveSlide(n) {
        for (let slide of slides) {
            slide.classList.remove('active');
            slides[n].classList.add('active');
        }
    }

    function ActiveBolinha(n) {
        for (let ball of balls) {
            ball.classList.remove('active');
            balls[n].classList.add('active');
        }
    }

    if (next) {
        next.addEventListener('click', function () {
            if (i == slides.length - 1) {
                i = 0;
            } else {
                i++;
            }
            ActiveSlide(i);
        });
    }

    if (prev) {
        prev.addEventListener('click', function () {
            if (i == 0) {
                i = slides.length - 1;
            } else {
                i--;
            }
            ActiveSlide(i);
        });
    }

    if (balls) {
        for (let ball of balls) {
            ball.addEventListener('click', function () {
                i = ball.getAttribute('data-id');
                ActiveBolinha(i);
                ActiveSlide(i);
            });
        }
    }

    // let timeoutID = setInterval(function(){
    //     console.log('teste');
    // }, 8000);

    let timeoutID = setInterval(function () {
        let list = document.querySelectorAll('.slides');
        let getIndex = 0;
        for (const [index, slide] of list.entries()) {
            if (slide.classList.contains('active')) {
                getIndex = index;
            }
        }
        if (getIndex === list.length - 1) {
            getIndex = 0;
        } else {
            getIndex++;
        }
        ActiveBolinha(getIndex);
        ActiveSlide(getIndex);
    }, 5000);

    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

        $('.link').on('click', function () {
            body.classList.remove('overflow-hidden');
            navigation.classList.remove('active');
            menuToggle.classList.remove('active');
        });

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "" && $(this.hash).length) {
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
