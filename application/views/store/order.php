<div class=registration_form">

<h1>Order Form</h1>

<table class="table table-striped item-list" cellpadding="6" cellspacing="1" style="width:100%" border="0">

    <tr>
        <th>QTY</th>
        <th>Item Name</th>
        <th style="text-align:right">Item Price</th>
        <th style="text-align:right">Sub-Total</th>
    </tr>

    <?php $i = 1; ?>

    <?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
            <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5')); ?></td>
            <td>
                <?php echo $items['name']; ?>

                <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                    <p>
                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                            <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                        <?php endforeach; ?>
                    </p>

                <?php endif; ?>

            </td>
            <td style="text-align:right">&euro;<?php echo $this->cart->format_number($items['price']); ?></td>
            <td style="text-align:right">&euro;<?php echo $this->cart->format_number($items['subtotal']); ?></td>
        </tr>

        <?php $i++; ?>

    <?php endforeach; ?>

    <tr>
        <td colspan="2"> </td>
        <td style="text-align:right"><strong>Total</strong></td>
        <td style="text-align:right">&euro;<?php echo $this->cart->format_number($this->cart->total()); ?></td>
    </tr>

</table>
    <?php echo form_open('store/confirm_order'); ?>
    <fieldset>
        <legend>Personal Information</legend>

        <?php


        echo form_input('first_name', set_value('first_name', 'First Name'));
        echo "<br>";
        echo form_input('last_name', set_value('last_name', 'Last Name'));
        echo "<br>";
        echo form_input('email', set_value('email', 'Email'));

        echo "<div class='pull-right'>";

        //Display all of the users delivery addresses with radio buttons
        foreach($delivery_addresses as $address) {
            if ($address['isDefault']) {
                echo "<div class='order_address'><input type='radio' name='address' value='" . $address['id'] . "' checked><strong>";
                echo "Default Address</strong>";
            }
            else{
                echo "<div class='order_address'><input type='radio' name='address' value='" . $address['id'] . "' >";
            }
            echo  "<br>" . $address['address1'];
            echo "<br>" . $address['address2'];
            echo "<br>" . $address['city'];
            echo "<br>" . $address['county'];
            echo "<br>" . $address['country'] . "</div>";
        }

        echo "</div>";

        ?>

        <div class="green_button">
            <input type="submit" name="submit" value="Buy Now" />
        </div>

    </fieldset>
        </form>

    </div>
