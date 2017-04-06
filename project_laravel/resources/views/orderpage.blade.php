@extends('layouts.master')

@section('homeTable')

    @if(isset($cartProducts))
        @include('layouts.table', ['products' => $cartProducts])
    @endif

@endsection

@section('content')

    <form id="order-form" action="/product/order" method="post" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" />

        @if ($errors->has('name'))
            <p class="help-block">{{ $errors->first('name') }}</p>
        @endif
asd
        <div id="formerrors"></div>


        <label for="pnumber">Phone Number:</label>
        <input type="text" name="pnumber" id="pnumber"  value="{{ old('pnumber') }}" />

        @if ($errors->has('pnumber'))
            <p class="help-block">{{ $errors->first('pnumber') }}</p>
        @endif

        <label for="street">Street Info:</label>
        <input type="text" name="street" id="street"  value="{{ old('street') }}" />

        @if ($errors->has('street'))
            <p class="help-block">{{ $errors->first('street') }}</p>
        @endif


        <input type="submit" id="submit" />

    </form>

@endsection
