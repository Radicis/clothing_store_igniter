  <div class="row">
      <div class="col-md-3 admin-sidebar">
                <div class="list-group">

                        <?php
                        $attributes = array('class' => 'form-horizontal');
                        echo form_open('store/filter', $attributes); ?>
                        <fieldset>

                            <div class="input-group">
                                <input type="text" class="form-control" name="searchInput" placeholder="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
                            </div><!-- /input-group -->

                            <!-- Multiple Checkboxes -->
                            <h4>Category</h4>
                            <div class="form-group">
                                <?php foreach($categories as $category) { ?>
                                    <div class="checkbox checkbox-success">
                                        <label for="checkboxes-0">
                                            <input name="categories[]" value="<?php echo $category['id'] ?>" type="checkbox">
                                            <?php echo $category['name']?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>

                            <h4>Brand</h4>

                            <!-- Multiple Checkboxes -->
                            <div class="form-group">
                                <?php foreach($brands as $brand) { ?>
                                    <div class="checkbox">
                                        <label for="checkboxes-0">
                                            <input  name="brands[]" value="<?php echo $brand['id'] ?>" type="checkbox">
                                            <?php echo $brand['name']?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </fieldset>
                        <div class="form-group registration_form">
                            <input type="submit" name="submit" value="Apply" />
                        </div>
                    </form>
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


