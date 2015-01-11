jQuery(document).ready(function ($) {
    'use strict';

    $('.owl-carousel').owlCarousel({
        items:1,
        slideSpeed: 400,
        paginationSpeed: 400,
        navigation: true,
        navigationText : ["", ""],
        pagination: false,
        autoPlay: true,
        transitionStyle : "fade"
    });

    var imob = {

        //ScrollTop click button
        goTop: function () {
            $('.back-top').click(function(){
                $('html, body').animate({scrollTop : 0},800);
                return false;
            });
        }

    }
    imob.goTop();

    /* --------------------------------------------
     Ir para o topo
     -------------------------------------------- */
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.go-top').fadeIn(200);
        } else {
            $('.go-top').fadeOut(200);
        }
    });

    /* --------------------------------------------
     Adicionar ou remover classe(s) no menu
     -------------------------------------------- */
    $('.nav li a').first().addClass("active-menu");
    $('.nav li a').on('click', function () {
        $('.nav li a').removeClass("active-menu");
        $(this).addClass('active-menu');
    });


});





