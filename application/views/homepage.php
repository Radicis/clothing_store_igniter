<!-- start slider -->
<div class="slider">
    <!---start-image-slider---->
    <div class="image-slider">
        <div class="wrapper">
            <div id="ei-slider" class="ei-slider">
                <ul class="ei-slider-large">
                    <li>
                        <img src="<?php echo base_url();?>images/slider-image1.jpg" alt="image06"/>
                        <div class="ei-title">
                             <h2>Stinky Pants <br>	2015 collection</h2>
                            <h3 class="active">It is a long established fact that a reader<br>
                                Lorem Ipsum is that it has a more-or-less
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="<?php echo base_url();?>images/slider-image2.jpg" alt="image01" />
                        <div class="ei-title">
                            <h2>pink shoes <br>	2013 collections</h2>
                            <h3 class="active">It is a long established fact that a reader<br>
                                Lorem Ipsum is that it has a more-or-less
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="<?php echo base_url();?>images/slider-image3.jpg" alt="image02" />
                        <div class="ei-title">
                            <h2>pink shoes <br>	2013 collections</h2>
                            <h3 class="active">It is a long established fact that a reader<br>
                                Lorem Ipsum is that it has a more-or-less
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="<?php echo base_url();?>images/slider-image4.jpg" alt="image03"/>
                        <div class="ei-title">
                             <h2>pink shoes <br>	2013 collections</h2>
                            <h3 class="active">It is a long established fact that a reader<br>
                                Lorem Ipsum is that it has a more-or-less
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="<?php echo base_url();?>images/slider-image1.jpg" alt="image04"/>
                        <div class="ei-title">
                            <h2>pink shoes <br>	2013 collections</h2>
                            <h3 class="active">It is a long established fact that a reader<br>
                                Lorem Ipsum is that it has a more-or-less
                            </h3>
                        </div>
                    </li>
                    <li>
                        <img src="<?php echo base_url();?>images/slider-image5.jpg" alt="image05"/>
                        <div class="ei-title">
                               <h2>pink shoes <br>	2013 collections</h2>
                            <h3 class="active">It is a long established fact that a reader<br>
                                Lorem Ipsum is that it has a more-or-less
                            </h3>
                         </div>
                    </li>
                    <li>
                        <img src="<?php echo base_url();?>images/slider-image3.jpg" alt="image07"/>
                        <div class="ei-title">
                            <h2>pink shoes <br>	2013 collections</h2>
                            <h3 class="active">It is a long established fact that a reader<br>
                                Lorem Ipsum is that it has a more-or-less
                            </h3>
                        </div>
                    </li>
                </ul><!-- ei-slider-large -->
                <ul class="ei-slider-thumbs">
                    <li class="ei-slider-element">Current</li>
                    <li>
                        <a href="#">
                            <span class="active">Stinky pants</span>
                            <p>limited edition</p>
                        </a>
                        <img src="<?php echo base_url();?>images/thumbs/1.jpg" alt="thumb01" />
                    </li>
                    <li class="hide"><a href="#"><span>anns field</span><p>limited edition</p> </a><img src="<?php echo base_url();?>images/thumbs/2.jpg" alt="thumb01" /></li>
                    <li  class="hide1"><a href="#"><span>prada</span><p>summer is coming</p></a><img src="<?php echo base_url();?>images/thumbs/3.jpg" alt="thumb02" /></li>
                    <li class="hide1"><a href="#"><span>casa devi</span><p>all colors available</p> </a><img src="<?php echo base_url();?>images/thumbs/4.jpg" alt="thumb03" /></li>
                    <li><a href="#"><span>mellow yellow</span><p>free delivery</p> </a><img src="<?php echo base_url();?>images/thumbs/1.jpg" alt="thumb04" /></li>
                    <li><a href="#"><span>anns field</span><p>limited edition</p> </a><img src="<?php echo base_url();?>images/thumbs/5.jpg" alt="thumb05" /></li>
                    <li><a href="#"><span>anns field</span><p>limited edition</p> </a><img src="<?php echo base_url();?>images/thumbs/3.jpg" alt="thumb07" /></li>
                </ul><!-- ei-slider-thumbs -->
            </div><!-- ei-slider -->
        </div><!-- wrapper -->
    </div>
    <!---End-image-slider---->
</div>
<div class="main_bg">
    <div class="wrap">
        <div class="main">

<!-- start main -->

            <div class="top_main">
                <h2>new arrivals</h2>
                <?php echo anchor('store', 'Show All'); ?>
                <div class="clear"></div>
            </div>
            <!-- start grids_of_3 -->
            <div class="grids_of_3">
                <?php foreach($items as $item) { ?>
                <div class="grid1_of_3">
                    <a href="<?php echo 'item/view/'.$item->id ?>">
                        <img src="<?php echo base_url() . "images/clothes/" . $item->image_large; ?>"  alt=""/>
                        <h3><?php echo $item->item_name ?></h3>
                        <span class="price">&euro;<?php echo $item->item_price ?></span>
                    </a>
                </div>
                <?php } ?>
                <div class="clear"></div>
            </div>

            <div class="clear"></div>


        </div>
    </div>
</div>
</div>
</div>
</div>

