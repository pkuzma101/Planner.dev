$(document).ready(function() {

	$('#questions-toggle').click(function() {
		$('#toggle').slideToggle();
	});

	$('ul').click(function() {
		$(this).children('li:first').slideToggle();	
	});

	});
		
