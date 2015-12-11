$(document).ready(function(){





					var slider = $('#slider');

			$('nav').on('mouseenter','a',function(){

			  var box = $(this);
			  var p = box.position();
			  slider.animate({
			    width: box.outerWidth(),
			    left: p.left,
			  },250);
			});

			$('nav').on('mouseleave','a',function(){

			  slider.stop();
			});

			$('nav').on('mouseleave',function(){
			  $('#slider').animate({
			    width: 0,
			    left: 0,
			  },250);
			});

			$('.dropdown').click(function(e){
				e.preventDefault();
				$('.dropdown-menu').show();
			});



			 $('.autentificare').click(function(e){
    	e.preventDefault();

    	
    	$('.autentificareForm').slideDown();
    	$('.autform').focus();
        $('#overlay-bg').fadeIn();

    }); 

    $('.inregistrare').click(function(e){
        e.preventDefault();

        
        $('.inregistrareForm').slideDown();
        $('.inregform').focus();
        $('#overlay-bg').fadeIn();

    }); 

    $('#overlay-bg').click(function() {
        $('.autentificareForm').slideUp();
    	$('.inregistrareForm').slideUp();
    	$('#overlay-bg').fadeOut();
    });

        
    $('#RegisterSubmit').click(function(e){
        e.preventDefault();
        var form = $('.inregform'); 
        var username = $('#username').val();
            var password = $('#password').val();
            var email = $('#email').val();
         $.ajax({
            type: 'POST',
            url: '/inregistrare',
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
    });

    $('#LoginSubmit').click(function(e){
        e.preventDefault();
        var form = $('.autform');  
        var username = $('#usernamea').val();
            var password = $('#passworda').val();
         $.ajax({
            type: 'POST',
            url: '/autentificare',
            data: form.serialize(),
            dataType: 'json',
            timeout: 9000,
            success:function() {
                $('#usernamea').css('border-color','green','border-style','solid;');
                        $('#passworda').css('border-color','green','border-style','solid;');
                        $('#eausername').html('');
                        $('#eapassword').html('');
                        $('#formerror').html('');
               location.reload();           
           },
           error:function() {
                        if(username == '')
                        {
                            $('#usernamea').css('border-color','red','border-style','solid;');
                            $('#eausername').html('<span style="color:red;">Trebuie sa introduci un username</span>');
                        }
                        else if(username.length < 3)
                        {
                            $('#usernamea').css('border-color','red','border-style','solid;');
                            $('#eausername').html('<span style="color:red;">Campul username trebuie sa contina mai mult de 2 caractere</span>');
                        }

                        else 
                        {
                            $('#usernamea').css('border-color','red','border-style','solid;');
                            $('#passworda').css('border-color','red','border-style','solid;');
                            $('#eausername').html('');
                            $('#formerror').html('<span style="color:red;">Unul dintre campurile username sau parola este gresit! </span>');
                        }

                        if(password == '')
                        {
                            $('#passworda').css('border-color','red','border-style','solid;');
                            $('#eapassword').html('<span style="color:red;">Trebuie sa introduci o parola</span>');
                        }
                        else if(password.length < 5)
                        {
                            $('#passworda').css('border-color','red','border-style','solid;');
                            $('#eapassword').html('<span style="color:red;">Parola trebuie sa contina mai mult de 4 caractere</span>');
                        }
                        else 
                        {
                            
                            $('#passworda').css('border-color','default');
                            $('#eapassword').html('');
                        }
                   },
                   statusCode:{
                        403: function() {
                          $('#eausername').html('<span style="color:red;">Acest user a fost banat!</span>');
                                
                        }
                            }
        });

    });


});