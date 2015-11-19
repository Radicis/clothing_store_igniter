

<div class="login_left">
    <div class="registration">
        <div class="registration_left">
            <h3>Personal Details<?php echo  anchor('user/delete/' . $user['id'], "Delete", array('class'=>'add_new pull-right delete_account')) . "<span class='pull-right add_new'> | </span>" .  anchor('user/update/' . $this->session->userdata('userID'), 'Edit', array('class'=>'add_new pull-right')) ?></h3>
<?php
echo "<h4>" . $user['username'] . "</h4>";
echo "<p>" . $user['email'] . "<br>";
echo $user['first_name'] . " " . $user['last_name'] . "<br>" ?>
        </div>
    </div>
    <div class="registration">
        <h3>Orders</h3>
        <div class="registration_left scrolling">

    <?php

    if($orders) {

        foreach ($orders as $order) {
            echo anchor('order/user_view/' . $order['id'], 'View', array('class'=>'pull-right'));
            echo "<p>" . $order['date'] . "<br>";
            if($order['isPaid']) {
                echo "<span class='alert-success'>Paid</span><br>";
            }
            else{
                echo "<span class='alert-danger'>Awaiting Payment</span><br>";
            }
            echo $order['first_name'] . "<br>";
            echo $order['last_name'] . "<br>";
            echo $order['email'] . "<br>";
            echo $order['total'] . "<br>";

            echo "</p><hr>";
        }
    }
    ?></div></div>


</div>

<div class="login_left">
    <div class="registration">
        <h3>Addresses<?php echo anchor('address/create', 'Add New', array('class'=>'add_new pull-right')) ?></h3>
        <div class="registration_left scrolling">


<?php
if($addresses) {

    foreach ($addresses as $address) {
        if ($address['isDefault']) {
            echo "<em class='pull-right'>Default Address</em>";
        }
        else{
            echo anchor('address/makeDefault/' . $address['id'], "Make Default", array('class'=>'pull-right'));
        }
        echo "<p>" . $address['address1'] . "<br>";
        echo $address['address2'] . "<br>";
        echo $address['city'] . "<br>";
        echo $address['county'] . "<br>";
        echo $address['country'] . "<br>";
        echo anchor('address/update/' . $address['id'], 'Edit', array('class'=>'pull-right'));
        echo "<span class='pull-right'> | </span>";
        echo anchor('address/delete/' . $address['id'], 'Delete', array('class'=>'pull-right'));
        echo "</p><hr>";
    }
}?>

    </div></div></div>


<div class="clear"></div>

