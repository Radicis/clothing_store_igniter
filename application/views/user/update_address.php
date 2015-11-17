
<?php echo validation_errors(); ?>

<?php

$attributes = array('class' => 'form');

echo form_open('address/update/' . $address['id'], $attributes); ?>


<div class="form-group">
    <label for="address1">Address 1</label>
    <input type="input" name="address1" class="form-control" required value="<?php echo $address['address1']; ?>" placeholder="Address 1" />
</div>
<div class="form-group">
    <label for="address2">Address 2</label>
    <input type="input" name="address2" class="form-control" value="<?php if(isset($address['address2']))echo $address['address2']; ?>" placeholder="Address 2" />
</div>
<div class="form-group">
    <label for="city">City</label>
    <input type="input" name="city" class="form-control" required value="<?php echo $address['city']; ?>" placeholder="City" />
</div>
<div class="form-group">
    <label for="county">County</label>
    <input type="input" name="county" class="form-control" required value="<?php echo $address['county']; ?>" placeholder="County" />
</div>
<div class="form-group">
    <label for="country">Country</label>
    <input type="input" name="country" class="form-control" value="<?php echo $address['country']; ?>" required placeholder="Country" />
</div>


<div class="form-group registration_form">
    <input type="submit" name="submit" value="Update Address" />
</div>


</form>
