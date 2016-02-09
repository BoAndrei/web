$(document).ready(function(){
	
	$('#overlay-bg').click(function(){
		
		$('#modal-open-button-i').prop('disabled',false);
		$('#RegisterForm').slideUp();
		$('#overlay-bg').fadeOut();
		$('#RegisterForm')[0].reset();
		$('#eusername').html('');
		$('#epassword').html('');
		$('#eemail').html('');
		$('#username').removeAttr( 'style' );
		$('#password').removeAttr( 'style' );
		$('#email').removeAttr( 'style' );
	
	});	


	
	$('#RegisterSubmit').click(function(e){
		e.preventDefault();
		var form = $('#RegisterForm');
		var testt = 'John'
		var valid = '';
			var username = $('#username').val();
			var password = $('#password').val();
			var email = $('#email').val();
			var k = 0;
			$.ajax({
				type: 'POST',
				url: '/register_process',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				success:function() {
               location.reload();           
           },
           error:function() {
            
                   
                         if(username == '')
                        {
                            $('#username').css('border-color','red','border-style','solid;');
                            $('#erusername').html('<span style="color:red;">Trebuie sa introduci un username</span>');
                        }

                        else if(username.length < 3)
                        {
                            $('#username').css('border-color','red','border-style','solid;');
                            $('#erusername').html('<span style="color:red;">Campul username trebuie sa contina mai mult de 2 caractere</span>');
                        }

                        else 
                        {
                          
                            $('#username').css('border-color','green','border-style','solid;');
                            $('#erusername').html('');
                        }

                        if(password == '')
                        {
                            $('#password').css('border-color','red','border-style','solid;');
                            $('#erpassword').html('<span style="color:red;">Trebuie sa introduci o parola</span>');
                        }

                        else if(password.length < 5)
                        {
                            $('#password').css('border-color','red','border-style','solid;');
                            $('#erpassword').html('<span style="color:red;">Parola trebuie sa contina mai mult de 4 caractere</span>');
                        }

                        else 
                        {
                           
                            $('#password').css('border-color','green','border-style','solid;');;
                            $('#erpassword').html('');
                        }

                         if(email == '' || email.indexOf('@')==-1 || email.indexOf('.')==-1)
                        {
                            $('#email').css('border-color','red','border-style','solid;');
                            $('#eremail').html('<span style="color:red;">Trebuie sa introduci un email valid</span>');
                        }

                        else
                        {
                            
                            $('#email').css('border-color','green','border-style','solid;');
                            $('#eremail').html('');
                        }
 
                },
                statusCode:{
                404: function() {
                  $('#username').css('border-color','red','border-style','solid;');
                            $('#erusername').html('<span style="color:red;">Acest username deja a fost luat</span>');    
                },
                405: function() {
                  $('#email').css('border-color','red','border-style','solid;');
                            $('#eremail').html('<span style="color:red;">Acest email deja a fost luat</span>');  
                },
                406: function() {
                  $('#username').css('border-color','red','border-style','solid;');
                            $('#erusername').html('<span style="color:red;">Acest username deja a fost luat</span>');    
                  $('#email').css('border-color','red','border-style','solid;');
                            $('#eremail').html('<span style="color:red;">Acest email deja a fost luat</span>');  
                },
                400: function() {
                  $('#email').css('border-color','red','border-style','solid;');
                            $('#eremail').html('<span style="color:red;">Trebuie sa introduci un email valid</span>');  
                }
                    
                    }
				
				
			});
			
			

		

			//$('#RegisterForm')[0].reset();
		
	});
});