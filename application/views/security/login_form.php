
    <div class="registration_form">
        <h1>Login</h1>
        <?php

        echo form_open('login/validate_credentials');
        echo form_input('username', '', 'placeholder="Username"');
        echo form_password('password', '', 'placeholder="Password"');
        echo form_submit('submit', 'login');

        echo anchor('login/signup', 'Create Account');

        ?>
    </div>

<div class="clear"></div>
