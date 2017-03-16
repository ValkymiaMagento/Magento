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
});