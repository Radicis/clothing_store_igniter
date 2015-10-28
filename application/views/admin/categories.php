<h1>
    Category View
    <?php echo anchor('category/create', 'Create New'); ?>
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
                            echo "<td>" . anchor('category/update/' . $item->id, "Edit");
                            echo " | ";
                            echo anchor('category/delete', "Delete");
                            echo "</td></tr>";
                        }


                        ?>

                    </table>

                    <?php echo "<div class='pagination'>" . $links . "</div>"; ?>

