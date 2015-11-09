<div class=registration_form">

<h1>Shopping Cart</h1>

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
<div class="green_button pull-right">
    <?php echo anchor('store/empty_cart', 'Empty Cart'); ?> <?php echo anchor('store/order', 'Checkout'); ?>
</div>

    </div>
