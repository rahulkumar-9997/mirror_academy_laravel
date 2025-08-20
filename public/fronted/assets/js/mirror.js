$(document).ready(function () {
    var swiper = new Swiper(".bannerSlider", {
        spaceBetween: 0,
        effect: "slide",
        loop: true,
        speed: 1000,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".bannerSlider-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        $('.dexImg').remove()
    } else {
        $('.dexImg').show()
    }

    $(window).on('load', function () {
        var $container = $('.grid-services');
        $container.imagesLoaded(function () {
            $container.isotope({
                filter: '*'
            });
        });


        //   $('.portfolio_filter a').on('click', function() {
        // $('.portfolio_filter .active').removeClass('active');
        // $(this).addClass('active');
        // var selector = $(this).attr('data-filter');
        // $container.isotope({
        //     filter: selector,
        //     animationOptions: {
        // 	duration: 500,
        // 	animationEngine : "jquery"
        //     }
        // });
        // return false;
        //   });
    });
});