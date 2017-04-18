<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" href="/css/css.css">
    </head>

    <body>

        <?php if(!Auth::check()): ?>
            <a href="<?php echo e(route('authentification.create')); ?>">Login</a>
            <a href="<?php echo e(route('user.create')); ?>">Register</a>
        <?php else: ?>
            <form action="<?php echo e(route('authentification.destroy', ['id' => Auth::user()->id])); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="delete" >

                <input type="submit" value="Logout">

            </form>
        <?php endif; ?>

        <?php echo $__env->yieldContent('homeTable'); ?>

        <?php echo $__env->yieldContent('cartTable'); ?>

        <?php echo $__env->yieldContent('content'); ?>

    </body>
</html>