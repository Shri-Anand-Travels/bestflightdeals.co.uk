import 'owl.carousel';

$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        nav: false,
        dots: false,
        lazyLoad: true,
        autoplay: false,
        rewind: false,
        dotsEach: true,
        center: window.innerWidth <= 768,
        loop: window.innerWidth <= 768,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1.15
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        }
    });
});
