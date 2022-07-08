jQuery(document).ready( function($){
	//custom kayremmie script
	
	
	/* contact form submission */
	$('#contactForm').on('submit', function(e){

		e.preventDefault();

		$('.is-invalid').removeClass('is-invalid');
		$('.show-feedback').removeClass('show-feedback');

		var form = $(this),
				name = form.find('#name').val(),
				email = form.find('#email').val(),
				message = form.find('#message').val(),
				ajaxurl = form.data('url');

		if( name === '' ){
			$('#name').parent('.form-group').addClass('is-invalid');
			return;
		}

		if( email === '' ){
			$('#email').parent('.form-group').addClass('is-invalid');
			return;
		}

		if( message === '' ){
			$('#message').parent('.form-group').addClass('is-invalid');
			return;
		}

		form.find('input, button, textarea').attr('disabled','disabled');
		$('.js-form-submission').addClass('show-feedback');

		$.ajax({
			
			url : ajaxurl,
			type : 'post',
			data : {
				
				name : name,
				email : email,
				message : message,
				action: 'save_user_contact_form'
				
			},
			error : function( response ){
				$('.js-form-submission').removeClass('show-feedback');
				$('.invalid-feedback ').addClass('show-feedback');
				form.find('input, button, textarea').removeAttr('disabled');
			},
			success : function( response ){
				if( response == 0 ){
					
					setTimeout(function(){
						$('.js-form-submission').removeClass('show-feedback');
						$('.invalid-feedback').addClass('show-feedback');
						form.find('input, button, textarea').removeAttr('disabled');
					},900);

				} else {
					
					setTimeout(function(){
						$('.js-form-submission').removeClass('show-feedback');
						$('.valid-feedback').addClass('show-feedback');
						form.find('input, button, textarea').removeAttr('disabled').val('');
					},900);

				}
			}
			
		});

	});

});














