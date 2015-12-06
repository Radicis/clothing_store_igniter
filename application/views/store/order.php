<div class="login_left">
    <h3>Personal Details</h3>
    <div class="registration">
        <div class="registration_left">
            <div class="registration_form">
                <?php
                    $attributes = array('class' => 'form');
                    echo form_open('order/confirm_order', $attributes);

                $deliveryCost = 4.99;
                ?>
                    <input type="input" name="first_name" class="form-control" placeholder="First Name"   required/>
                    <input type="input" name="last_name" class="form-control" placeholder="Last Name"   required/>
                    <input type="email" name="email" class="form-control" placeholder="Email Address"   required/>

            </div>
        </div>
    </div>
    <h3>Payment Details</h3>
    <div class="registration">
        <div class="registration_left">
            <div class="registration_form">
                <input type="radio" name="payment" value="1" checked><img src="<?php echo base_url() . "images/paypal.png" ?>" width="100px" />
            </div>
        </div>
    </div>

    <h3>Delivery Type</h3>
    <div class="registration">
        <div class="registration_left">
            <div class="registration_form">
                <input type="radio" required name="deliveryID" value="1"  checked />Standard <em> &euro;4.99</em><br>
                <input type="radio" required name="deliveryID" value="2"  />Store Pickup <em> Free</em><br>
                <input type="radio" required name="deliveryID" value="3"  />International<em> &euro;10.99</em>
            </div>
        </div>
    </div>
    <h3>Delivery Details</h3>
    <div class="registration">
        <div class="registration_left">
            <div class="registration_form">
                <?php

                if($delivery_addresses==NULL){
                    echo "No addresses - Please add an address";
                }
                else {
                    //Display all of the users delivery addresses with radio buttons
                    foreach ($delivery_addresses as $address) {
                        if ($address['isDefault']) {
                            echo "<div class='order_address'><input type='radio' required  name='address' value='" . $address['id'] . "' checked><em>";
                            echo " Default Address</em>";
                        } else {
                            echo "<div class='order_address'><input type='radio' required  name='address' value='" . $address['id'] . "' >";
                        }
                        echo "<br>" . $address['address1'];
                        echo "<br>" . $address['address2'];
                        echo "<br>" . $address['city'];
                        echo "<br>" . $address['county'];
                        echo "<br>" . $address['country'] . "</div>";

                    }
                }

                ?>

                <input type="hidden" name="total_cost" value="<?php echo $this->cart->format_number($this->cart->total()); ?>" />

            </div>
        </div>
    </div>
    <div class="registration_form">
        <?php
        if($delivery_addresses==NULL){
            echo anchor('address/create', 'Add New');
       }else{ ?>
        <input type="submit" name="submit" value="Buy Now" />
        <?php } ?>

    </div>
    <!-- end registration -->
</div>
<div class="login_left">
    <div class="registration">
        <div class="registration_left">
            <div class="registration_form">
                <!-- Form -->
                <h3>Order Summary</h3>
                      <?php $i = 1; ?>

                    <?php foreach ($this->cart->contents() as $items): ?>

                        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>


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



                            <strong>Price:</strong> &euro;<?php echo $this->cart->format_number($items['price']); ?><br>
                            <strong>Subtotal: </strong> &euro;<?php echo $this->cart->format_number($items['subtotal']); ?><br>

                        <?php $i++; ?>

                        <hr>

                    <?php endforeach;


                    ?>
                       <div class="pull-right right">
                           <strong>Total</strong>&euro;<?php echo $this->cart->format_number($this->cart->total()); ?>
                       </div>

                <!-- /Form -->
            </div>
        </div>
    </div>
    <!-- end registration -->
</div>
<div class="clear"></div>