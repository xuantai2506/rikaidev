$(document).ready(function() {
    $('.slider_banner_home').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        arrows: false,
        autoplay: true,
        speed: 500,
        infinite: true,
        dots: false,
    });
    $('.slider_work').slick({
        slidesToShow: 5,
        slidesToScroll: 4,
        arrows: false,
        autoplay: false,
        speed: 300,
        infinite: true,
        dots: true,
        responsive: [{
                breakpoint: 1201,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 1001,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 801,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 601,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    $('.slider_whychoose').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        autoplay: true,
        speed: 300,
        infinite: true,
        dots: false,
        responsive: [{
                breakpoint: 1201,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 1001,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 801,
                settings: {
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 601,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });
    $('.slider_partner').slick({
        slidesToShow: 5,
        slidesToScroll: 4,
        arrows: false,
        autoplay: false,
        speed: 300,
        infinite: true,
        dots: true,
        responsive: [{
                breakpoint: 1201,
                settings: {
                    slidesToShow: 5,
                }
            },
            {
                breakpoint: 1001,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 801,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 601,
                settings: {
                    slidesToShow: 2
                }
            }
        ]
    });
});