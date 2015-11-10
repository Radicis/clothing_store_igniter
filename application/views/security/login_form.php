    <div class="login_left">
        <h3>new customers</h3>
        <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping address, view and track your orders in your accoung and more.</p>
        <div class="btn">
            <?php echo anchor('login/signup', 'Create Account',  array('class' => 'green_button')); ?>

        </div>
    </div>
    <div class="login_left">
        <h3>registered customers</h3>
        <p>if you have any account with us, please log in.</p>
        <!-- start registration -->
        <div class="registration">
            <div class="registration_left">
                <div class="registration_form">
                    <!-- Form -->
                    <h1>Login</h1>
                    <?php

                    echo form_open('login/validate_credentials');
                    echo form_input('username', '', 'placeholder="Username"');
                    echo form_password('password', '', 'placeholder="Password"');
                    echo form_submit('submit', 'login');

                    ?>
                    <!-- /Form -->
                </div>
            </div>
        </div>
        <!-- end registration -->
    </div>
    <div class="clear"></div>
