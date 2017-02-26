// ==============================================
// Valkymmia
// ==============================================


$j(document).ready(function () {

	var $ancho = $j('.main-container');

	$j('#menu_mobile').mmenu();
    
    if(($ancho.innerWidth()+13)>=999)
    {
        
    }
    else
    {
        $j('#search_mini_form').prependTo('.mm-navbar');
    }

    // RESIZE PANTALLA
	$j(window).resize(function () {
	    if(($ancho.innerWidth()+13)>=999)
	    {
            $j('#search_mini_form').appendTo('#header-search');
	        
	    }
	    else
	    {
	        $j('#search_mini_form').prependTo('.mm-navbar');
	    }
	});


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