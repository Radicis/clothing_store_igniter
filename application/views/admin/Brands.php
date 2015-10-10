
<div class="col-md-9">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Brands View</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="item-view">
            <table class="table table-striped item-list">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Operations</th>
                </tr>

                <?php

                foreach($items as $item) {
                    echo "<tr><td>" . $item->id . "</td><td>" . $item->name .  "</td>";
                    echo "<td>" . anchor('brand/update', "Edit");
                    echo " | ";
                    echo anchor('brand/update', "Delete");
                    echo "</td></tr>";
                }


                ?>

            </table>

            <?php echo "<div class='pagination'>" . $links . "</div>"; ?>
        </div>