<?php
    defined('C5_EXECUTE') or die("Access Denied.");
    $al = Loader::helper('concrete/asset_library');
?>
<table>

    <tr>
        <th><?= t('Product Name') ?></th>
        <th><?= t('Product Description') ?></th>
        <th><?= t('Product Price') ?></th>
        <th><?= t('Product Image') ?></th>
        <th><?= t('Operation') ?></th>
    </tr>

    <?php foreach($products as $product): ?>

        <?php

                if ($file = \File::getByID($product['fID'])) {
                    $path = $file->getRelativePath();
                }
        ?>


        <tr>
            <td><?= t($product['name']); ?></td>
            <td><?= t($product['description']); ?></td>
            <td><?= t($product['price']); ?>
            <td><img height="70" width="70" src=" <?= isset($path) ? $path : ''  ?>" /></td>
            <td>

                <!-- <a id="myModalButton">Edit product</a><br> --><br>
                <a href="<?= t(View::url($c->getCollectionLink().'/edit/'.$product['id'])); ?>" class="btn btn-success"><?php echo t("Edit product")?></a><br>
                <a href="<?= t(View::url($c->getCollectionLink().'/delete/'.$product['id'])); ?>" class="btn btn-danger"><?php echo t("Delete product")?></a><br><br>

            </td>
        </tr>

    <?php endforeach; ?>

</table>

<form method="post" action="<?= isset($editProduct) ? $view->action('saveFormData/'.$editProduct['id']) : $view->action('saveFormData')?>" enctype="multipart/form-data">
    <fieldset>

        <div class="form-group"><br>
            <label for="<?= t('name') ?>" class="launch-tooltip control-label" data-placement="right" title="<?=t('')?>"><?=t('Product Name:')?></label>
            <input name="<?= t('name') ?>" value="<?= $_POST['name'] ? t($_POST['name']) : (isset($editProduct) ? t($editProduct['name']) : '') ?>" class="span4 form-control ccm-input-text" type="text">
        </div>

        <div class="form-group">
            <label for="<?= t('description') ?>" class="launch-tooltip control-label" data-placement="right" title="<?=t('')?>"><?=t('Product Description:')?></label>
            <input name="<?= t('description') ?>" value="<?= $_POST['description'] ? t($_POST['description']) : (isset($editProduct) ? t($editProduct['description']) : '') ?>" class="span4 form-control ccm-input-text" type="text">
        </div>

        <div class="form-group">
            <label for="<?= t('price') ?>" class="launch-tooltip control-label" data-placement="right" title="<?=t('')?>"><?=t('Product Price:')?></label>
            <input name="<?= t('price') ?>" value="<?= $_POST['price'] ? t($_POST['price']) : (isset($editProduct) ? t($editProduct['price']) : '') ?>" class="span4 form-control ccm-input-text" type="text">
        </div>



        <div class="form-group">
            <?php echo $form->label('fID', t('File'))?>
            <?php echo $al->file('ccm-b-file', 'fID', t('Choose File'));?>
        </div>

        <?php if(isset($editProduct)): ?>
            <img height="70" width="70" src=" <?= $editImgPath ?>" />
        <?php endif; ?>



    </fieldset>
    <div class="ccm-dashboard-form-actions-wrapper">

        <div class="ccm-dashboard-form-actions">
            <?php echo $interface->submit(t(isset($editProduct) ? 'Edit product': 'Add Product'), '', 'right', 'btn-success'); ?>
        </div>

    </div>
</form>




<style>
    table {
        width:100%;
    }
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th, td {
        padding: 5px;
        text-align: left;
    }
    table#t01 tr:nth-child(even) {
        background-color: #eee;
    }
    table#t01 tr:nth-child(odd) {
        background-color:#fff;
    }
    table#t01 th {
        background-color: black;
        color: white;
    }
    .ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset {
        width: 100%;
    }
    .ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset button.btn {
        margin: 0px;
    }
    .ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset button.cancel {
        float: left;
    }
    .ui-dialog .ui-dialog-buttonpane .ui-dialog-buttonset button.save {
        float: right;
    }
</style>