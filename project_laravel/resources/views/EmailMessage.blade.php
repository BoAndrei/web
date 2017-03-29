<?php $products = DB::select('select * from products') ?>

<html>
    <head>

        <link rel="stylesheet" href="/css/css.css">
    </head>
    
    <body>
    


@include('TableHeader')
  
  @foreach ($products as $product)
   @if (in_array($product->product_id, Session::get('cart') ? Session::get('cart') : array()))
  
  <tr>
   @include('TableBody')
  </tr>
  
  @endif
  @endforeach
 
</table>

</body>

</html>
