<!DOCTYPE HTML>
<html>
<body>
	<?php
$to = "handrei152@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: bocsan.andrei@gmail.com" . "\r\n" .
"CC: bocsan.andrei@gmail.com";
ini_set('SMTP', 'smtp.rdslink.ro');
$mail = mail($to,$subject,$txt,$headers);
if($mail == true)
{
	echo 'mail sent';
}
?>
<title></title>
	<form action = "login_process" method = "POST">
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label class = "col" for = "email">Email:</label>
	 <div class = "col">
		<input id = "email" class="{{ $errors->has('email') ? 'has-error' : '' }}" type = "email" name = "email"value="{{ Input::old('email') }}"></input><br>
		
		<div id="eemail"></div>
	 </div>
	</div>

		<input type = "submit" value = "Trimite-mi o parola noua"></input>
		<a href="recuperareparola">Ti-ai uitat parola ?</a>
	</form>


</body>
</html>
