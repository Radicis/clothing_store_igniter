
        <h1>
            Brand View
            <small><?php echo anchor('brand/create', 'Create New'); ?></small>
        </h1>



            <table class="table table-striped item-list">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Operations</th>
                </tr>

                <?php
                if($items) {
                    foreach ($items as $item) {
                        echo "<tr><td>" . $item->id . "</td><td>" . $item->name . "</td>";
                        echo "<td>" . anchor('brand/update/' . $item->id, "Edit");
                        echo " | ";
                        echo anchor('brand/delete/' . $item->id, "Delete");
                        echo "</td></tr>";
                    }
                }

                ?>

            </table>

            <?php echo "<div class='pagination'>" . $links . "</div>"; ?>
