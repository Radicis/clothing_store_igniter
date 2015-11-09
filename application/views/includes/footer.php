</div></div></div>
<!-- start footer -->
<div class="footer_top">
    <div class="wrap">
        <div class="footer">
            <!-- start grids_of_3 -->
            <div class="span_of_3">
                <div class="span1_of_3">
                    <h3>ClothingIgniter</h3>
                    <p>Our promise is to bring you the finest pants and ONLY the finest pants.</p>
                    <p>If you cant find better pants anywhere, we will match those pants and those prices. Accept no substitutes for your pants based needs</p>
                </div>
                <div class="span1_of_3">
                    <h3>Latest Tweets</h3>
                    <div id="tweets"></div>
                </div>
                <div class="span1_of_3">
                    <h3>Facebook Widget here</h3>

                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
<!-- start footer -->
<div class="footer_mid">
    <div class="wrap">
        <div class="footer">
            <div class="f_search">
                <form>
                    <input type="text" value="" placeholder="Enter email for newsletter" />
                    <input type="submit" value=""/>
                </form>
            </div>
            <div class="soc_icons">
                <ul>
                    <li><a class="icon1" href="#"></a></li>
                    <li><a class="icon2" href="#"></a></li>
                    <li><a class="icon3" href="#"></a></li>
                    <li><a class="icon4" href="#"></a></li>
                    <li><a class="icon5" href="#"></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- start footer -->
<div class="footer_bg">
    <div class="wrap">
        <div class="footer">
            <!-- scroll_top_btn -->
            <script type="text/javascript">
                $(document).ready(function() {

                    var defaults = {
                        containerID: 'toTop', // fading element id
                        containerHoverID: 'toTopHover', // fading element hover id
                        scrollSpeed: 1200,
                        easingType: 'linear'
                    };


                    $().UItoTop({ easingType: 'easeOutQuart' });

                });
            </script>
            <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
            <!--end scroll_top_btn -->
            <div class="f_nav1">
                <ul>
                    <li><a href="#">home /</a></li>
                    <li><a href="#">support /</a></li>
                    <li><a href="#">Terms and conditions /</a></li>
                    <li><a href="#">Faqs /</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </div>
            <div class="copy">
                <p class="link"><span>&copy; ClothesIgniter 2015</span></p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
        <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } if($this->session->flashdata('error')){  ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php } if($this->session->flashdata('warning')){  ?>
            <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
            </div>
        <?php } if($this->session->flashdata('info')){  ?>
            <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
            </div>
        <?php } ?>


<<<<<<< HEAD
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/main.js"></script>
=======
>>>>>>> 1e1377192bd0ef1c7ea78a9e9ba38b388417d22b

</body>
</html>