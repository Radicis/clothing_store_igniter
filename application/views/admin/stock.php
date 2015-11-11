<h1>
    Stock View
    <small><?php echo anchor('stock/create/' . $itemID, 'Create New'); ?></small>
</h1>
            <table class="table table-striped item-list">
                <tr>
                    <th>ID</th>
                    <th>Size</th>
                    <th>Colour</th>
                    <th>Stock</th>
                    <th>Operations</th>
                </tr>

                <?php
                if($stock) {
                    foreach ($stock as $item) {
                        echo "<tr><td>" . $item['id'] . "</td><td>" . $item['size'] . "</td>";
                        echo "<td>" . $item['colour'] . "</td>";
                        echo "<td>" . $item['stock'] . "</td>";
                        echo "<td>" . anchor('stock/update/' . $item['id'], "Edit");
                        echo " | ";
                        echo anchor('stock/delete/' . $item['id'], "Delete");
                        echo "</td></tr>";
                    }

                }
                ?>

            </table>


