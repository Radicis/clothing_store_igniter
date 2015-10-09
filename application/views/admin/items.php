

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
            <h1>Items</h1>
            <table class="table table-striped item-list">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Rating</th>
                    <th>Description</th>
                    <th>Operations</th>
                </tr>

                <?php

                foreach($items as $item) {
                    echo "<tr><td>" . $item->id . "</td><td>" . $item->item_name .  "</td>";
                    echo "<td>&euro;" . $item->item_price . "</td><td>" . $item->categoryID .  "</td>";
                    echo "<td>" . $item->brandID . "</td><td>" . $item->rating .  "</td>";
                    echo "<td class='description'>" . $item->item_description . "</td>";
                    echo "<td>" . anchor('store/update_item/' . $item->id, "Edit");
                    echo " | ";
                    echo anchor('store/delete_item/' . $item->id, "Delete");
                    echo "</td></tr>";
                }


                ?>

            </table>

            <?php echo "<div class='pagination'>" . $links . "</div>"; ?>

        </div>