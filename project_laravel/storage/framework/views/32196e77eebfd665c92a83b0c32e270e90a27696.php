

<?php $__env->startSection('homeTable'); ?>

    <?php echo $__env->make('layouts.table', ['products' => $cartProducts], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <form action="/product/order" method="post" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" />
         <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>


        <label for="pnumber">Phone Number:</label>
        <input type="text" name="pnumber" id="pnumber"  value="<?php echo e(old('pnumber')); ?>" />
         <?php if($errors->has('pnumber')): ?> <p class="help-block"><?php echo e($errors->first('pnumber')); ?></p> <?php endif; ?>


        <label for="street">Street Info:</label>
        <input type="text" name="street" id="street"  value="<?php echo e(old('street')); ?>" />
         <?php if($errors->has('street')): ?> <p class="help-block"><?php echo e($errors->first('street')); ?></p> <?php endif; ?>


        <input type="submit" />

    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>