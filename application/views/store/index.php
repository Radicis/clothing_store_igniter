
<div class="row">
    <div class="col-md-3">
        <p class="lead">Filters</p>
        <div class="list-group">
            <a href="#" class="list-group-item">Category 1</a>
            <a href="#" class="list-group-item">Category 2</a>
            <a href="#" class="list-group-item">Category 3</a>
        </div>
        <ul>
            <li>
               <?php echo anchor('store/create_item', 'Create New Item'); ?>
            </li>
        </ul>
    </div>
    <div class="col-md-9">
        <?php

        foreach($items as $item) {
            echo "<div class='col-sm-4 col-lg-4 col-md-4' >";
                echo "<div class='thumbnail' >";
                    echo "<img src = 'http://placehold.it/320x150' alt = '' >";
                    echo  "<div class='caption' >";
                        echo "<h4 class='pull-right' >";
                            echo "$" . $item['item_price'] . "</h4>";
                            echo anchor('store/view/'.$item['id'], $item['item_name']);
                         echo "</h4 >";
                        echo "<p>". $item['item_description']. "</p></div>";
                    echo "<div class='ratings'><p>";
                    for($counter = 0; $counter< $item['rating']; $counter++){
                       echo "<span class='glyphicon glyphicon-star' ></span >";
                    }
            if($this->session->is_logged_in) {
                echo anchor('store/add_rating/' . $item['id'], "+");
                echo anchor('store/remove_rating/' . $item['id'], "-");
            }
                    echo "</p ></div ></div ></div >";
       }
        ?>
    </div>
</div>




