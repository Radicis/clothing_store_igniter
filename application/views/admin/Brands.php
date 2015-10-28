
        <h1>
            Brand View
            <?php echo anchor('brand/create', 'Create New'); ?>
        </h1>



            <table class="table table-striped item-list">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Operations</th>
                </tr>

                <?php

                foreach($items as $item) {
                    echo "<tr><td>" . $item->id . "</td><td>" . $item->name .  "</td>";
                    echo "<td>" . anchor('brand/update/'. $item->id, "Edit");
                    echo " | ";
                    echo anchor('brand/delete/'. $item->id, "Delete");
                    echo "</td></tr>";
                }


                ?>

            </table>

            <?php echo "<div class='pagination'>" . $links . "</div>"; ?>
