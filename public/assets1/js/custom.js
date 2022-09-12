
/*---- animation ----*/
wow = new WOW(
);
wow.init();


$(window).scroll(function () {
    var window_top = $(window).scrollTop() + 1;
    if (window_top > 100) {
        $('.menu-items-wrapper').addClass('menu-fixed animated fadeInDown');
    } else {
        $('.menu-items-wrapper').removeClass('menu-fixed animated fadeInDown');
    }
});


// index1 memnu





// Preloader 
jQuery(window).on('load', function () {
    jQuery("#status").fadeOut();
    jQuery("#preloader").delay(450).fadeOut("slow");
});



// ===== Scroll to Top ==== //
$(window).scroll(function () {
    if ($(this).scrollTop() >= 100) {
        $('#return-to-top').fadeIn(200);
    } else {
        $('#return-to-top').fadeOut(200);
    }
});
$('#return-to-top').click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 500);
});



$(document).ready(function () {
    $(".menu-click2").click(function () {
        $(".menu-open2").slideToggle();
    });
    $('body').on('click', function (e) {
        if (!$('.menu-click2').is(e.target)
            && $('.menu-click2').has(e.target).length === 0
            && $('.open').has(e.target).length === 0
        ) {
            $('.menu-open2').slideUp();
        }
    });
});

$(document).ready(function () {
    $(".menu-click1").click(function () {
        $(".menu-open1").slideToggle();
    });
    $('body').on('click', function (e) {
        if (!$('.menu-click1').is(e.target)
            && $('.menu-click1').has(e.target).length === 0
            && $('.open').has(e.target).length === 0
        ) {
            $('.menu-open1').slideUp();
        }
    });
});

$(document).ready(function () {
    $(".menu-click3").click(function () {
        $(".menu-open3").slideToggle();
    });
    $('body').on('click', function (e) {
        if (!$('.menu-click3').is(e.target)
            && $('.menu-click3').has(e.target).length === 0
            && $('.open').has(e.target).length === 0
        ) {
            $('.menu-open3').slideUp();
        }
    });
});


$(document).ready(function () {
    $(".menu-click4").click(function () {
        $(".menu-open4").slideToggle();
    });
    $('body').on('click', function (e) {
        if (!$('.menu-click4').is(e.target)
            && $('.menu-click4').has(e.target).length === 0
            && $('.open').has(e.target).length === 0
        ) {
            $('.menu-open4').slideUp();
        }
    });
});




// responsive sab menu
(function ($) {
    $(document).ready(function () {

        $('#cssmenu li.active').addClass('open').children('ul').show();
        $('#cssmenu li.has-sub>a').on('click', function () {
            $(this).removeAttr('href');
            var element = $(this).parent('li');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('li').removeClass('open');
                element.find('ul').slideUp(200);
            }
            else {
                element.addClass('open');
                element.children('ul').slideDown(200);
                element.siblings('li').children('ul').slideUp(200);
                element.siblings('li').removeClass('open');
                element.siblings('li').find('li').removeClass('open');
                element.siblings('li').find('ul').slideUp(200);
            }
        });

    });
})(jQuery);
// menu fixed


// toggle cross btn js
$(".toggle-main-wrapper , #toggle_close").on("click", function () {
    $("#sidebar").toggleClass("open")
});

$('.main-slider .owl-carousel').owlCarousel({
    loop: true,
    margin: 0,
    nav: true,
    dots: true,
    autoplay: true,
    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
    smartSpeed: 1200,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        991: {
            items: 1
        },
        992: {
            items: 1
        },
        1366: {
            items: 1
        }

    }
});

$('.modern-slider .owl-carousel').owlCarousel({
    loop: true,
    // animateOut: 'slideOutDown',
    // animateIn: 'flipInX',
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    margin: 20,
    nav: false,
    dots: true,
    autoplay: true,
    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
    smartSpeed: 1200,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        911: {
            items: 1
        },
        1300: {
            items: 1
            
        }

    }
});


$('.index-main-slider .owl-carousel').owlCarousel({
    loop: true,
    // animateOut: 'slideOutDown',
    // animateIn: 'flipInX',
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    margin: 20,
    nav: false,
    dots: true,
    autoplay: true,
    navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
    smartSpeed: 1200,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        911: {
            items: 1
        },
        1300: {
            items: 1
            
        }

    }
});





$('.testimonial-slider .owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    center:true,
    nav: true,
    navText:['<svg width="34" height="23" viewBox="0 0 34 23"><path fill-rule="evenodd" clip-rule="evenodd" d="M33.8691 11.4328C33.8691 11.119 33.7446 10.8181 33.5228 10.5962C33.301 10.3743 33.0003 10.2497 32.6867 10.2497L4.79696 10.2497L12.2394 2.80572C12.4615 2.58357 12.5862 2.28226 12.5862 1.96809C12.5862 1.65392 12.4615 1.35262 12.2394 1.13047C12.0174 0.908318 11.7162 0.783515 11.4022 0.783515C11.0882 0.783515 10.7871 0.908318 10.565 1.13047L1.10529 10.5951C0.99517 10.705 0.907804 10.8356 0.848192 10.9793C0.78858 11.1231 0.757896 11.2772 0.757896 11.4328C0.757896 11.5884 0.78858 11.7425 0.848192 11.8862C0.907804 12.0299 0.99517 12.1605 1.10529 12.2704L10.565 21.7351C10.7871 21.9572 11.0882 22.082 11.4022 22.082C11.7162 22.082 12.0174 21.9572 12.2394 21.7351C12.4615 21.5129 12.5862 21.2116 12.5862 20.8975C12.5862 20.5833 12.4615 20.282 12.2394 20.0598L4.79696 12.6159L32.6867 12.6159C33.0003 12.6159 33.301 12.4912 33.5228 12.2693C33.7446 12.0475 33.8691 11.7465 33.8691 11.4328V11.4328Z" fill="#111111"/></svg>','<svg width="34" height="23" viewBox="0 0 34 23"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.595703 11.4289C0.595703 11.1151 0.720284 10.8142 0.94204 10.5923C1.1638 10.3704 1.46456 10.2458 1.77817 10.2458L29.6679 10.2458L22.2254 2.80181C22.0034 2.57966 21.8787 2.27836 21.8787 1.96419C21.8787 1.65002 22.0034 1.34872 22.2254 1.12656C22.4475 0.904412 22.7486 0.779609 23.0626 0.779609C23.3766 0.779609 23.6778 0.904412 23.8998 1.12656L33.3596 10.5912C33.4697 10.7011 33.557 10.8317 33.6167 10.9754C33.6763 11.1192 33.7069 11.2732 33.7069 11.4289C33.7069 11.5845 33.6763 11.7386 33.6167 11.8823C33.557 12.026 33.4697 12.1566 33.3596 12.2665L23.8998 21.7312C23.6778 21.9533 23.3766 22.0781 23.0626 22.0781C22.7486 22.0781 22.4475 21.9533 22.2254 21.7312C22.0034 21.509 21.8787 21.2077 21.8787 20.8935C21.8787 20.5794 22.0034 20.2781 22.2254 20.0559L29.6679 12.612L1.77817 12.612C1.46456 12.612 1.1638 12.4873 0.94204 12.2654C0.720284 12.0436 0.595703 11.7426 0.595703 11.4289Z" fill="#111111"/></svg>'],
    dots: false,
    autoplay: true,
    smartSpeed: 1200,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        911: {
            items: 2
        },
        1300: {
            items: 3
        }

    }
});


$('.categories-slider .owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    dots: true,
    nav: false,

    autoplay: true,
    smartSpeed: 1200,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        911: {
            items: 2
        },
        1300: {
            items: 4
        }


    }
});


$('.core-value-slider .owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    dots: true,
    nav: false,

    autoplay: true,
    smartSpeed: 1200,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        911: {
            items: 2
        },
        1300: {
            items: 3
        }


    }
});




$('.client-slider .owl-carousel').owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    dots: false,
    autoplay: true,
    smartSpeed: 1200,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        911: {
            items: 3
        },
        1300: {
            items: 5
        }
    }
});




// side toggle

$(document).ready(function () {
    $(".cart-toggle , .cart-close").click(function () {
        $("#cart-sidebar").toggleClass("open")
    });
});

// vedio popupe


    // $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    //     type: 'iframe',
    //     mainClass: 'mfp-fade',
    //     removalDelay: 160,
    //     preloader: false,
    //     fixedContentPos: false
    // });
    // $('.image-popup-vertical-fit').magnificPopup({
    //     type: 'image',
    //     closeOnContentClick: true,
    //     mainClass: 'mfp-img-mobile',
    //     image: {
    //         verticalFit: true
    //     }
    // });




