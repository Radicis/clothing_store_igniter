
                    <table class="table table-striped item-list">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>

                        </tr>

                        <?php

                        foreach($items as $item) {
                            echo "<tr><td>" . $item->id . "</td>";
                            echo "<td>" . $item->username . "</td></t>";
                        }

                        //Change to flat table display of data
                        //Add update/delete links maybe a copy link
                        echo "</table>";

                        echo "<div class='pagination'>" . $links . "</div>";

                        ?>

