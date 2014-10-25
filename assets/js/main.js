jQuery(document).ready(function ($) {
    'use strict';

    var imob = {

        adjustWideProperty: function () {
            $(".list-property").find(".property:nth-of-type(4n)").addClass("first-item");
        }

    }

    imob.adjustWideProperty();
    

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

    $('.go-top').click(function (event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 1000);
    });

    /* --------------------------------------------
     Animação de ancora do menu
     -------------------------------------------- */
    $('.main-logo, .nav li a,.arrow-down-home').click(function () {
        var alvo = $(this).attr('href').split('#').pop();
        $('html, body').animate({scrollTop: $('#' + alvo).offset().top}, 500);
        return false;
    });

    /* --------------------------------------------
     Adivionar ou remover classe(s) no menu
     -------------------------------------------- */
    $('.nav li a').first().addClass("active-menu");
    $('.nav li a').on('click', function () {
        $('.nav li a').removeClass("active-menu");
        $(this).addClass('active-menu');
    });


});





