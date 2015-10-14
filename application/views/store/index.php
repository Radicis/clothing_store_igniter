  <div class="row">
      <div class="col-md-3 admin-sidebar">
                <div class="list-group">
                    <ul class="category-select">
                        <h3>Categories</h3>
                    <?php

                    foreach($categories as $category) {
                        echo "<li>" . anchor('store/category/'. $category['id'], $category['name']) . "</li>";
                    }
                    ?>
                    </ul>
                    <hr>

                    <ul class="category-select">
                        <h3>Brands</h3>
                        <?php

                        foreach($brands as $brand) {
                            echo "<li>" . anchor('store/brand/'. $brand['id'], $brand['name']) . "</li>";
                        }
                        ?>
                    </ul>
                    <hr>
                    <ul class="category-select">
                        <h3>Price Range</h3>
                        <?php
                            echo "<li>" . anchor('store/price/2', 'Under &euro;2') . "</li>";
                            echo "<li>" . anchor('store/price/5', 'Under &euro;5') . "</li>";
                            echo "<li>" . anchor('store/price/10', 'Under &euro;10') . "</li>";
                            echo "<li>" . anchor('store/price/20', 'Under &euro;20') . "</li>";
                        ?>
                    </ul>
                    <hr>
                    <ul class="category-select">
                        <h3>Filter</h3>
                        <?php
                        echo "<li>" . anchor('store/filter/1/2', 'Test it') . "</li>";
                        ?>
                    </ul>
                 </div>
          </div>
      <div class="col-md-9">




          <!-- start grids_of_3 -->
          <div class="grids_of_3">
              <?php if($items!=null){
                  foreach($items as $item) { ?>
                      <div class="grid1_of_3">
                          <a href="<?php echo base_url() . 'index.php/item/view/'.$item->id ?>">
                              <img src="<?php echo base_url() . "images/clothes/" . $item->image_large; ?>"  alt=""/>
                              <h3><?php echo $item->item_name ?></h3>
                              <span class="price">&euro;<?php echo $item->item_price ?></span>
                          </a>
                      </div>

                  <?php }} ?>
              <div class="clear"></div>
              <?php echo "<div class='pagination'>" . $links . "</div>"; ?>
          </div>
      </div>
  </div>


