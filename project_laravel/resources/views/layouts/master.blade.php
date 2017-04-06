<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="/css/css.css">
    </head>

    <body>

        @if (!Auth::check())
            <a href="{{ route('authentification.create') }}">Login</a>
            <a href="{{ route('user.create') }}">Register</a>
        @else
            <form action="{{ route('authentification.destroy', ['id' => Auth::user()->id]) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete" >

                <input type="submit" value="Logout">

            </form>
        @endif

        @yield('homeTable')

        @yield('cartTable')

        @yield('content')

    </body>
</html>