// ==============================================
// Valkymmia
// ==============================================


jQuery(document).ready(function () {

	var $ancho = jQuery('.main-container');

    jQuery('#menu_mobile').mmenu();

    jQuery('#header-search-mobile').prependTo('.mm-navbar');




	// MOVER CARRITO HOME
    var $horizontal = jQuery('#carrito');
    jQuery(window).scroll(function () {
        var s = jQuery(this).scrollTop(),
            d = jQuery(document).height(),
            c = jQuery(this).height();

        scrollPercent = (s / (d - c));

        var position = (scrollPercent * (jQuery('.envios-home').width() - $horizontal.width()));

        $horizontal.css({
            'left': position
        });
    });

    jQuery('.img-valky').insertAfter('header#header');


    // PREGUNTAS FRECUENTES
    var linkFaq = jQuery('.preguntas-frecuentes .pregunta h3');

    linkFaq.click(function () {
        linkFaq.not(this).removeClass('active');

        jQuery('.preguntas-frecuentes .pregunta .info').slideUp();

        var faqInfo = jQuery(this).parent().find('> .info');

        if(faqInfo.is(':visible')) {
            faqInfo.slideUp();
        } else{
            faqInfo.slideDown();
        }

        var h3Active = jQuery(this).parent().find('h3');

        if(h3Active.hasClass('active')) {
            jQuery(this).removeClass('active');
        } else{
            jQuery(this).addClass('active');
        }
    });



});