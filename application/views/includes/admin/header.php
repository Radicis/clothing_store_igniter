
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>ClothesIgniter</title>
    <link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,900,700,500' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.css">


    <link href="<?php echo base_url();?>images/favicon.png" rel="icon" type="image/png">

    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/custom.css">

    <script src="<?php echo base_url();?>js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>js/vendor/bootstrap.min.js" type="text/javascript"></script>


    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/jquery.mmenu.all.css" />
    <script type="text/javascript" src="<?php echo base_url();?>js/vendor/jquery.mmenu.js"></script>
    <script type="text/javascript">
        //	The menu on the left
        $(function() {
            $('nav#menu-left').mmenu();
        });
    </script>
    <!-- start slider -->
    <link href="<?php echo base_url();?>css/slider.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="<?php echo base_url();?>js/vendor/jquery.eislideshow.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/vendor/easing.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#ei-slider').eislideshow({
                animation			: 'center',
                autoplay			: true,
                slideshow_interval	: 3000,
                titlesFactor		: 0
            });
        });
    </script>
    <!-- start top_js_button -->
    <script type="text/javascript" src="<?php echo base_url();?>js/vendor/move-top.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <script type="text/javascript" src="<?php echo base_url();?>js/main.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/admin.js"></script>


</head>
<body>

<!-- start header -->
<div class="top_bg">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>images/logo.png" alt=""/></a>
            </div>
            <div class="log_reg">
                <ul>
                    <li>
                        <?php

                        if($this->session->is_logged_in){
                            echo "<span class='username'>" . anchor('user', $this->session->username, array('class'=>'username')) . "</span>" . anchor('login/logout', 'Logout');

                        }
                        else{
                            echo "<li>" . anchor('login', 'Login') . "</li><span class='log'> or </span>
                    <li>". anchor('login/signup', 'Register'). "</li>
                    <div class='clear'></div>";

                        }
                        ?>
                    </li>
                </ul>
            </div>
            <div class="web_search">
                <form>
                    <input type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}">
                    <input type="submit" value=" " />
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- start header_btm -->
<div class="wrap">
    <div class="header_btm">
        <div class="menu">
            <ul>
                <li><?php echo anchor('site', 'Home'); ?></li>
                <li><?php echo anchor('store', 'Shop'); ?></li>
                <li><?php echo anchor('site/about', 'About'); ?></li>
                <li><?php echo anchor('site/gallery', 'Gallery'); ?></li>
                <li><?php echo anchor('site/contact', 'Contact'); ?></li>

                <?php
                if($this->session->isAdmin==1) {
                    echo "<li>". anchor('admin', 'Admin', array('class'=>'admin-link')) . "</li>";
                }
                ?>
                <div class="clear"></div>
            </ul>
        </div>
        <div id="smart_nav">
            <a class="navicon" href="#menu-left"> </a>
        </div>
        <nav id="menu-left">
            <ul>
                <li><?php echo anchor('site', 'Home'); ?></li>
                <li><?php echo anchor('store', 'Shop'); ?></li>
                <li><?php echo anchor('site/about', 'About'); ?></li>
                <li><?php echo anchor('site/gallery', 'Gallery'); ?></li>
                <li><?php echo anchor('site/contact', 'Contact'); ?></li>

                <?php
                if($this->session->isAdmin==1) {
                    echo "<li>". anchor('admin', 'Admin', array('class'=>'admin-link')) . "</li>";
                }
                ?>
                <div class="clear"></div>
            </ul>
        </nav>
        <div class="header_right">
            <ul>
                <!--<li><a href="#"><i  class="art"></i><span class="color1">30</span></a></li>-->
                <li><a href="<?php echo base_url(); ?>index.php/store/view_cart"><i  class="cart"></i><span><?php echo $this->cart->total_items(); ?></span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="main_bg">
    <div class="wrap">
        <div class="main">

            <div class="row">
                <div class="col-md-3 admin-sidebar">

                <h3>Admin Menu</h3>
                <ul>
                    <li><i class="fa fa-laptop"></i><?php echo anchor('admin', 'Dashboard'); ?></li>
                </ul>

                <hr>
                <h4 class="left">Entry Types</h4>
                <ul>
                    <li><i class="fa fa-laptop"></i><?php echo anchor('admin/show/items', 'Items'); ?></li>
                    <li><i class="fa fa-share-alt"></i><?php echo anchor('admin/show/categories', 'Categories'); ?></li>
                    <li ><i class="fa fa-building"></i><?php echo anchor('admin/show/brands', 'Brands'); ?></li>
                    <li ><i class="fa fa-list"></i><?php echo anchor('admin/show/orders', 'Orders'); ?></li>
                    <li><i class="fa fa-users"></i><?php echo anchor('admin/show/users', 'Users'); ?></li>
                </ul>
                    <hr>
                <h4 class="left">Reports/Charts</h4>
                <ul>

                </ul>
                    </div>
                <div class="col-md-9">




