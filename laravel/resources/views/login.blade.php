
<!DOCTYPE HTML>
<html>
<body>
<title></title>
	<form action = "login_process" method = "POST">
		 <input type="hidden" name="_token" value="{{ csrf_token() }}">

	<div class="{{ $errors->has('username') ? 'has-error' : '' }}">
		<label for = "username">username:</label>
		<input type = "username" name = "username" value="{{ Input::old('username') }}"></input><br><br>
		{!! $errors->first('username' , '<span style = "color:red">:message</span>') !!}
	</div>

	<div class="{{ $errors->has('password') ? 'has-error' : '' }}">
		<label for = "password">password:</label>
		<input type = "password" name = "password"value="{{ Input::old('password') }}"></input><br><br>
		{!! $errors->first('password' , '<span style = "color:red">:message</span>') !!}
	</div>

		<input type = "submit" value = "LogIn"></input>
	</form>


</body>
</html>

