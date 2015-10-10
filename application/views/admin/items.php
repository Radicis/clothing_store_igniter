<div class="col-md-9">
<section class="content-header">
    <h1>
        Dashboard
        <small>Item View</small>
    </h1>
</section>

<!-- Main content -->
<section class="content">
        <div class="item-view">
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
                    echo "<td>" . anchor('item/update_item/' . $item->id, "Edit");
                    echo " | ";
                    echo anchor('item/delete_item/' . $item->id, "Delete");
                    echo "</td></tr>";
                }


                ?>

            </table>

            <?php echo "<div class='pagination'>" . $links . "</div>"; ?>

        </div>