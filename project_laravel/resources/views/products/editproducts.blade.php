@extends('layouts.master')

@section('content')

    <form action="{{ isset($product) ? route('products.update', ['id' => $product->id])  : route('products.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        @if (isset($product))
            <input type="hidden" name="_method" value="PUT" />
        @endif

        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" value="{{  old('name') ? old('name') : ( isset($product) ? $product->name : '' ) }}" />

        @if ($errors->has('name'))
            <p class="help-block">{{ $errors->first('name') }}</p>
        @endif

        <label for="description">Product Description:</label>
        <input type="text" name="description" id="description" value="{{ old('description') ? old('description') :( isset($product) ? $product->description  : '' ) }}" />

        @if ($errors->has('description'))
            <p class="help-block">{{ $errors->first('description') }}</p>
        @endif

        <label for="price">Product Price:</label>
        <input type="text" name="price" id="price" value="{{ old('price') ? old('price') :( isset($product) ? $product->price  : '' ) }}" />

        @if ($errors->has('price'))
            <p class="help-block">{{ $errors->first('price') }}</p>
        @endif

        @if (isset($product))
            <div>
                <span>Current image:</span><br><br>
                <img height="100" width="100" src = "/images/{{ $product->image }}" />
                <br><br>
            </div>
        @endif

        <label for="image">Image to upload:</label>
        <input type="file" name="image" id="image"><br><br>

        @if ($errors->has('image'))
            <p class="help-block">{{ $errors->first('image') }}</p>
        @endif

        <input type="submit" />

    </form>

@endsection
