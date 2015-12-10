$(document).ready(function(){
		



		$('#modal-open-button-a').click(function(e){
		$('#modal-open-button-a').prop('disabled',true);
		$('#overlay-bg').fadeIn();
		$('#LoginForm').slideDown();
		$('#LoginForm').focus();
		
	});

	$('#modal-close-button-a').click(function(e){
		$('#modal-open-button-a').prop('disabled',false);
		$('#LoginForm').slideUp();
		$('#overlay-bg').fadeOut();
	});

	$('#overlay-bg').click(function(){
		
		$('#modal-open-button-a').prop('disabled',false);
		$('#LoginForm').slideUp();
		$('#overlay-bg').fadeOut();
	
	});	
		$('#LoginSubmit').click(function(d){
		d.preventDefault();
		var a=0;
		var form = $('#LoginForm');
		var test = 'John';
		var username = $('#usernamel').val();
		var password = $('#passwordl').val();
		
			$.ajax({
				type: 'POST',
				url: '/login_process',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				success:function(data) {
					if(test == 'John')
					{
						$('#usernamel').css('border-color','green','border-style','solid;');
						$('#passwordl').css('border-color','green','border-style','solid;');
						$('#erusername').html('');
						$('#erpassword').html('');
						$('#formerror').html('');
						
						$('html').load('/');
						
					}
				},
				error:function(data) {
					if(test == 'John')
					{
						if(username == '')
						{
							$('#usernamel').css('border-color','red','border-style','solid;');
							$('#erusername').html('<span style="color:red;">Trebuie sa introduci un username</span>');
						}
						else if(username.length < 3)
						{
							$('#usernamel').css('border-color','red','border-style','solid;');
							$('#erusername').html('<span style="color:red;">Campul username trebuie sa contina mai mult de 2 caractere</span>');
						}

						else 
						{
							$('#usernamel').css('border-color','red','border-style','solid;');
							$('#passwordl').css('border-color','red','border-style','solid;');
							$('#erusername').html('');
							$('#formerror').html('<span style="color:red;">Unul dintre campurile username sau parola este gresit! </span>');
						}

						if(password == '')
						{
							$('#passwordl').css('border-color','red','border-style','solid;');
							$('#erpassword').html('<span style="color:red;">Trebuie sa introduci o parola</span>');
						}
						else if(password.length < 5)
						{
							$('#passwordl').css('border-color','red','border-style','solid;');
							$('#erpassword').html('<span style="color:red;">Parola trebuie sa contina mai mult de 4 caractere</span>');
						}
						else 
						{
							
							$('#passwordl').css('border-color','default');
							$('#erpassword').html('');
						}


					}


				},
				statusCode:{
				403: function() {
			      $('#formerror').html('<span style="color:red;">Acest user a fost banat!</span>');
						
			    }
					}
		});
			
	});



});

