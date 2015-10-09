Item View
<hr>

<?php

if($item) {

    echo "<p>Name: " . $item['item_name'] . "</p>";
    echo "<p>Category: " . $category['name']."</p>";
    echo "<p>Brand: " . $brand['name']."</p>";
}

?>

<a href="javascript:window.history.go(-1);">Back</a>
