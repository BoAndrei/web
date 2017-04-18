

<?php $__env->startSection('content'); ?>

    <form action="<?php echo e(isset($product) ? route('products.update', ['id' => $product->id])  : route('products.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>


        <?php if(isset($product)): ?>
            <input type="hidden" name="_method" value="PUT" />
        <?php endif; ?>

        <label for="name">Product Name:</label>
        <input type="text" name="name" id="name" value="<?php echo e(old('name') ? old('name') : ( isset($product) ? $product->name : '' )); ?>" />

        <?php if($errors->has('name')): ?>
            <p class="help-block"><?php echo e($errors->first('name')); ?></p>
        <?php endif; ?>

        <label for="description">Product Description:</label>
        <input type="text" name="description" id="description" value="<?php echo e(old('description') ? old('description') :( isset($product) ? $product->description  : '' )); ?>" />

        <?php if($errors->has('description')): ?>
            <p class="help-block"><?php echo e($errors->first('description')); ?></p>
        <?php endif; ?>

        <label for="price">Product Price:</label>
        <input type="text" name="price" id="price" value="<?php echo e(old('price') ? old('price') :( isset($product) ? $product->price  : '' )); ?>" />

        <?php if($errors->has('price')): ?>
            <p class="help-block"><?php echo e($errors->first('price')); ?></p>
        <?php endif; ?>

        <?php if(isset($product)): ?>
            <div>
                <span>Current image:</span><br><br>
                <img height="100" width="100" src = "/images/<?php echo e($product->image); ?>" />
                <br><br>
            </div>
        <?php endif; ?>

        <label for="image">Image to upload:</label>
        <input type="file" name="image" id="image"><br><br>

        <?php if($errors->has('image')): ?>
            <p class="help-block"><?php echo e($errors->first('image')); ?></p>
        <?php endif; ?>

        <input type="submit" />

    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>