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
        <h1>Brands</h1>
        <table class="table table-striped item-list">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Operations</th>
            </tr>

            <?php

            foreach($items as $item) {
                echo "<tr><td>" . $item->id . "</td><td>" . $item->name .  "</td>";
                echo "<td>" . anchor('category/edit', "Edit");
                echo " | ";
                echo anchor('category/delete', "Delete");
                echo "</td></tr>";
            }


            ?>

        </table>

        <?php echo "<div class='pagination'>" . $links . "</div>"; ?>
    </div>

</div>