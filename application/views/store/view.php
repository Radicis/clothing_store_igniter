
<!-- start content -->
<div class="single">
    <!-- start span1_of_1 -->
    <div class="left_content">
        <div class="span1_of_1">
            <!-- start product_slider -->
            <div class="product-view">
                <div class="product-essential">
                    <div class="product-img-box">
                        <div class="more-views">
                            <div class="more-views-container">
                                <ul>
                                    <li>
                                        <a class="cs-fancybox-thumbs" data-fancybox-group="thumb"  href=""  title="" alt="">
                                            <img src="" src_main=""  title="" alt="" /></a>
                                    </li>
                                    <li>
                                        <a class="cs-fancybox-thumbs" data-fancybox-group="thumb" href=""  title="" alt="">
                                            <img src="" src_main=""  title="" alt="" /></a>
                                    </li>
                                    <li>
                                        <a class="cs-fancybox-thumbs" data-fancybox-group="thumb"  href=""  title="" alt="">
                                            <img src="" src_main=""  title="" alt="" /></a>
                                    </li>
                                    <li>
                                        <a class="cs-fancybox-thumbs" data-fancybox-group="thumb" href=""  title="" alt="">
                                            <img src="" src_main="" title="" alt="" /></a>
                                    </li>
                                    <li>
                                        <a class="cs-fancybox-thumbs" data-fancybox-group="thumb"  href=""  title="" alt="">
                                            <img src="" src_main="" title="" alt="" /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-image">
                            <a>
                                <img src="<?php echo base_url() . "images/clothes/" . $item['image_large']; ?>" />
                            </a>
                        </div>
                        <div class="product-image-box">

                        </div>
                    </div>
                </div>
            </div>
            <!-- end product_slider -->
        </div>
        <!-- start span1_of_1 -->
        <div class="span1_of_1_des">
            <div class="desc1">
                <h3><?php echo $item['item_name']; ?></h3>
                <h5>&euro;<?php echo $item['item_price']; ?></h5>
                <div class="available">
                    <?php if($stock){
                        echo form_open('store/add_to_cart'); ?>
                        <select name="stock">
                            <?php foreach($stock as $variation){
                                echo "<option value='"  . $variation['id'] . "'>" . $variation['colour'] . " - " . $variation['size'] .   "</option>";
                            }
                            ?>
                        </select>

                    <div class="green_button">

                            <?php
                            echo form_submit('submit', 'Add To Cart');
                            echo anchor('store/add_to_cart/' . $item['id'], 'Add To Cart');
                            echo form_close();?>
                    </div>
                    <?php }
                    else{
                        echo '<h3>Currently Unavailable</h3>';
                    }

                    ?>
                    <p><?php echo $item['item_description_short']; ?></p>
                </div>

            </div>
        </div>
        <div class="clear"></div>
        <!-- start left content_bottom -->
        <div class="left_content_btm">
            <h1>Description</h1><p class="para"><?php echo $item['item_description']; ?></p>
            <!-- start tabs -->

            <!-- end tabs -->
        </div>
        <!-- end left content_bottom -->
    </div>
    <!-- start left_sidebar -->
    <div class="left_sidebar">

        <h4>recent products</h4>
		<?php
			  foreach($recent_items as $item){
					?>
        <div class="left_products">
            <div class="left_img">
                <img src="<?php echo base_url() . "images/clothes/" . $item->image_large; ?>" alt=""/>
            </div>
					<div class="left_text">
						<p><?php echo anchor('item/view/' . $item->id, $item->item_name) ?></p>
						<span>&euro;<?php echo $item->item_price ?></span>
					</div>
					<div class="clear"></div>				
        </div>
		<?php } ?>
       
    </div>
    <div class="clear"></div>
</div>
<!-- end content -->