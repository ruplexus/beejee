$(document).ready(function(){
	
	// выставляем минимальную высоту "body"
	$('body > main').css('min-height', $(window).outerHeight());
	
	$('#auth_login').click(function(){
		$('#error_view').hide();
	});
	
	$('#auth_password').click(function(){
		$('#error_view').hide();
	});
	
	$('#auth_submit').click(function(e){
		
		e.preventDefault();
		
		$('#auth_submit').prop('disabled', true);
		
		fields = r.check_fields({

			auth_login: {

				type: 'text',
				min_length: 4,
				error_text: 'Введено недопустимое количество символов!'

			},

			auth_password: {

				type: 'text',
				min_length: 1,
				error_text: 'Введено недопустимое количество символов!'

			}

		});

		if(fields.error === true){
			return false;
		}
		
		$.post('', { 
			
			form_auth: 'isset',
			
			form_auth_login: $('#auth_login').val(),
			form_auth_password: $('#auth_password').val(),
			
		}, function(data){
			
			if(data == '1'){
				location.href = '/';
			} else {
			
				$('#auth_submit').prop('disabled', false);
			
				$('#error_view').show();
				
			}
			
		});
		
		return false;
		
	});
	
});