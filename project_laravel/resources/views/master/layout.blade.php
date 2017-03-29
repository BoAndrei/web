<html>
    <head>

        <link rel="stylesheet" href="/css/css.css">
    </head>

    <body>

        @if (!Session::get('user'))
        <a href="/user/login">Login</a>
        @else
        <a href="/user/logout">Logout</a>
        @endif




        @yield('homeTable')

        @yield('cartTable')

        @yield('loginForm')

        @yield('addProduct')

        @yield('orderForm')

    </body>


</html>