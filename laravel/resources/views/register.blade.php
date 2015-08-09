
<!DOCTYPE HTML>
<html>
<body>
<head>
@include ('js')
<link rel="stylesheet" type="text/css" href="css.css">
<title></title>
</head>

	<form class="form-horizontal" action = "register_process" method = "POST">
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="form-group">
		<label class = "col" for = "username" >username:</label>
	 <div class = "col">
		<input class=" input {{ $errors->has('username') ? 'has-error' : '' }}" type = "username" name = "username" value="{{ Input::old('username') }}"></input><br>
		{!! $errors->first('username' , '<span style = "color:red">:message</span>') !!}
	 </div>
	</div>

	<div class="form-group">
		<label class = "col" for = "password">password:</label>
	 <div class = "col">
		<input class="{{ $errors->has('username') ? 'has-error' : '' }}" type = "password" name = "password"value="{{ Input::old('password') }}"></input><br>
		{!! $errors->first('password' , '<span style = "color:red">:message</span>') !!}
	 </div>
	</div>

	<div class="form-group">
		<label class = "col" for = "email">email:</label>
	 <div class = "col">
		<input class="{{ $errors->has('username') ? 'has-error' : '' }}" type = "email" name = "email"value="{{ Input::old('email') }}"></input><br>
		{!! $errors->first('email' , '<span style = "color:red">:message</span>') !!}
	 </div>
	</div>
		
		<input type = "submit" value = "LogIn"></input>
	</form>



</body>
</html>
