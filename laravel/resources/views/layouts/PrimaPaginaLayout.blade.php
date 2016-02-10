<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>




<?php require_once '/php/Parsedown.php';
$parsedown = new Parsedown();

//echo $parsedown->text($text);
 ?>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">



<!-- Bootstrap styles -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>







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

	<script type="text/javascript" src="/js/login.js"></script>
	<script type="text/javascript" src="/js/arrow.js"></script>
	<script type="text/javascript" src="/js/jquery.upvote.js"></script>



	<link href='/css/jqueryqtip.css' rel='stylesheet' />
<?php /*
<nav class="navbar navbar-default">	
	<div id="slider"></div>
	<ul class = "navbar">
		

			<li><a href = "/" value = "Acasa">Acasa</a></li>
			<li><a href = "/topicnou/" value = "TopicNou">Topic nou</a></li>
			<li><a href = "/cautaresite/" value = "ToateTopicurile">Cauta User</a></li>
			<li><a href = "/contact" value = "Contact">Contact</a></li>
			<li><a href = "/faq" value = "FAQ">FAQ</a></li>

		


@if (Auth::check())

<?php DB::table('users')->where('user_id',Auth::user()->user_id)->update(array('user_status'=>'1')); ?>


@if(Auth::user()->user_type == 'admin')
 			<li><a  href = "/admin" id = "logout" name = "admin">Admin Page</a></li>
@endif
			<li><a href="/profil/{{ Auth::user()->username }}">Profil</a></li>

  			<li><a class = "log" href = "/logout" id = "logout" name = "logout">LogOut</a></li>
                        
@else
			<li><a class = "aut autentificare" value = "Autentificare"   id = "modal-open-button-a">Autentificare</a></li>
			<li><a class = "reg inregistrare" value = "Inregistrare"   id = "modal-open-button-i">Inregistrare</a></li>
 
@endif

 			<a href="#" id="pull">Menu</a>
	
	</ul>
</nav> */?>

<nav class="navbar navbar-default">
	<div id="slider"></div>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php //<a class="navbar-brand" href="#">Brand</a> ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        	<li><a href = "/" value = "Acasa">Acasa</a></li>
			<li><a href = "/topicnou/" value = "TopicNou">Topic nou</a></li>
			<li><a href = "/cautaresite/" value = "ToateTopicurile">Cauta User</a></li>
			<li><a href = "/contact" value = "Contact">Contact</a></li>
			<li><a href = "/faq" value = "FAQ">FAQ</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())

<?php DB::table('users')->where('user_id',Auth::user()->user_id)->update(array('user_status'=>'1')); ?>


@if(Auth::user()->user_type == 'admin')
 			<li><a  href = "/admin" id = "logout" name = "admin">Admin Page</a></li>
@endif
			<li><a href="/profil/{{ Auth::user()->username }}">Profil</a></li>

  			<li><a class = "log" href = "/logout" id = "logout" name = "logout">LogOut</a></li>
                        
@else
			<li><a class = "aut autentificare" value = "Autentificare"   id = "modal-open-button-a">Autentificare</a></li>
			<li><a class = "reg inregistrare" value = "Inregistrare"   id = "modal-open-button-i">Inregistrare</a></li>
 
@endif
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


















<div class = "inregistrareForm container">
<div class="jumbotron form-header">
    <p>Inregistrare</p> 
  </div>

	<form class = "inregform form-horizontal" method = "POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="form-group">
				<label for="username" class="col-sm-2 control-label">Username:</label>
			    <div class="col-sm-10">
			      <input name = "username"type="username" class="form-control" id="username" placeholder="">
			    <div id="erusername"></div>
			    </div>
		</div>

		<div class="form-group">
				<label class="col-sm-2 control-label" for = "email" >Parola:</label>
			 <div class="col-sm-10">
				<input  class="form-control" id = "email" type = "email" name = "email" value="{{ Input::old('email') }}" autocomplete = "off"></input>
				<div id="eremail"></div>
			 </div>
		</div>

		<div class="form-group">
				<label class="col-sm-2 control-label" for = "passworda" >Parola:</label>
			 <div class="col-sm-10">
				<input  class="form-control" id = "passworda" type = "password" name = "password" value="{{ Input::old('password') }}" autocomplete = "off"></input>
				<div id="erpassword"></div>
			 </div>
		</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
       <div class = "form-inputs jumbotron">
		<input id = "RegisterSubmit"type = "submit" class = "btnNou" value = "Inregistreaza-ma">
		
</div>
</div>
</div>
	</form>
</div>
<div id = "overlay-bg"></div> 




<div class = "autentificareForm container">

<div class="jumbotron form-header">
    <p>Autentificare</p> 
  </div>


	<form class = "autform form-horizontal" method = "POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div style = "position:absolute"id = "formerror"></div>
		
		<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Username:</label>
			    <div class="col-sm-10">
			      <input name = "username"type="username" class="form-control" id="inputEmail3" placeholder="Email">
			    <div id="eusername"></div>
			    </div>
		</div>

		
		<div class="form-group">
				<label class="col-sm-2 control-label" for = "password" >Parola:</label>
			 <div class="col-sm-10">
				<input  class="form-control" id = "passworda" type = "password" name = "password" value="{{ Input::old('password') }}" autocomplete = "off"></input>
				<div id="eapassword"></div>
			 </div>
		</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<div class = "checkbox">	

			<input type = "checkbox" name = "remember" id = "remember">
			<label style = "float:right;"class="label_radio" for = "remember" ><span></span>Tine-ma minte</label>

		</div>
	</div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
       <div class = "form-inputs jumbotron">
		<input id = "LoginSubmit"type = "submit" class = "btnNou" style = ""value = "Autentifica-ma">
		<span style = "">Am uitat parola</span>
	   </div>
	</div>
</div>

	</form>
</div>













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
	
	
	<ul class="list-inline">

		<?php 
		//$huser = DB::table('users')
		$snail = DB::table('mesaje')->where('destinatar_id',Auth::user()->user_id)->where('citit','0')->get();
	?>
		<li><a href = "/profil/{{Auth::user()->username}}/setarilecontului"><span class = "icon">&#128295;</span><span class = "separator"></span> Setarile contului</a></li>
		
		<li><a href = "/profil/{{Auth::user()->username}}/mesaje"><span style = "display:inline; "class = "icon">&#128194;</span> <span class = "separator"></span>Mesaje <?php if(count($snail) != 0)echo '('.count($snail).' noi)'; ?></a></li>
		<li><a href = "/profil/{{Auth::user()->username}}/trimite-mesaj"><span style = "display:inline; "class = "icon">&#128194;</span> <span class = "separator"></span>Trimite Mesaj</a></li>
		<li><a href = "/profil/{{Auth::user()->username}}/modificareimagine"><span class = "icon"><i class="fa fa-picture-o"></i></span><span class = "separator"></span> Modificare imagine</a></li>
		<li><a href = "/profil/{{Auth::user()->username}}/datepersonale"><span class = "icon"><i class="fa fa-pencil-square-o"></i></i></span><span class = "separator"></span> Datele Personale</a></li>
		<li><a href = "/profil/{{Auth::user()->username}}/topicuriproprii"><span class = "icon"><i class="fa fa-list-alt"></i></span><span class = "separator"></span> Topicurile Mele</a></li>
		<li><a href = "/profil/{{Auth::user()->username}}/raspunsuriproprii"><span class = "icon"><i  class="fa fa-list-alt"></i></span><span class = "separator"></span> Raspunsurile Mele</a></li>
		<li><a href = "/tichete"><span class = "icon"><i class="fa fa-ticket"></i></span><span class = "separator"></span>Tichete</a><div class = "arrow-right8"></div></li>
		
		
	</ul>




</div>

@yield('SetarileContului')



@yield('SchimbareImagine')






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

@if(Auth::check() && Request::segment(3) == 'datepersonale')

@yield('DatePersonale')

@endif

@if(Auth::check() && Request::segment(3) == 'mesaje')

@yield('Mesaje')

@endif

<?php /*
@if(Auth::check() && Request::path() == 'tichete')

@yield('Tichete')

@endif

@if(Auth::check() && Request::segment(1) == 'tichet')

@yield('Tichet')

@endif


*/?>


</body>
</html>
