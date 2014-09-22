function login() {	
	var username = $('#username').val();
	var password = $('#password').val();
	var callurl = '/ajax/user/login';
	$.ajax({
		type: 'POST',
		url: callurl,
		data: {
			username: username,
			password: password
		},
		success: function() {
			location.href = "/user";
		}
	});
}
