
<div class="login_left">
    <h3>Confirm Order</h3>
    <div class="registration">
        <div class="registration_left">
            <div class="registration_form">

                <?php echo form_open('order/create_order');

                ?>




                <?php $i = 1; ?>

                <?php foreach ($this->cart->contents() as $items): ?>

<p>
            <?php echo $items['qty']; ?>
                <?php echo $items['name']; ?>
                       <img class="thumbnail pull-right" src="<?php echo base_url() . "images/clothes/" . $items['image']; ?>" />


                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                    <p>
                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>

            &euro;<?php echo $this->cart->format_number($items['subtotal']); ?>

        </p>


        <?php $i++; ?>

        <hr>

    <?php endforeach; ?>



                <strong>Sub-Total: </strong>&euro;<?php echo $this->cart->format_number($this->cart->total()); ?>
                <br><strong>Delivery: </strong>&euro;<?php echo $delivery_cost; ?>
                <?php $total_cost = $total_cost+$delivery_cost; ?>
                <br><strong>Total: </strong>&euro;<?php echo $total_cost; ?>
                <?php

                echo "<input type='hidden' name='userID' value='" . $this->session->userdata('userID') . "'/>";
                echo "<input type='hidden' name='first_name' value='" . $this->input->post('first_name') . "'/>";
                echo "<input type='hidden' name='last_name' value='" . $this->input->post('last_name') . "'/>";
                echo "<input type='hidden' name='address' value='" . $this->input->post('address') . "'/>";
                echo "<input type='hidden' name='email' value='" . $this->input->post('email') . "'/>";
                echo "<input type='hidden' name='total_cost' value='" . $total_cost . "'/>";
                echo "<input type='hidden' name='deliveryID' value='" . $this->input->post('deliveryID') . "'/>";

                ?>
                <div class="registration_form">
                    <input type="submit" name="submit" value="Confirm" />
                </div>


            </div>
        </div>
    </div>
</div>
<div class="login_left">
    <div class="registration">
        <div class="registration_left">
            <div class="registration_form">
                <!-- Form -->
                <h3>Delivery Details</h3>
                <?php

                echo $first_name . " " . $last_name . "<br>";
                echo $email . "<hr>";
                echo $address['address1'] . "<br>";
                echo $address['address2'] . "<br>";
                echo $address['city'] . "<br>";
                echo $address['county'] . "<br>";
                echo $address['country'] ;
?>


            </div>
        </div>
    </div>
    <!-- end registration -->
</div>
<div class="clear"></div>






