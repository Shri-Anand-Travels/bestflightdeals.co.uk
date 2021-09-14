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
                items: 1.25
            },
            600: {
                items: 2.5
            },
            1000: {
                items: 4
            }
        }
    });
});

$(function(){
    console.log('test');
    if(sessionStorage.getItem('hidePopup') === null){
        console.log('in condition');
        setTimeout(function(){
            $('#callUsPopup').modal('show');
            console.log('show');
        }, 3000);
    }

    $('#callUsPopup').on('hidden.bs.modal', function(e){
        sessionStorage.setItem('hidePopup', true);
    });

});
