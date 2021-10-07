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

    // alert(window.innerWidth);
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
            let slider,
                sliderThumb;
            let stagesSliderNav = document.querySelector('.stages-slider-nav');
            let stagesSliderText = document.querySelector('.stages-slider-content');

            sliderThumb = new Swiper('.stages-slider-content', {
                observer: true,
                observeParents: true,
                spaceBetween: 1,
                slidesPerView: 1,
                autoHeight: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                allowTouchMove: false
            });

            slider = new Swiper('.stages-slider-nav', {
                observer: true,
                observeParents: true,
                slidesPerView: 1,
                autoHeight: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                thumbs: {
                    swiper: sliderThumb,
                },
                navigation: {
                    prevEl: stagesSliderNav.querySelector('.swiper-button-prev'),
                    nextEl: stagesSliderNav.querySelector('.swiper-button-next'),
                },
                pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                },
            });
        }
    })();

// FAQ
    (function() {
        const faqBox = $('.faq__box');

        faqBox.each((i, el) => {
            if ($(el).hasClass('active')) {
                $(el).find('.faq__box-body').slideDown()
            }
            else {
                $(el).find('.faq__box-body').slideUp()
            }
        });
        // faqBox.hasClass('active') ? faqBox.find('.faq__box-body').slideDown() : faqBox.find('.faq__box-body').slideUp();

        const faqToggler = $('.faq__box-header');

        faqToggler.on('click', function() {
            $(this).parent().toggleClass('active');
            $(this).next('.faq__box-body').stop().slideToggle(300);
        });
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
        if (imagesAll.length) {
            imagesAll.forEach(function (image) {
                imgObserve.observe(image);
            });
        }

        /*
        const darkness = document.querySelectorAll('.dark');
        let darkObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                console.log(entry);
                if (entry.intersectionRatio >= 0 && entry.target.classList.contains('dark')) {
                    console.log('test');
                }
            });
        });
        if (darkObserver.length) {
            darkness.forEach(function(dark) {
                console.log(dark);
                darkObserver.observe(dark);
            });
        }
         */
    })();
});