<?php echo validation_errors(); ?>

<?php

$attributes = array('class' => 'form');

echo form_open('brand/update/'. $brand['id'], $attributes); ?>

<div class="form-group">
    <label for="name">Name</label>
    <input type="input" name="name" class="form-control" value="<?php echo $brand['name'];  ?>" required />
</div>

<div class="registration_form">
<div class="form-group">
    <input type="submit" name="submit" value="Update item" />

</div>
</div>
</form>