<h1>
    Order Detail View
</h1>

<?php

echo "<strong>Date: </strong>" . $order['date'];
echo "<br><strong>Delivery Type: </strong>" . $order['deliveryType'];
echo "<br><strong>Is Paid: </strong>" . $order['isPaid'];
echo "<hr><strong>First Name: </strong>" . $order['first_name'];
echo "<br><strong>Last Name: </strong>" . $order['last_name'];
echo "<br><strong>Email: </strong>" . $order['email'];
echo "<hr>";
echo "<h3>Delivery Address</h3><br><strong>Address1: </strong>" . $address['address1'];
echo "<br><strong>Address2: </strong>" . $address['address2'];
echo "<br><strong>City: </strong>" . $address['city'];
echo "<br><strong>County: </strong>" . $address['county'];
echo "<br><strong>Country: </strong>" . $address['country'];
echo "<hr>";
echo "<h3>Order Items</h3><br>";
foreach($order_items as $item){
    echo "<strong>".$item->name."</strong> x" . $item->qty . " -> &euro;" . $item->subtotal ."<br>";
}
echo "<hr><strong>Total: </strong>&euro;" . $order['total'];

?>

