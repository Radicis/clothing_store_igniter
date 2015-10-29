
<?php echo validation_errors(); ?>

<?php

$attributes = array('class' => 'form');

echo form_open('item/create_item', $attributes); ?>

<div class="form-group">
    <label for="item_name">Name</label>
    <input type="input" name="item_name" class="form-control"  required />
</div>
<div class="form-group">
    <label for="item_price">Price</label>
    <input type="input" name="item_price" class="form-control"  required/>
</div>
<div class="form-group">
    <label for="categoryID">Category</label>
    <select name="categoryID" class="form-control">
        <?php
        foreach($categories as $category){
            echo "<option value='". $category['id'] . "'>" . $category['name'] . "</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="brandID">Brand</label>
    <select name="brandID" class="form-control">
        <?php
        foreach($brands as $brand){
            echo "<option value='". $brand['id'] . "'>" . $brand['name'] . "</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="image_large">Image Filename</label>
    <input type="text" name="image_large" class="form-control">
</div>
<div class="form-group">
    <label for="item_description">Description</label>
    <textarea name="item_description" class="form-control"></textarea>
</div>


<div class="form-group registration_form">
    <input type="submit" name="submit" value="Create item" />
</div>


</form>
