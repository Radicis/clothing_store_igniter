
    <div class="pull_left">
        <div class="registration_form">
<h1>Create an Account</h1>

<fieldset>
    <legend>Personal Information</legend>

    <?php

    echo form_open('login/create_member');
    echo form_input('first_name', '', 'placeholder="First Name"');
    echo form_input('last_name', '', 'placeholder="Last Name"');
    echo form_input('email', '', 'placeholder="Email Address"');
    ?>

</fieldset>

<fieldset>
    <legend>User info</legend>
        <?php

        echo form_input('username', '', 'placeholder="Username"');
        echo form_input('password', '', 'placeholder="Password"');
        echo form_input('password2', '', 'placeholder="Confirm Password"');

        echo form_submit('submit', 'Create Account');

        ?>

        <?php
        echo validation_errors('<p class="error">');
        ?>

</fieldset>
    </div>
    </div>

<div class="clear"></div>