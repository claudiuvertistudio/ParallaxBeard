jQuery(document).ready(function($) {

    /**
     * Make footer fixed perfectly
     */
	$( ".footer" ).css( "height", Math.floor( $( ".footer_parallax" ).outerHeight( true ) ) );
   	$(window).on("resize scroll",function(){
	    if( jQuery( window ).height() <= ( $( ".footer" ).outerHeight( true ) + $( ".sticky-navigation.appear-on-scroll" ).outerHeight( true ) ) || jQuery( window ).width() <= 1200 ){
	        $(".footer_parallax").removeAttr('style');
	    }else{
			var offsetFooter = $( ".footer" ).offset();
			$( '.footer_parallax' ).css( 'bottom', - ( ( $( this ).scrollTop() + jQuery( window ).height() ) - offsetFooter.top - $( ".footer" ).outerHeight( true ) - 15 ) ); //body border: 15px;
	    }
	}).trigger( 'resize scroll' );

	$(window).on('scroll', function() {

		if(!$('.appear-on-scroll').hasClass('scroll')) {
			//Add class for style
			$('.appear-on-scroll').addClass('scroll');

			//Append background
			$('.sticky-navigation').append('<div class="background_child"></div>').promise().done(function() {
				$('.sticky-navigation .background_child').css({'width': $(window).width(), 'opacity': '1'});
			});
		}

		if($(window).scrollTop() <= 0) {
			$('.appear-on-scroll').removeClass('scroll');
			$('.sticky-navigation .background_child').css({'width': '0px', 'opacity': '0'}).delay(200).promise().done(function() {
				$('.sticky-navigation .background_child').remove();
			});
		}
				
	});
});

