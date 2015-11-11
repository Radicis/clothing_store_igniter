<div class=registration_form">

<h1>Shopping Cart</h1>

<table class="table table-striped item-list" cellpadding="6" cellspacing="1" style="width:100%" border="0">

    <tr>
        <th></th>
        <th>Qty</th>
        <th>Image</th>
        <th>Item Name</th>
        <th style="text-align:right">Item Price</th>
        <th style="text-align:right">Sub-Total</th>
    </tr>

    <?php $i = 1; ?>

    <?php foreach ($this->cart->contents() as $items): ?>

        <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>

        <tr>
            <td><?php
                //echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3', 'size' => '5'));
                echo anchor('store/remove_from_cart/'. $items['rowid'], 'X', array('class' =>'remove'));
                ?></td>
            <td><?php echo $items['qty']; ?></td>
            <td><img class="thumbnail" src="<?php echo base_url() . "images/clothes/" . $items['image']; ?>" /></td>
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
        <td colspan="4"> </td>
        <td style="text-align:right"><strong>Total</strong></td>
        <td style="text-align:right">&euro;<?php echo $this->cart->format_number($this->cart->total()); ?></td>
    </tr>

</table>
<div class="pull-right">
    <?php echo anchor('store/empty_cart', 'Empty Cart', array('class' => 'green_button')); ?> <?php echo anchor('order/order', 'Checkout', array('class' => 'green_button')); ?>
</div>

    </div>
