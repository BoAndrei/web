@extends('master.layout')

@section('addProduct')

<form action="{{ Request::segment(2) ? '/product/'.Request::segment(2).'/edit' : '/product/add' }}" method="post" enctype="multipart/form-data">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <label for="productName">Product Name:</label>
    <input type="text" name="productName" id="productName" value="{{ $product ? $product->product_name :( old('productName') ? old('productName') : '') }}" />

    @if ($errors->has('productName')) <p class="help-block">{{ $errors->first('productName') }}</p> @endif

    <label for="productDescription">Product Description:</label>
    <input type="productDescription" name="productDescription" id="productDescription" value="{{ $product ? $product->product_description :( old('productDescription') ? old('productDescription') : '') }}" />

    @if ($errors->has('productDescription')) <p class="help-block">{{ $errors->first('productDescription') }}</p> @endif

    <label for="productPrice">Product Price:</label>
    <input type="productPrice" name="productPrice" id="productPrice" value="{{ $product ? $product->product_price :( old('productPrice') ? old('productPrice') : '') }}" />

    @if ($errors->has('productPrice')) <p class="help-block">{{ $errors->first('productPrice') }}</p> @endif

    @if ($product)

    <div>
        <span>Current image:</span><br><br>
        <img height="100" width="100" src = "/images/{{ $product->product_image }}" />    
        <br><br>
    </div>

    @endif


    <label for="image">Image to upload:</label>
    <input type="file" name="image" id="image"><br><br>
    @if ($errors->has('image')) <p class="help-block">{{ $errors->first('image') }}</p> @endif




    <input type="submit" />

</form>

@endsection
