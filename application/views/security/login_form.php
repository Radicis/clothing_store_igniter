
<div class="contact"
<div class="login_left">
    <div class="registration_form">
        <h1>Login</h1>
        <?php

        echo form_open('login/validate_credentials');
        echo form_input('username', '');
        echo form_password('password', '');
        echo form_submit('submit', 'login');

        echo anchor('login/signup', 'Create Account');

        ?>
    </div>
</div>
</div>
