
<div class="row">
    <div class="col-md-3">
        <p class="lead">Filters</p>
        <div class="list-group">
            <ul class="category-select">
                <h3>Categories</h3>

            <?php

            foreach($categories as $category) {
                echo "<li>" . anchor('store/category/'. $category['id'], $category['name']) . "</li>";
            }
            ?>
            </ul>

            <ul class="category-select">
                <h3>Brands</h3>
                <?php

                foreach($brands as $brand) {
                    echo "<li>" . anchor('store/brand/'. $brand['id'], $brand['name']) . "</li>";
                }
                ?>
            </ul>

            <ul class="category-select">
                <h3>Price Range</h3>
                <?php
                    echo "<li>" . anchor('store/price/2', 'Under &euro;2') . "</li>";
                    echo "<li>" . anchor('store/price/5', 'Under &euro;5') . "</li>";
                    echo "<li>" . anchor('store/price/10', 'Under &euro;10') . "</li>";
                    echo "<li>" . anchor('store/price/20', 'Under &euro;20') . "</li>";
                ?>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
       <div class="item-view">
        <?php

        if($items!=null) {

            foreach ($items as $item) {
                echo "<div class='col-sm-4 col-lg-4 col-md-4' >";
                echo "<div class='thumbnail' >";
                echo "<img src = 'http://placehold.it/320x150' alt = '' >";
                echo "<div class='caption' >";
                echo "<h4 class='pull-right' >";
                echo "$" . $item->item_price . "</h4>";
                echo anchor('item/view/' . $item->id, $item->item_name);
                echo "</h4 >";
                echo "<p>" . $item->item_description . "</p></div>";
                echo "<div class='ratings'><p>";
                for ($counter = 0; $counter < $item->rating; $counter++) {
                    echo "<span class='fa fa-thumbs-up' ></span>";
                }
                if ($this->session->is_logged_in) {
                    echo "<span class='rating-icons'>";
                    echo anchor('item/add_rating/' . $item->id, "<i class='rate fa fa-thumbs-up'></i>");
                    echo anchor('item/remove_rating/' . $item->id, "<i class='rate fa fa-thumbs-down'></i>");
                    echo "</span>";
                }
                echo "</p ></div ></div ></div>";
            }
        }

        echo "<div class='pagination'>" . $links . "</div>";

        ?>

</div>




