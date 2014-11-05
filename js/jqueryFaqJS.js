$(document).ready(function() {

	$('#questions-toggle').click(function() {
		$('#toggle').toggle();
	});

	$('ul').click(function() {
		$(this).children('li:first').hide();	
	});

	$('li').css('cursor', 'images/openhand.jpg');

	});
		
