

<?php $__env->startSection('homeTable'); ?>

    <?php if(isset($tableProducts)): ?>
        <?php echo $__env->make('layouts.table', ['products' => $tableProducts], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <br><br>

    <?php if(Auth::check() && Auth::user()->role == 1): ?>
        <a href="<?php echo e(route('products.create')); ?>">Add a product</a>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('cartTable'); ?>

    <?php if(Session::get('cart')): ?>
        <?php echo $__env->make('layouts.table', ['products' => $cartProducts], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <a href="/product/cart/reset">Reset Cart</a>
        <a href="/product/order">Order</a>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>