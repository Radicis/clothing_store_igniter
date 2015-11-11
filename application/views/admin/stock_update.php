<?php echo validation_errors(); ?>

<?php

$attributes = array('class' => 'form');


echo form_open('stock/update/'. $item['id'], $attributes); ?>


<div class="form-group">
    <label for="size">Size</label>
    <select name="size" class="form-control">
        <option value="X-Large" <?php if($item['size']=="X-Large") echo "selected";  ?>>X-Large</option>
        <option value="Large" <?php if($item['size']=="Large") echo "selected";  ?>>Large</option>
        <option value="Medium" <?php if($item['size']=="Medium") echo "selected";  ?>>Medium</option>
        <option value="Small" <?php if($item['size']=="Small") echo "selected";  ?>>Small</option>
        <option value="X-Small" <?php if($item['size']=="X-Small") echo "selected";  ?>>X-Small</option>
    </select>
</div>
<div class="form-group">
    <label for="colour">Colour</label>
    <input type="input" name="colour" class="form-control" value="<?php echo $item['colour'] ?>" required placeholder="Colour" />
</div>

<div class="form-group">
    <label for="stock">Stock</label>
    <input type="input" name="stock" class="form-control" value="<?php echo $item['stock'] ?>" required placeholder="Stock" />
</div>


<div class="form-group registration_form">
    <input type="submit" name="submit" value="Update Stock" />
</div>


</form>