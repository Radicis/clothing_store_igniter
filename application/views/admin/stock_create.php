
<?php echo validation_errors(); ?>

<?php

$attributes = array('class' => 'form');

echo form_open('stock/create', $attributes); ?>

<input type="hidden" value="<?php echo $itemID;?>" name="itemID" />

<div class="form-group">
    <label for="size">Size</label>
    <input type="input" name="size" class="form-control" required placeholder="Size" />
</div>
<div class="form-group">
    <label for="colour">Colour</label>
    <input type="input" name="colour" class="form-control" required placeholder="Colour" />
</div>

<div class="form-group">
    <label for="stock">Stock</label>
    <input type="input" name="stock" class="form-control" required placeholder="Stock" />
</div>


<div class="form-group registration_form">
    <input type="submit" name="submit" value="Create Stock" />
</div>


</form>
