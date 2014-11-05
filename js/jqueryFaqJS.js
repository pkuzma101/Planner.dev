$(document).ready(function() {

	$('#questions-toggle').click(function() {
		$('#toggle').fadeToggle();
	});

	$('ul').click(function() {
		$(this).children('li:first').fadeOut();	
	});

	});
		
