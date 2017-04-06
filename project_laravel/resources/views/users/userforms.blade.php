@extends('layouts.master')

@section('content')

    <form action="{{ Request::segment(1) == 'user' ?  route('user.store') : route('authentification.store') }}" method="post">
        {{ csrf_field() }}

        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="admin"/>

        @if ($errors->has('username'))
            <p class="help-block">{{ $errors->first('username') }}</p>
        @endif

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="admin" />

        @if ($errors->has('password'))
            <p class="help-block">{{ $errors->first('password') }}</p>
        @endif


        <input type="submit" />

    </form>


@endsection