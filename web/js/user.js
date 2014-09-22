function translate() {
	var tokens = [];
	$("lng").each(function() {
		tokens.push($(this).html());
		//console.log(index + ": " + $(this).html());
	});
	
	var callurl = '/ajax/language/translate';
	$.ajax({
		type: 'POST',
		url: callurl,
		data: {
			tokens: tokens
		},
		success: function(data) {
			$("lng").each(function() {
				$(this).replaceWith(data.translations[$(this).html()]);
			});
		}
	});
}

$(function() {
	$("token").each(function( index ) {
		console.log(index + ": " + $(this).html());
	});
	
	translate();
});
