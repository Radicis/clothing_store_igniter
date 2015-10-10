



        <div class="col-md-9">
            <section class="content-header">
                <h1>
                    User View
                </h1>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="item-view">
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

                        echo "<div class='pagination'>" . $links . "</div>";

                        ?>

                </div>