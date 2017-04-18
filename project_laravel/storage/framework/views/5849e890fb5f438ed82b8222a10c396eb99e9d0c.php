<table style="width:100%">

    <caption>Products in cart</caption>

    <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Image</th>
        <th>Operation</th>
    </tr>

    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(!in_array($product->id, Session::get('cart') ? Session::get('cart') : array())): ?>


            <tr>

                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->description); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td><image height="100" width="100" src="/images/<?php echo e($product->image); ?>" /></td>

                <td>
                    <?php if(Auth::check() && Auth::user()->role == 1): ?>
                        <a href="<?php echo e(route('products.edit', ['id' => $product->id])); ?>">Edit product</a>

                        <form action="products/<?php echo e($product->id); ?>" method="post">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="_method" value="DELETE" >
                            <input type="submit" value="delete ">
                        </form>
                    <?php else: ?>
                        <a href="/product/cart/add/<?php echo e($product->id); ?>">Add To Cart</a>
                    <?php endif; ?>

                </td>

            </tr>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</table>
