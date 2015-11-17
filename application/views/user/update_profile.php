<h3>Profile Page</h3>

<?php

echo "<h4>" . $user['username'] . "</h4>";
echo "<p>" . $user['email'] . "<br>";
echo $user['first_name'] . " " . $user['last_name'] . "<br>";
echo "<p>" . anchor('user/change_password', "Change Password") . "</p>";

if($addresses) {

    foreach ($addresses as $address) {
        echo "<p>" . $address['address1'] . "<br>";
        echo $address['address2'] . "<br>";
        echo $address['city'] . "<br>";
        echo $address['county'] . "<br>";
        echo $address['country'] . "<br>";
        echo "</p>";
    }
}

if($orders) {

    foreach ($orders as $order) {
        echo "<p>" . $order['date'] . "<br>";
        echo $order['first_name'] . "<br>";
        echo $order['last_name'] . "<br>";
        echo $order['email'] . "<br>";
        echo $order['total'] . "<br>";
        echo "</p>";
    }
}


?>