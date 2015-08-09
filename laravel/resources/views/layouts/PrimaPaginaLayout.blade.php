<!DOCTYPE HTML>
<html>

<head>
@include ('js')
<script type="text/javascript">
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
				}
					
		});
			
	});
});

</script>
<script type="text/javascript">

$(document).ready(function(){
	$('#modal-open-button-i').click(function(e){
		$('#modal-open-button-i').prop('disabled',true);
		$('#RegisterForm').slideDown();
		$('#RegisterForm').focus();
		$('#overlay-bg').fadeIn();
	});

	$('#modal-close-button-i').click(function(e){
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
				error:function() {
					if(testt == 'John')
					{
						if(username != '' && username.length > 3)
						{
							$('#username').css('border-color','red','border-style','solid;');
							$('#eusername').html('<span style="color:red;">Acest username este deja luat</span>');
						}

						else if(username == '')
						{
							$('#username').css('border-color','red','border-style','solid;');
							$('#eusername').html('<span style="color:red;">Trebuie sa introduci un username</span>');
						}

						else if(username.length < 3)
						{
							$('#username').css('border-color','red','border-style','solid;');
							$('#eusername').html('<span style="color:red;">Campul username trebuie sa contina mai mult de 2 caractere</span>');
						}

						else 
						{
							k++;
							$('#username').css('border-color','green','border-style','solid;');
							$('#eusername').html('');
						}

						if(password == '')
						{
							$('#password').css('border-color','red','border-style','solid;');
							$('#epassword').html('<span style="color:red;">Trebuie sa introduci o parola</span>');
						}

						else if(password.length < 5)
						{
							$('#password').css('border-color','red','border-style','solid;');
							$('#epassword').html('<span style="color:red;">Parola trebuie sa contina mai mult de 4 caractere</span>');
						}

						else 
						{
							k++;
							$('#password').css('border-color','green','border-style','solid;');;
							$('#epassword').html('');
						}

						if(email != '' && email.indexOf('@') !=-1 && email.indexOf('.') !=-1)
						{
							$('#email').css('border-color','red','border-style','solid;');
							$('#eemail').html('<span style="color:red;">Acest email este deja luat</span>');
						
						}

						else if(email == '' || email.indexOf('@')==-1 || email.indexOf('.')==-1)
						{
							$('#email').css('border-color','red','border-style','solid;');
							$('#eemail').html('<span style="color:red;">Trebuie sa introduci un email valid</span>');
						}

						else
						{
							k++;
							$('#email').css('border-color','green','border-style','solid;');
							$('#eemail').html('');
						}
					}
				}
				
				
			});
			
			

			
			if(k == 3)
			{
				$('html').load('/');
			}

			//$('#RegisterForm')[0].reset();
		
	});
});



</script>



<link rel="stylesheet" type="text/css" href="/css.css">
<title></title>
</head>
<body>
<nav>	
	<div class = "autreg">
@if (Auth::check())
<?php 
$user = Auth::user();
  echo '<a href="/profil/'.$user->username.'">Profil</a>';
?>

  <a class = "log" href = "/logout" id = "logout" name = "logout">LogOut</a>
                        
@else
 
  <a class = "aut" value = "Autentificare" id = "modal-open-button-a">Autentificare</a>
  <a class = "reg" value = "Inregistrare" id = "modal-open-button-i">Inregistrare</a>
 
@endif
</div>
</nav>

<form style = "outline:0;"  id = "RegisterForm" class="form-horizontal" action = "register_process" method = "POST">
		 
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input class = "btn-x" id = "modal-close-button-i" type="button" value = "&#10006;">

	<div class="form-group">
		<label class = "col" for = "username" >Username:</label>
	 <div class = "col">
		<input  id = "username" type = "username" name = "username" value="{{ Input::old('username') }}" autocomplete = "off"></input>
		
		<div id="eusername"></div>
		
		
	 </div>
	</div>

	<div class="form-group">
		<label class = "col" for = "password">Password:</label>
	 <div class = "col">
		<input id = "password" class="{{ $errors->has('password') ? 'has-error' : '' }}" type = "password" name = "password"value="{{ Input::old('password') }}"></input><br>
		
	<div id="epassword"></div>
	 </div>
	</div>

	<div class="form-group">
		<label class = "col" for = "email">Email:</label>
	 <div class = "col">
		<input id = "email" class="{{ $errors->has('email') ? 'has-error' : '' }}" type = "email" name = "email"value="{{ Input::old('email') }}"></input><br>
		
		<div id="eemail"></div>
	 </div>
	</div>
		
		<input class = "btn" id= "RegisterSubmit" type = "submit" value = "Inregistrare"></input>
	</form>
<div id = "overlay-bg"></div>



<form style = "outline:0;"  id = "LoginForm" class="form-horizontal" action = "login_process" method = "POST">
		 
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input class = "btn-x" id = "modal-close-button-a" type="button" value = "&#10006;">
<div id = "formerror" class = "lol"></div>
	<div class="form-group">
		<label class = "col" for = "username" >Username:</label>
	 <div class = "col">
		<input id = "usernamel" type = "username" name = "username" value="{{ Input::old('username') }}" autocomplete = "off"></input>
		
		<div id="erusername"></div>
		
		
	 </div>
	</div>

	<div class="form-group">
		<label class = "col" for = "password">Password:</label>
	 <div class = "col">
		<input id = "passwordl" class="{{ $errors->has('password') ? 'has-error' : '' }}" type = "password" name = "password"value="{{ Input::old('password') }}"></input><br>
		
	<div id="erpassword"></div>
	 </div>
	</div>

		
		<input class = "btn" id= "LoginSubmit" type = "submit" value = "Autentificare"></input>
	</form>





















<?php if(Request::segment(2) == Auth::user()->username){?>

<!DOCTYPE HTML>
<html>

<head>
@include ('js')
<link rel="stylesheet" type="text/css" href="/css.css">
<title>
	@if(Auth::check())
	<?php $user=Auth::user(); 
		  echo $user->username; 
	?>
	@else
	<?php header('location: /'); die(); ?>
	@endif
</title>

<script type="text/javascript">
$(document).ready(function (){
		
		$('.nav-link').hover(function () {
		$('.arrow-right').fadeIn(50);

	});
		/* $('.nav-link2').hover(function () {
			$('.arrow-right').animate({'marginTop' : "+=44px"});
		});*/
		$('.nav-link').mouseleave(function () {
		$('.arrow-right').hide(1);
	});
		$('.nav-link2').hover(function () {
		$('.arrow-right2').fadeIn(50);

	});
		$('.nav-link2').mouseleave(function () {
		$('.arrow-right2').hide(1);
	});
		$('.nav-link3').hover(function () {
		$('.arrow-right3').fadeIn(50);

	});
		$('.nav-link3').mouseleave(function () {
		$('.arrow-right3').hide(1);
	});
		$('.nav-link4').hover(function () {
		$('.arrow-right4').fadeIn(50);

	});
		$('.nav-link4').mouseleave(function () {
		$('.arrow-right4').hide(1);
	});

	
});


</script>
<?php $email = Auth::user()->email ?>

<script type="text/javascript">

	$(document).ready(function() {
		$('#SchimbareEmail').click(function() {
			$('#EmailForm').slideToggle(200);
		});

		$('#EmailSubmit').click(function (e){
		e.preventDefault();
			var NoulEmail = $('#NoulEmail').val();
			var ParolaActuala = $('#ParolaActuala').val();
			var test = 'John';
			var form = $('#EmailForm');
			var username = '<?php Auth::user()->username ?>';
			

			function IsEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
 
			$.ajax({
				type: 'POST',
				url: '/EditEmail',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				statusCode: {
				    404: function() {
				     $('#NoulEmail').css('border-color','red','border-style','solid;');
							$('#eNoulEmail').html('<span style="font-size:15px;color:red;">Acest email deja a fost luat</span>');
				    }
					
				},
				statusCode: {
				    403: function() {
				     $('#ParolaActuala').css('border-color','red','border-style','solid;');
							$('#eParolaActuala').html('<span style="font-size:15px;color:red;">Parola introdusa este gresita</span>');
				    }
					
				},
				error:function(data) {
						
						 if (!IsEmail(NoulEmail) )
						{
							$('#NoulEmail').css('border-color','red','border-style','solid;');
							$('#eNoulEmail').html('<span style="font-size:15px;color:red;">Trebuie sa introduci un email valid</span>');
						}

						else
						{
							
							$('#NoulEmail').css('border-color','green','border-style','solid;');
							$('#eNoulEmail').html('');
						}
				},
				success:function(data) {
					$('#NoulEmail').css('border-color','green','border-style','solid;');
							$('#eNoulEmail').html('');
					window.location.href=window.location.href;
				}	
		});
});
	});	



</script>
<script type="text/javascript">
	$(document).ready(function() {
		
		$('#SchimbareParola').click(function () {
			$('.SchimbareParolaInputs').slideToggle(200);
	});

		$('#ParolaSubmit').click(function (p){
		p.preventDefault();
			var NouaParola = $('#NouaParola').val();
			var ParolaActuala2 = $('#ParolaActuala2').val();
			var form = $('#ParolaForm');
			var NouaParola2 = $('#NouaParola2').val();
			var k = 0;
			
			$.ajax({
				type: 'POST',
				url: '/EditParola',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				statusCode: {
				    403: function() {
				    	
				    	$('#ParolaActuala2').css('border-color','red','border-style','solid;');
						$('#eParolaActuala2').html('<span style="font-size:15px;color:red;">Parola introdusa este gresita</span>');
						
				    }
					
				},
				
				error:function(data) {
					

					if(NouaParola2 != NouaParola)
					{
						$('#eNouaParola2').css('border-color','red','border-style','solid;');
						$('#eNouaParola2').html('<span style="font-size:15px;color:red;">Noua parola nu este asemanatoare</span>');
					}

					if(NouaParola2 == NouaParola)
					{
						$('#eNouaParola2').removeAttr('style');
						$('#eNouaParola2').html('');
					}
				
					if(NouaParola.length < 5)
					{
						$('#NouaParola').css('border-color','red','border-style','solid;');
						$('#eNouaParola').html('<span style="font-size:15px;color:red;">Trebuie introduse cel putin 4 caractere</span>');
					
					}
					if(NouaParola.length >= 5)
					{
						$('#NouaParola').removeAttr('style');
						$('#eNouaParola').html('');
					
					}
				},
				success:function(data) {
					 if(data['status'] == "parola_buna") {
             			
						$('#ParolaActuala2').removeAttr('style');
						$('#eParolaActuala2').html('');
						k++;
        			}
        			if(NouaParola2 == NouaParola)
					{
						$('#NouaParola2').removeAttr('style');
						$('#eNouaParola2').html('');
						k++
					}

					if(NouaParola.length >= 5)
					{
						$('#NouaParola').removeAttr('style');
						$('#eNouaParola').html('');
						k++
					
					}
        			
        		
					
					if(k==3)
					{window.location.href=window.location.href;}
			}
		});
	});
});

</script>
<script type="text/javascript">
		
		$(document).ready(function() {

			$('.Compune').click(function() {
				$('#MesajeForm').slideToggle(300);
			});

			$('#MesajSubmit').click(function (a) {
				a.preventDefault();
				var form = $('#MesajeForm');
				var catre = $('#catre').val();
				var subiect = $('#subiect').val();
				var user = '<?php echo Auth::user()->username  ?>';


			$.ajax({
				type: 'POST',
				url: '/TrimiteMesaj',
				data: form.serialize(),
				dataType: 'json',
				timeout: 9000,
				error:function(data) {

					
					if(user == catre)
					{
						$('#catre').css('border-color','red','border-style','solid;');
						$('#eCatre').html('<span style="font-size:15px;color:red;">Nu iti poti trimite mesaj tie insuti</span>');
					}

					else if (catre == '')
					{
						$('#catre').css('border-color','red','border-style','solid;');
						$('#eCatre').html('<span style="font-size:15px;color:red;">Trebuie sa introduci un destinatar</span>');
					}


					if(subiect == '')
					{
						$('#subiect').css('border-color','red','border-style','solid;');
						$('#eSubiect').html('<span style="font-size:15px;color:red;">Trebuie sa intrduci un subiect</span>');
					
					}
				},
				success:function(data) {
					window.location.href=window.location.href;
				}

			});


			});
});




</script>
<script type="text/javascript">

$(document).ready(function() {

	var destinatar = '<?php 
if(Request::segment(5))
	{ $segment = Request::segment(5);
	 $mesaj = DB::table("mesaje")->where("mesaj_id",$segment)->first();
	 $destinatar_id = $mesaj->destinatar_id;
	 $user = DB::table("users")->where("user_id",$destinatar_id)->first();
	echo $user->username;}



	?>';

	$('#Raspunde').click(function() {
		$('#MesajeForm').slideToggle(200);
		$('#catre').val(destinatar);
	});
});



</script>
</head>

<body>


<div class = "PanouControl">
	<ul>
		
		<li><a class = "nav-link" href = "/profil/{{Auth::user()->username}}/setarilecontului"><span class = "icon">&#128295;</span><span class = "separator"></span>Setarile contului</a></li>
		<li><a class = "nav-link2" href = "/profil/{{Auth::user()->username}}/mesaje"><span class = "icon">&#128194;</span><span class = "separator"></span>Mesaje</a></li>
		<li><a class = "nav-link3" href = "/profil/{{Auth::user()->username}}/modificareimagine"><span class = "icon"><i class="fa fa-picture-o"></i></span><span class = "separator"></span>Modificare imagine</a></li>
	<div class = "arrow-right"></div>
		<div class = "arrow-right2"></div>
		<div class = "arrow-right3"></div>
		<div class = "arrow-right4"></div>
	</ul>
</div>

@yield('SetarileContului')

@yield('Mesaje')

@yield('Mesaj')

@yield('SchimbareImagine')

</body>
</html>
<?php } ?>
</body>
</html>
