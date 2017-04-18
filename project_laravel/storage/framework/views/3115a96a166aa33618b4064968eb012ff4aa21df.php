

<?php $__env->startSection('registerform'); ?>

    <form action="<?php echo e(Auth::check() ?); ?>/user" method="post">
        <?php echo e(csrf_field()); ?>


        <label for="username">Username:</label>
        <input type="text" name="username" id="username" value="<?php echo e(old('userame')); ?>"/>

        <?php if($errors->has('username')): ?> <p class="help-block"><?php echo e($errors->first('username')); ?></p> <?php endif; ?>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" />

        <?php if($errors->has('password')): ?> <p class="help-block"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>


        <input type="submit" />

    </form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>