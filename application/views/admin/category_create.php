
<?php echo validation_errors(); ?>

<?php

$attributes = array('class' => 'form');

echo form_open('category/create', $attributes); ?>

<div class="form-group">
    <label for="name">Name</label>
    <input type="input" name="name" class="form-control" required placeholder="Name" />
</div>

<div class="form-group">
    <label for="parentID">Category</label>
    <select name="parentID" class="form-control">
        <?php

        echo "<option value='0'>None</option>";

        foreach($categories as $category){
            echo "<option value='". $category['id'] . "'>" . $category['name'] . "</option>";
        }
        ?>
    </select>
</div>


<div class="form-group registration_form">
    <input type="submit" name="submit" value="Create Category" />
</div>


</form>
