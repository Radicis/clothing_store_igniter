
<?php echo validation_errors(); ?>

<?php

$attributes = array('class' => 'form');

echo form_open('brand/create', $attributes); ?>

<div class="form-group">
    <label for="name">Name</label>
    <input type="input" name="name" class="form-control" required />
</div>


<div class="form-group registration_form">
    <input type="submit" name="submit" value="Create item" />
</div>


</form>
