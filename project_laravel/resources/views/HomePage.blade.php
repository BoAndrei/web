@extends('master.layout')

@section('homeTable')


@include('TableHeader')

@foreach ($products as $product)
@if (!in_array($product->product_id, Session::get('cart') ? Session::get('cart') : array()))

<tr>
    @include('TableBody')
    <td>
        @if (Session::get('user'))
        <a href="/product/{{ $product->product_id }}/edit">Edit product</a>
        <a href="/product/{{ $product->product_id }}/delete">Delete product</a>
        @else
        <a href="/product/{{ $product->product_id }}/addCart">Add To Cart</a>
        @endif

    </td>
</tr>

@endif
@endforeach

</table>

@if(Session::get('user'))
<a href="/product/add">Add a product</a>
@endif

@endsection

@section('cartTable')


@include('TableHeader')


@foreach ($products as $product)
@if (in_array($product->product_id, Session::get('cart') ? Session::get('cart') : array()))

<tr>
    @include('TableBody')
    <td>

        <a href="/product/{{ $product->product_id }}/removeCart">Remove From Cart</a>

    </td>
</tr>


@endif
@endforeach


</table>

@if (Session::get('cart'))
<a href="/product/resetCart">Reset Cart</a>
<a href="/product/order">Order</a>
@endif

@endsection
