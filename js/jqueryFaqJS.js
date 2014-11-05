$(document).ready(function() {

	// Establish #disappear paragraph will receive the click-event
	$('.disappear').click(function(event) {

		// Prevent default action of link click
		event.preventDefault();

			// Toggle class on all dd's
			$('dd').toggleClass('invisible');
	});

	$('ul').each(function() {
		$(this).children().first().css('font-weight', 'bold');	
	});

	$('ul').click(function(event) {
		event.preventDefault();
			$(this).children().toggleClass().css('display', 'none');
	});

	});
		
