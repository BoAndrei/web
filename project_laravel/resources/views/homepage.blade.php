@extends('layouts.master')

@section ('homeTable')

    @if (isset($tableProducts))
        @include('layouts.table', ['products' => $tableProducts])
    @endif

    <br><br>

    @if (Auth::check() && Auth::user()->role == 1)
        <a href="{{ route('products.create') }}">Add a product</a>
    @endif

@endsection

@section ('cartTable')

    @if (Session::get('cart'))
        @include('layouts.table', ['products' => $cartProducts])

        <a href="/product/cart/reset">Reset Cart</a>
        <a href="/product/order">Order</a>
    @endif

@endsection
