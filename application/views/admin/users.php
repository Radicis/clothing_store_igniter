
                    <table class="table table-striped item-list">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Operations</th>
                        </tr>

                        <?php

                        foreach($items as $item) {
                            echo "<tr><td>" . $item->id . "</td>";
                            echo "<td>" . $item->username . "</td></t>";
                            echo "<td>" . anchor('category/', "Edit");
                            echo " | ";
                            echo anchor('category/delete', "Delete");
                            echo "</td></tr>";
                        }

                        //Change to flat table display of data
                        //Add update/delete links maybe a copy link
                        echo "</table>";

                        echo "<div class='pagination'>" . $links . "</div>";

                        ?>

