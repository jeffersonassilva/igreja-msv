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

    if (menuToggle) {
        menuToggle.onclick = function () {
            body.classList.toggle('overflow-hidden');
            navigation.classList.toggle('active');
            menuToggle.classList.toggle('active');
        }
    }

    //SLIDER
    const slides = document.querySelectorAll('.slides');
    const balls = document.querySelectorAll('.balls');
    let loopCarrossel;

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

    function carrosselImages() {
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
    }

    if (balls) {
        for (let ball of balls) {
            ball.addEventListener('click', function () {
                let id = ball.getAttribute('data-id');
                ActiveBolinha(id);
                ActiveSlide(id);
                clearInterval(loopCarrossel);
                loopCarrossel = setInterval(carrosselImages, 5500);
            });
        }
    }

    if (slides.length > 1) {
        loopCarrossel = setInterval(carrosselImages, 5500);
    }

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

    //BOTOES DA ORDENACAO DE LISTAS
    $('.btn-order').on('click', function () {
        const params = document.location.search;
        const searchParams = new URLSearchParams(params.toString());
        const field = $(this).attr('data-order-name');
        let sort = 'asc';

        if (searchParams.has('order')) {
            let order = searchParams.get('order');
            let arrOrder = order.split(':');
            sort = arrOrder[1] === 'desc' ? 'asc' : 'desc';
        }

        searchParams.set('order', field + ':' + sort);
        document.location.search = searchParams;
    });

    //BOTOES DO MODAL DE DIALOGO
    const targetEl = document.getElementById('dialog-confirm');
    if (targetEl) {
        $('.btn-dialog-open').on('click', function () {
            const formReference = $(this).attr('data-form-reference');
            $('#dialog-confirm').attr('data-form-reference', formReference).show();
        });

        $('.btn-dialog-close').on('click', function () {
            $('#dialog-confirm').removeAttr('data-form-reference').hide();
        });

        $('.btn-dialog-cancel').on('click', function () {
            $('#dialog-confirm').hide();
        });

        $('.btn-dialog-confirm').on('click', function () {
            const formId = $('#dialog-confirm').attr('data-form-reference');
            $('#' + 'submit-' + formId).submit();
        });
    }

    //Máscara nos campos de moeda
    $('.moeda').mask("#.##0,00", {reverse: true});

    //Função para adicionar o nome do arquivo selecionado em evidência no mobile
    $('[type=file]').change(function () {
        let i = $(this).prev('label').clone();
        let file = $(this)[0].files[0].name;
        $(this).prev('label').text(file);
    });
});
