
<?php echo validation_errors(); ?>

<?php

$attributes = array('class' => 'form');

echo form_open('category/update/'. $thisCategory['id'], $attributes); ?>

<div class="form-group">
    <label for="name">Name</label>
    <input type="input" name="name" class="form-control" value="<?php echo $thisCategory['name'];  ?>" required />
</div>

<div class="form-group">
    <label for="parentID">Category</label>
    <select name="parentID" class="form-control">
        <?php

        echo "<option value='0'>None</option>";

        foreach($categories as $category){
            echo "<option value='". $category['id'] ;
            if($category['id'] === $thisCategory["categoryID"]){
                echo "selected";
            }
            echo "'>" . $category['name'] . "</option>";
        }
        ?>
    </select>
</div>


<div class="form-group registration_form">
    <input type="submit" name="submit" value="Update Category" />
</div>


</form>
