import '../scss/main.scss';
import 'intersection-observer';
import $ from 'jquery';
import 'bootstrap';
import 'popper.js';
import Swiper from 'swiper/dist/js/swiper.min';
import 'select2';

$(window).on('load', function () {
    let b = $('body');

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        b.addClass('ios');
    } else {
        b.addClass('web');
    }

    b.removeClass('loaded');
});

$(function () {
// Sandwich button
    (function() {
        const sandwich = document.querySelector('.menu-rails__sandwich');

        sandwich.addEventListener('click', function() {
            this.classList.toggle('opened');
            this.nextElementSibling.classList.toggle('active');
            document.body.classList.toggle('overflow-hidden');
        });
    })();

// Select2
    (function() {
        let selectStyled = $('.select2');

        selectStyled.select2({
            minimumResultsForSearch: Infinity,
        });
    })();

// Swiper slider
    (function() {
        let defaultSlider = $('.swiper');
        let stagesSliderWrap = $('.stages-slider-wrapper');

        if (defaultSlider.length) {
            let slider;
            let slide = document.querySelectorAll('.swiper-container .swiper-slide').length;

            if (slide > 1) {
                slider = new Swiper('.swiper', {
                    observer: true,
                    observeParents: true,
                    loop: true,
                    autoplay: true,
                    spaceBetween: 25,
                    slidesPerView: 'auto',
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        type: "fraction",
                    },
                    dynamicBullets: true,
                });
            }
        }

        if (stagesSliderWrap.length) {
            let stagesSliderNav = document.querySelector('.stages-slider-nav');
            let stagesSliderText = document.querySelector('.stages-slider-content');

            let contentSlider = new Swiper('.stages-slider-content', {
                // observer: true,
                // observeParents: true,
                loop: true,
                slidesPerView: 1,
            });

            let mainSlider = new Swiper('.stages-slider-nav', {
                // observer: true,
                // observeParents: true,
                loop: true,
                slidesPerView: 1,
                watchSlidesProgress: true,
                navigation: {
                    prevEl: stagesSliderNav.querySelector('.swiper-button-prev'),
                    nextEl: stagesSliderNav.querySelector('.swiper-button-next'),
                },
                pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                },
                thumb: {
                    swiper: contentSlider,
                },
            });

            /*let stagesSliderNav = document.querySelector('.stages-slider-nav');
            let stagesSliderText = document.querySelector('.stages-slider');

            let sliderNav = new Swiper('.stages-slider-nav', {
                loop: true,
                slidesPerView: 1,
                watchSlidesProgress: true,
                navigation: {
                    nextEl: stagesSliderNav.querySelector('.swiper-button-next'),
                    prevEl: stagesSliderNav.querySelector('.swiper-button-prev'),
                },
                pagination: {
                    el: stagesSliderNav.querySelector('.swiper-pagination'),
                    type: "fraction",
                },
            });

            let sliderContent = new Swiper('.stages-slider', {
                loop: true,
                slidesPerView: 1,
                allowTouchMove: false,
                thumbs: {
                    swiper: sliderNav,
                },
            });

            console.log(sliderNav);
            console.log(sliderContent);*/
        }
    })();

// Lazy load observer
    (function () {
        const imagesAll = document.querySelectorAll('img[data-src]');
        let imgObserve = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.intersectionRatio >= 0 && entry.target.hasAttribute('data-src')) {
                    let current = entry.target;
                    let source = current.getAttribute('data-src');

                    current.setAttribute('src', source);
                    current.removeAttribute('data-src');
                }
            });
        });
        if (imagesAll.length > 0) {
            imagesAll.forEach(function (image) {
                imgObserve.observe(image);
            });
        }
    })();
});