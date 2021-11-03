import '../scss/main.scss';
import 'intersection-observer';
import $ from 'jquery';
import 'bootstrap';
import 'popper.js';
import Swiper from 'swiper/dist/js/swiper.min';
import 'select2';
import IMask from "imask";

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
// Button to top
    (function() {
        const buttonToTop = $('#to-top');

        buttonToTop.on('click', function () {
            $('html, body').stop().animate({
                scrollTop: 0,
            }, 750);

            return false;
        });

        $(window).on('scroll', function (e) {
            let offsetTop = window.pageYOffset;

            if (offsetTop <= 1100) {
                buttonToTop.removeClass('show');
            }
            else {
                buttonToTop.addClass('show');
            }
        });
    })();

// Sandwich button
    (function() {
        const sandwich = document.querySelector('.menu-rails__sandwich');

        sandwich.addEventListener('click', function() {
            this.classList.toggle('opened');
            this.nextElementSibling.classList.toggle('active');
            document.body.classList.toggle('overflow-hidden');
        });
    })();

// IMask inputs
    (function() {
        const phoneInputs = document.querySelectorAll('.mask-phone');
        const cardNumber = document.querySelectorAll('.mask-card');
        const cardDate = document.querySelectorAll('.mask-card-date');

        if (phoneInputs.length) {
            phoneInputs.forEach(function (e, i) {
                const phone = IMask(e, {
                    mask: '+{38}(\\000)000-00-00',
                    lazy: true,
                    placeholderChar: '_',
                });
            });
        }

        if (cardNumber) {
            cardNumber.forEach(function (e, i) {
                const card = IMask(e, {
                    mask: '0000 0000 0000 0000',
                    lazy: true,
                    placeholderChar: 'X',
                });
            });
        }

        if (cardDate) {
            cardDate.forEach(function (e, i) {
                const card = IMask(e, {
                    mask: '00\\/00',
                    lazy: true,
                    placeholderChar: '0',
                });
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

        const faqToggler = $('.faq__box-header');

        faqToggler.on('click', function() {
            $(this).parent().toggleClass('active');
            $(this).next('.faq__box-body').stop().slideToggle(300);
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

// Step form
    (function() {
        const formNav = $('.briefing-form .briefing-form__control-btn');
        formNav.on('click', function(e) {
            e.preventDefault();
            const btn = e.target;

            if (e.target.classList.contains('briefing-form__control-btn_prev')) {
                if (btn.classList.contains('briefing-form__control-btn_prev') && btn.closest('.briefing-form__step').previousElementSibling.classList.contains('briefing-form__step')) {
                    btn.closest('.briefing-form__step').classList.remove('show');
                    btn.closest('.briefing-form__step').previousElementSibling.classList.add('show');
                }
                else {
                    return false;
                }
            }
            else if (btn.classList.contains('briefing-form__control-btn_next') && btn.closest('.briefing-form__step').nextElementSibling.classList.contains('briefing-form__step')) {
                if (btn.closest('.briefing-form__step').nextElementSibling.classList.contains('briefing-form__step')) {
                    btn.closest('.briefing-form__step').classList.remove('show');
                    btn.closest('.briefing-form__step').nextElementSibling.classList.add('show');
                }
                else {
                    return false;
                }
            }
        });
    })();

// File input listener
    (function() {
        const file = document.querySelectorAll('input[type="file"]');

        file.forEach((el, i) => {
            if (el.nextElementSibling.classList.contains('button-action__text')) {
                el.addEventListener('change', function() {
                    readFile(this);
                });
            }
        });

        function readFile(input) {
            let preview = input.nextElementSibling;

            console.log(preview);
            console.log(input);
            console.log(input.files);
            console.log(input.files[0]);
            console.log(input.files[0].name);
            // console.log(input.files[0].type.match(`image.*`));

            if (true) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    preview.innerText = input.files[0].name;
                }

                reader.readAsDataURL(input.files[0]);
            }
            else {
                preview.innerText(preview.data('error'));
            }
        }


        function readUrl(input) {
            let preview = $('#trademark_img_preview img');
            if (input.files[0].type.match(`image.*`)) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    preview.attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
            else {
                preview.attr('src', preview.data('error'));
            }
        }
    })();

// Lazy load observer
    (function () {
        /*const darkSection = document.querySelectorAll('.dark');
        let sectionObserve = new IntersectionObserver(function (elements) {
            elements.forEach(function (entry) {
                if (entry.intersectionRatio >= 0 && entry.isIntersecting) {
                    document.body.classList.add('dark');
                }
                else {
                    document.body.classList.remove('dark');
                }
            });
        });
        if (darkSection.length) {
            darkSection.forEach(function (section) {
                sectionObserve.observe(section);
            });
        }*/

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
    })();
});