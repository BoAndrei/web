@extends('master.layout')

@section('homeTable')


@include('TableHeader')
  
  @foreach ($products as $product)
   @if (in_array($product->product_id, Session::get('cart') ? Session::get('cart') : array()))
  
  <tr>
   @include('TableBody')
  </tr>
  
  @endif
  @endforeach
 
</table>


@endsection

@section('orderForm')

<form action="/product/order" method="post" enctype="multipart/form-data">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" />
     @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
    

    <label for="pnumber">Phone Number:</label>
    <input type="text" name="pnumber" id="pnumber"  value="{{ old('pnumber') }}" />
     @if ($errors->has('pnumber')) <p class="help-block">{{ $errors->first('pnumber') }}</p> @endif
    
    
    <label for="street">Street Info:</label>
    <input type="text" name="street" id="street"  value="{{ old('street') }}" />
     @if ($errors->has('street')) <p class="help-block">{{ $errors->first('street') }}</p> @endif


    <input type="submit" />

</form>

@endsection
