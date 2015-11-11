<h1>
    Order View
</h1>
            <table class="table table-striped item-list">
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>UserID</th>
                    <th>Paid</th>
                    <th>Total</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>

                <?php

                if($items) {
                    foreach ($items as $item) {
                        echo "<tr><td>" . $item->id . "</td><td>" . $item->date . "</td>";
                        echo "<td>" . $item->userID . "</td><td>" . $item->isPaid . "</td><td>&euro;" . $item->total . "</td>";
                        echo "<td>" . $item->first_name . "</td>";
                        echo "<td>" . $item->last_name . "</td>";
                        echo "<td>" . anchor('order/update/' . $item->id, "Edit");
                        echo " | ";
                        echo anchor('order/delete/' . $item->id, "Delete");
                        echo " | ";
                        echo anchor('order/view/' . $item->id, "View Details");
                        echo "</td></tr>";
                    }
                }


                ?>

            </table>

            <?php echo "<div class='pagination'>" . $links . "</div>"; ?>

