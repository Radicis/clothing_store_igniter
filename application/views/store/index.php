Store index
<hr>

<?php

foreach ($items as $item) {
    echo "<p>". $item['item_name'] . " - " .   anchor('store/view/'.$item['id'], 'View'). "</p>";

}

?>
