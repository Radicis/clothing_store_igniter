
                    <table class="table table-striped item-list">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Type</th>
                            <th>Operations</th>
                        </tr>

                        <?php

                        foreach($items as $user) {
                            echo "<tr><td>" . $user->id . "</td>";
                            echo "<td>" . $user->username . "</td>";
                            echo "<td>";
                            if($user->isAdmin) echo '<strong>Admin</strong>';
                            else echo "User";
                            echo "</td>";
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

