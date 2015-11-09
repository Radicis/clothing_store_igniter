<div class=registration_form">

<h1>Confirm</h1>

    <?php echo form_open('store/create_order'); ?>


    <?php $i = 1; ?>

    <?php foreach ($this->cart->contents() as $items): ?>

<p>
            <?php echo $items['qty']; ?>
                <?php echo $items['name']; ?>

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

    <?php endforeach; ?>



    &euro;<?php echo $this->cart->format_number($this->cart->total()); ?>




        <h2>Delivery Information</h2>

        <?php

        echo $first_name . " " . $last_name . "<br>";
        echo $email . "<br><hr>";
        echo $address['address1'] . "<br>";
        echo $address['address2'] . "<br>";
        echo $address['city'] . "<br>";
        echo $address['county'] . "<br>";
        echo $address['country'] ;

        ?>



    <div class="green_button">
        <input type="submit" name="submit" value="Confirm" />
    </div>

    </div>
