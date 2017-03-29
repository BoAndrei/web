@extends('master.layout')

@section('loginForm')

<form action="/user/login" method="post">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="admin" />

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" />


    <input type="submit" />

</form>


@endsection