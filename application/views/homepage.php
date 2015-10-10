<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="col-md-12">

            <div class="row carousel-holder">

                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">

                            </div>
                            <div class="item">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="http://placehold.it/800x300" alt="">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>

            </div>

            <?php

            foreach($items as $item) {
                echo "<div class='col-sm-4 col-lg-4 col-md-4' >";
                echo "<div class='thumbnail' >";
                echo "<img src = 'http://placehold.it/320x150' alt = '' >";
                echo  "<div class='caption' >";
                echo "<h4 class='pull-right' >";
                echo "$" . $item->item_price . "</h4>";
                echo anchor('item/view/'.$item->id, $item->item_name);
                echo "</h4 >";
                echo "<p>". $item->item_description . "</p></div>";
                echo "<div class='ratings'><p>";
                for($counter = 0; $counter< $item->rating; $counter++){
                    echo "<span class='glyphicon glyphicon-star' ></span >";
                }
                if($this->session->is_logged_in) {
                    echo "<span class='rating-icons'>";
                    echo anchor('item/add_rating/' . $item->id, "<i class='rate fa fa-thumbs-up'></i>");
                    echo anchor('item/remove_rating/' . $item->id, "<i class='rate fa fa-thumbs-down'></i>");
                    echo "</span>";
                }
                echo "</p ></div ></div ></div>";
            }
            ?>
        </div>

    </div>

</div>