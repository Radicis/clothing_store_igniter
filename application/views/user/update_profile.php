<h3>Update Personal Details</h3>

<?php echo validation_errors(); ?>

<?php

$attributes = array('class' => 'form');

echo form_open('user/update/' . $user['id'], $attributes); ?>

<div class="form-group">
    <label for="first_name">First Name</label>
    <input type="input" name="first_name" class="form-control" required value="<?php echo $user['first_name']; ?>" placeholder="First Name" />
</div>
<div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="input" name="last_name" class="form-control" value="<?php echo $user['last_name']; ?>" placeholder="Last Name" />
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input type="input" name="email" class="form-control" required value="<?php echo $user['email']; ?>" placeholder="Email" />
</div>
<hr>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" required value="<?php echo $user['password']; ?>" placeholder="Password" />
</div>
<div class="form-group">
    <label for="password2">Confirm Password</label>
    <input type="password" name="password2" class="form-control" required value="<?php echo $user['password']; ?>" placeholder="Password Confirmation" />
</div>


<div class="form-group registration_form">
    <input type="submit" name="submit" value="Update" />
</div>
