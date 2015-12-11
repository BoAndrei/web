<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>




<?php require_once '/php/Parsedown.php';
$parsedown = new Parsedown();

//echo $parsedown->text($text);
 ?>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap styles -->
<?php //<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"> ?>
<!-- Generic page styles -->

<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="/css/jquery.fileupload.css">
<link rel="stylesheet" href="/css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="/css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="/css/jquery.fileupload-ui-noscript.css"></noscript>
<!-- Progress bar  -->
<script src='/js/nprogress.js'></script>
<link href='/css/nprogress.css' rel='stylesheet' />
<!-- QTIP -->

<link href='/css/lightbox.css' rel='stylesheet' />

<link href='/css/chosen.css' rel='stylesheet' />

<link href="/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css">



<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:light&v1' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Muli" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Gentium+Book+Basic" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Bentham" />



<script type="text/javascript">
 function progress(){
NProgress.start();
NProgress.done();
 }
 
window.onload  = progress;
</script>

<script>if(location.hostname.match(/ricostacruz\.com$/)){var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-20473929-1"]),_gaq.push(["_trackPageview"]),function(){var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}()}</script>


	<meta charset="UTF-8">

@include ('js')
<script type="text/javascript">


</script>



<link rel="stylesheet" type="text/css" href="/css.css">
<link rel="stylesheet" type="text/css" href="/css/jquery.upvote.css">
<title></title>



</head>

<body >

	<script type="text/javascript" src="/js/jqueryqtip.js"></script>
	<script type="text/javascript" src="/js/js.js"></script>
	<script type="text/javascript" src="/js/register.js"></script>
	<script type="text/javascript" src="/js/login.js"></script>
	<script type="text/javascript" src="/js/arrow.js"></script>
	<script type="text/javascript" src="/js/jquery.upvote.js"></script>



	<link href='/css/jqueryqtip.css' rel='stylesheet' />
<nav>	
	<div id="slider"></div>
	<div class = "stanga">

 <a href = "/" value = "Acasa">Acasa</a>
 <a href = "/topicnou/" value = "TopicNou">Topic nou</a>
  <a href = "/cautaresite/" value = "ToateTopicurile">Cauta User</a>
  <a href = "/contact" value = "Contact">Contact</a>
   <a href = "/faq" value = "FAQ">FAQ</a>
	</div>
	<div class = "autreg">

@if (Auth::check())

<?php DB::table('users')->where('user_id',Auth::user()->user_id)->update(array('user_status'=>'1')); ?>


@if(Auth::user()->user_type == 'admin')
 <a  href = "/admin" id = "logout" name = "admin">Admin Page</a>
@endif
<?php echo '<a href="/profil/'.Auth::user()->username.'">Profil</a>'; ?>

  <a class = "log" href = "/logout" id = "logout" name = "logout">LogOut</a>
                        
@else
  <a class = "aut autentificare" value = "Autentificare"   id = "modal-open-button-a">Autentificare</a>
  <a class = "reg inregistrare" value = "Inregistrare"   id = "modal-open-button-i">Inregistrare</a>
 
@endif
</div>
</nav>

<form style = "outline:0;"  id = "RegisterForm" class="form-horizontal" action = "register_process" method = "POST">
		 
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input class = "btn-x" id = "modal-close-button-i" type="button" value = "&#10006;">

	<div class="form-group">
		<label class = "coloana" for = "username" >Username:</label>
	 <div class = "coloana">
		<input  id = "username" type = "username" name = "username" value="{{ Input::old('username') }}" autocomplete = "off"></input>
		
		<div id="eusername"></div>
		
		
	 </div>
	</div>

	<div class="form-group">
		<label class = "coloana" for = "password">Password:</label>
	 <div class = "coloana">
		<input id = "password" class="{{ $errors->has('password') ? 'has-error' : '' }}" type = "password" name = "password"value="{{ Input::old('password') }}"></input><br>
		
	<div id="epassword"></div>
	 </div>
	</div>

	<div class="form-group">
		<label class = "coloana" for = "email">Email:</label>
	 <div class = "coloana">
		<input id = "email" class="{{ $errors->has('email') ? 'has-error' : '' }}" type = "email" name = "email"value="{{ Input::old('email') }}"></input><br>
		
		<div id="eemail"></div>
	 </div>
	</div>
		
		<input class = "btnNou" id= "RegisterSubmit" type = "submit" value = "Inregistrare"></input>
	</form>
<div id = "overlay-bg"></div>




<div class = "autentificareForm">
<div class = "form-header"><h3>Autentificare</h3></div>
	<form class = "autform" method = "POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div style = "position:absolute"id = "formerror"></div>
		<br><br>
		<div class="formgroup">
				<label class = "coloana" for = "username" >Username:</label>
			 <div class = "coloana">
				<input  id = "usernamea" type = "username" name = "username" value="{{ Input::old('username') }}" autocomplete = "off"></input>
				<div id="eausername"></div>
			 </div>
		</div>
<br>
		
		<div class="formgroup">
				<label class = "coloana" for = "password" >Parola:</label>
			 <div class = "coloana">
				<input  id = "passworda" type = "password" name = "password" value="{{ Input::old('password') }}" autocomplete = "off"></input>
				<div id="eapassword"></div>
			 </div>
		</div>

<div class = "checkbox">	

		<input type = "checkbox" name = "remember" id = "remember">
		<label style = "float:right;"class="label_radio" for = "remember" ><span></span>Tine-ma minte</label>

</div>

<div class = "form-inputs">
		<input id = "LoginSubmit"type = "submit" class = "btnNou" style = "float:left;margin-left:10px;"value = "Autentifica-ma">
		<span style = "float:right;margin-right: 10px;">Am uitat parola</span>
</div>
	</form>
</div>
<!--
<form style = "outline:0;"  id = "LoginForm" class="form-horizontal" action = "login_process" method = "POST">
		 
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<input class = "btn-x" id = "modal-close-button-a" type="button" value = "&#10006;">
<div id = "formerror" class = "lol"></div>
	<div class="form-group">
		<label class = "coloana" for = "username" >Username:</label>
	 <div class = "coloana">
		<input id = "usernamel" type = "username" name = "username" value="{{ Input::old('username') }}" autocomplete = "off"></input>
		
		<div id="erusername"></div>
		
		
	 </div>
	</div>

	<div class="form-group">
		<label class = "coloana" for = "password">Password:</label>
	 <div class = "coloana">
		<input id = "passwordl" class="{{ $errors->has('password') ? 'has-error' : '' }}" type = "password" name = "password"value="{{ Input::old('password') }}"></input><br>
		
	<div id="erpassword"></div>
	 </div><br>
	 <input style = "cursor:pointer"name = "remember" id = "remember" type = "Checkbox">
<label style = "cursor:pointer" for = "remember">Remeber me</label><br>
	</div>

		<br>
		<input style = "margin-left:200px;"class = "btnNou" id= "LoginSubmit" type = "submit" value = "Autentificare"></input>
	<a class = "btnNou" href="recuperareparola">Ti-ai uitat parola ?</a>
	</form>

-->














<?php if(Request::segment(2))
{
	if(!Auth::check()){header('location:/');die();}
$snail = DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->where('citit','0')->get();


	if (count($snail)!= 0 )
{
	echo '<style>

	.nav-link2 .icon{color:red;}
	</style>';
}
if(Request::segment(2) == Auth::user()->username ){?>


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
	 $expeditor_id = $mesaj->expeditor_id;
	 $user = DB::table("users")->where("user_id",$expeditor_id)->first();
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
	
	
<?php if(Auth::user()){?>
<?php if(Auth::user()->image ){?>
<script src='/js/lightbox.js'></script>
	<a  data-lightbox="image-1" href = "/<?php echo Auth::user()->image; ?>"><img  style = "padding:8px;
border:solid;
border-color: #dddddd #aaaaaa #aaaaaa #dddddd;
border-width: 1px 2px 2px 1px;
background-color:white;position:relative;left:40px;"width= "278" height = "230" src="/<?php echo Auth::user()->image; ?>"></a>


<?php } else {?>


<img width = "300px" height = "300px" id = "thumb" src="/images/noimage.jpg">

<?php }?>
<?php } else {header('location:/');die();}?>
	<ul>

		<?php 
		//$huser = DB::table('users')
		$snail = DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->where('citit','0')->get();
	?>
		<li><a class = "nav-link" href = "/profil/{{Auth::user()->username}}/setarilecontului"><span class = "icon">&#128295;</span><span class = "separator"></span>Setarile contului</a></li>
		<li><a class = "nav-link2" href = "/profil/{{Auth::user()->username}}/mesaje"><span style = "display:inline; "class = "icon">&#128194;</span> <span class = "separator"></span>Mesaje <?php if(count($snail) != 0)echo '('.count($snail).' noi)'; ?></a></li>
		<li><a class = "nav-link3" href = "/profil/{{Auth::user()->username}}/trimite-mesaj"><span style = "display:inline; "class = "icon">&#128194;</span> <span class = "separator"></span>Trimite Mesaj</a></li>
		<li><a class = "nav-link4" href = "/profil/{{Auth::user()->username}}/modificareimagine"><span class = "icon"><i class="fa fa-picture-o"></i></span><span class = "separator"></span>Modificare imagine</a></li>
		<li><a class = "nav-link5" href = "/profil/{{Auth::user()->username}}/datepersonale"><span class = "icon"><i class="fa fa-pencil-square-o"></i></i></span><span class = "separator"></span>Datele Personale</a></li>
		<li><a class = "nav-link6" href = "/profil/{{Auth::user()->username}}/topicuriproprii"><span class = "icon"><i class="fa fa-pencil-square-o"></i></i></span><span class = "separator"></span>Topicurile Mele</a></li>
		<li><a class = "nav-link7" href = "/profil/{{Auth::user()->username}}/raspunsuriproprii"><span class = "icon"><i class="fa fa-pencil-square-o"></i></i></span><span class = "separator"></span>Raspunsurile Mele</a></li>
		<li><a class = "nav-link8" href = "/tichete"><span class = "icon"><i class="fa fa-pencil-square-o"></i></i></span><span class = "separator"></span>Tichete</a></li>
	
	<div class = "arrow-right"></div>
		<div class = "arrow-right2"></div>
		<div class = "arrow-right3"></div>
		<div class = "arrow-right4"></div>
		<div class = "arrow-right5"></div>
		<div class = "arrow-right6"></div>
		<div class = "arrow-right7"></div>
	</ul>
</div>

@yield('SetarileContului')

@yield('Mesaje')

@yield('Mesaj')

@yield('SchimbareImagine')

@yield('DatePersonale')




<?php } }?>


@if(Auth::user() && Auth::user()->user_type == 'admin' && Request::segment(1) == 'admin')

<div class = "PanouControl">
	<ul>

		<?php //else if( Request::segment(1) != 'admin') {header('location: /');die();}
		//$huser = DB::table('users')
		$snail = DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->where('citit','0')->get();
	?>
		<li><a class = "nav-link" href = "/admin/totiuserii"><span class = "icon">&#128295;</span><span class = "separator"></span>Toti userii</a></li>
		<li><a class = "nav-link2" href = "/admin/introducerecategorii"><span style = "color:black;display:inline; "class = "icon">&#128194;</span> <span class = "separator"></span>Introducere categorii</a></li>
		<li><a class = "nav-link3" href = "/tichete"><span class = "icon"><i class="fa fa-picture-o"></i></span><span class = "separator"></span>Tichete</a></li>
	<div class = "arrow-right"></div>
		<div class = "arrow-right2"></div>
		<div class = "arrow-right3"></div>
		<div class = "arrow-right4"></div>
	</ul>
</div>

@yield('IntroducereCategorii')
@endif
   
@if(Request::path() == 'contact')

@yield('Contact')

@endif

@if(Request::path() == '/')

@yield('PrimaPagina')

@endif

@if(Auth::user() && Request::segment(1) == 'topicnou')

@yield('TopicNou')

@endif

@if(Request::segment(1) == 'toatetopicurile')

@yield('ToateTopicurile')

@endif

@if(Auth::user() && Request::segment(1) == 'cauta')

@yield('TopicSearch')

@endif

@if(Auth::user() && Request::segment(1) == 'topic')

@yield('Topic')

@endif

@if(Auth::check() && Request::segment(3) == 'topicuriproprii')

@yield('TopicurileMele')

@endif

@if(Auth::check() && Request::segment(3) == 'raspunsuriproprii')

@yield('RaspunsurileMele')

@endif

@if(Auth::check() && Request::segment(1) == 'cautaresite')

@yield('CautareSite')

@endif

@if(Auth::check() && Request::segment(1) == 'cautare')

@yield('RezultateCautare')

@endif

@if(Auth::check() && Request::segment(3) == 'trimite-mesaj')

@yield('TrimiteMesaj')

@endif

@if(Auth::check() && Request::path() == 'tichete')

@yield('Tichete')

@endif

@if(Auth::check() && Request::segment(1) == 'tichet')

@yield('Tichet')

@endif
</body>
</html>
