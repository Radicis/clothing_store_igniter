<h1>
    Category View
    <small><?php echo anchor('category/create', 'Create New'); ?></small>
</h1>

                    <table class="table table-striped item-list">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Parent Category</th>
                            <th>Operations</th>
                        </tr>

                        <?php
                        if($items) {
                            foreach ($items as $item) {
                                $parent = false;
                                echo "<tr><td>" . $item->id . "</td><td>" . $item->name . "</td>";
                                foreach ($categories as $category) {
                                    if ($category['id'] == $item->parentID) {
                                        echo "<td>" . $category['name'] . "</td>";
                                        $parent = true;
                                    }
                                }
                                if (!$parent) {
                                    echo "<td>" . "None" . "</td>";
                                }


                                echo "<td>" . anchor('category/update/' . $item->id, "Edit");
                                echo " | ";
                                echo anchor('category/delete/' . $item->id, "Delete");
                                echo "</td></tr>";
                            }

                        }
                        ?>

                    </table>

                    <?php echo "<div class='pagination'>" . $links . "</div>"; ?>

