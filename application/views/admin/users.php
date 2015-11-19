
                    <table class="table table-striped item-list">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Type</th>
                            <th>Operations</th>
                        </tr>

                        <?php
                        if($items) {
                            foreach ($items as $user) {
                                echo "<tr><td>" . $user->id . "</td>";
                                echo "<td>" . $user->username . "</td>";
                                echo "<td>";
                                if ($user->isAdmin) echo '<strong>Admin</strong>';
                                else echo "User";
                                echo "</td>";
                                echo "<td>" . anchor('user/edit/' . $user->id, "Edit");
                                echo " | ";
                                echo anchor('user/delete/' . $user->id, "Delete");
                                echo "</td></tr>";
                            }
                        }

                        echo "</table>";

                        echo "<div class='pagination'>" . $links . "</div>";

                        ?>

