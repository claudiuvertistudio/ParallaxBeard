jQuery(document).ready(function($) {

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

