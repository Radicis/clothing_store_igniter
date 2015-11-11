<h1>Instagram Gallery</h1>

<div class="gallery">

<?php
foreach($images as $image){
    echo "<a href='". $image['high'] . "'  data-featherlight='image'><img src='". $image['low']. "'/></a>";
}

?>

</div>
