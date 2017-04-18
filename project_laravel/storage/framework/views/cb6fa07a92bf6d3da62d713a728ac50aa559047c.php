

<?php $__env->startSection('loginForm'); ?>

<form action="/authentification" method="post">
    <?php echo e(csrf_field()); ?>

    
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="admin" />

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" />


    <input type="submit" />

</form>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>