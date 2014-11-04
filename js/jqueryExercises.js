$(document).ready(function() {
	$('h1').click(function() {
		$('h1').css('background-color', 'red');
	});

	$('p').dblclick(function() {
		$(this).css('font-size', '18px');
	});

	$('li').hover(
			function() {
				$(this).css('color', 'red');
			},
			function() {
				$(this).css('color', 'black');
			}
			);
});


