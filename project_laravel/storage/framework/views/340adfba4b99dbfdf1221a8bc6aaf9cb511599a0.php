<?php
$products = DB::select('select * from products');

foreach ($products as $product) {
    if (in_array($product->id, Session::get('cart') ? Session::get('cart') : array())) {
        $cartProducts[] = $product;
    }
}

if (isset($cartProducts)) {
    $cartProducts = (object)$cartProducts;
}

?>
        <!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="/css/css.css">
    </head>
    
    <body>


    <?php echo $__env->make('layouts.table', ['products' => $cartProducts], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  


</body>

</html>