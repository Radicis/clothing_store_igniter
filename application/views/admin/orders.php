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
                    <th>Operations</th>
                </tr>

                <?php

                if($items) {
                    foreach ($items as $item) {
                        echo "<tr><td>" . $item->id . "</td><td>" . date("d/m/Y h:ia",strtotime($item->date)) . "</td>";
                        echo "<td>" . $item->userID . "</td>";
                        if($item->isPaid) {
                            echo "<td class='alert-success'>Paid</td>";
                        }
                        else{
                            echo "<td class='alert-danger'>Awaiting Payment</td>";
                        }
                        echo "<td>&euro;" . $item->total . "</td>";
                        echo "<td>" . $item->first_name . "</td>";
                        echo "<td>" . $item->last_name . "</td>";
                        echo "<td>" . $item->email . "</td>";
                        echo "<td>" . anchor('order/delete/' . $item->id, "Delete");
                        echo " | ";
                        echo anchor('order/view/' . $item->id, "View Details");
                        echo "</td></tr>";
                    }
                }


                ?>

            </table>

            <?php echo "<div class='pagination'>" . $links . "</div>"; ?>

