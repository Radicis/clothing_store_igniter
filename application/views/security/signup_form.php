
<?php
echo validation_errors('<p class="error">');
?>
    <div class="pull_left">
        <div class="registration_form">
<h1>Create an Account</h1>

<fieldset>
    <legend>Personal Information</legend>

    <?php
    echo form_open('login/create_member');
    ?>
    <input type="input" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $first_name ?>"   required/>
     <input type="input" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $last_name ?>"  required/>
     <input type="email" name="email" class="form-control" placeholder="Email Address" value="<?php echo $email ?>"   required/>
</fieldset>

<fieldset>
    <legend>User info</legend>

    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $username ?>"   required/>
    <input type="password" name="password" class="form-control" placeholder="Password"   required/>
    <input type="password" name="password2" class="form-control" placeholder="Password Confirmation"  required/>
        <?php
        echo form_submit('submit', 'Create Account');

        ?>



</fieldset>
    </div>
    </div>

<div class="clear"></div>