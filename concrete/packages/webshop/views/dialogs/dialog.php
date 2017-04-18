<form method="post" action="<?=$view->action('saveFormData')?>">

    <fieldset>

        <div class="form-group"><br>
            <label for="name" class="launch-tooltip control-label" data-placement="right" title="<?=t('')?>"><?=t('Product Name:')?></label>
            <input id="name" name="name" value="" class="span4 form-control ccm-input-text" type="text">
        </div>

        <div class="form-group">
            <label for="description" class="launch-tooltip control-label" data-placement="right" title="<?=t('')?>"><?=t('Product Description:')?></label>
            <input id="description" name="description" value="" class="span4 form-control ccm-input-text" type="text">
        </div>

        <div class="form-group">
            <label for="price" class="launch-tooltip control-label" data-placement="right" title="<?=t('')?>"><?=t('Product Price:')?></label>
            <input id="price" name="price" value="" class="span4 form-control ccm-input-text" type="text">
        </div>

    </fieldset>

</form>