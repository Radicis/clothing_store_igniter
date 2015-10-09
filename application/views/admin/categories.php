

<div class="row">
    <div class="col-md-3">
        <ul>
            <li><?php echo anchor('admin/show/items', 'Store Items'); ?></li>
            <li><?php echo anchor('admin/show/categories', 'Item Categories'); ?></li>
            <li><?php echo anchor('admin/show/brands', 'Brands'); ?></li>
            <li><?php echo anchor('admin/show/users', 'Users'); ?></li>
        </ul>
    </div>
    <div class="col-md-9">
        <div class="item-view">
            <?php

            //Change to flat table display of data
            //Add update/delete links maybe a copy link

            foreach($items as $item) {

            }

            echo "<div class='pagination'>" . $links . "</div>";

            ?>

        </div>