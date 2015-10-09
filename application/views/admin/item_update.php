<?php echo validation_errors(); ?>

<?php

$attributes = array('class' => 'form');

echo form_open('store/update_item/'. $item['id'], $attributes); ?>

<div class="form-group">
    <label for="item_name">Name</label>
    <input type="input" name="item_name" class="form-control" value="<?php echo $item['item_name'];  ?>" />
</div>
<div class="form-group">
    <label for="item_price">Price</label>
    <input type="input" name="item_price" class="form-control" value="<?php echo $item['item_price'];  ?>" />
</div>
<div class="form-group">
    <label for="categoryID">Category</label>
    <select name="categoryID" class="form-control">
        <?php
        foreach($categories as $category){
            echo "<option value='". $category['id'] . "'";
            if($category['id'] === $item["categoryID"]){
                echo "selected";
            }
            echo ">" . $category['name'] . "</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="brandID">Brand</label>
    <select name="brandID" class="form-control">
        <?php
        foreach($brands as $brand){
            echo "<option value='". $brand['id'] . "'";
            if($brand['id'] === $item["brandID"]){
                echo "selected";
            }
            echo ">" . $brand['name'] . "</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="item_description">Description</label>
    <textarea name="item_description" class="form-control"><?php echo $item['item_description'];  ?></textarea>
</div>
<div class="form-group">
    <input type="submit" name="submit" value="Create item" />
</div>


</form>