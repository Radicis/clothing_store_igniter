
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Clothing 9000</title>
    <link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,900,700,500' rel='stylesheet' type='text/css'>



    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
    <script src="<?php echo base_url();?>js/jquery.min.js" type="text/javascript"></script>

    <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>css/jquery.mmenu.all.css" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.mmenu.js"></script>
    <script type="text/javascript">
        //	The menu on the left
        $(function() {
            $('nav#menu-left').mmenu();
        });
    </script>
    <!-- start slider -->
    <link href="<?php echo base_url();?>css/slider.css" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.eislideshow.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/easing.js"></script>
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
    <script type="text/javascript" src="<?php echo base_url();?>js/move-top.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
            });
        });
    </script>

</head>
<body>

<!-- start header -->
<div class="top_bg">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <a href="index.html"><img src="<?php echo base_url();?>images/logo.png" alt=""/></a>
            </div>
            <div class="log_reg">
                <ul>
                    <li>
                    <?php

                    if($this->session->is_logged_in){
                        echo "<span class='username'>" . $this->session->username . "</span>" . anchor('login/logout', 'Logout');

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
                <li><?php echo anchor('', 'Home'); ?></li>
                <li><?php echo anchor('store', 'Shop'); ?></li>
                <li><?php echo anchor('store', 'About'); ?></li>
                <li><?php echo anchor('store', 'Contact'); ?></li>
                <li><a href="contact.html">Contact</a></li>
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
                <li><a href="index.html">Home</a></li>
                <li><a href="products.html">products</a></li>
                <li><a href="about.html">about</a></li>
                <li><a href="index.html">pages</a></li>
                <li><a href="blog.html">blog</a></li>
                <li><a href="contact.html">Contact</a></li>
                <div class="clear"></div>
            </ul>
        </nav>
        <div class="header_right">
            <ul>
                <li><a href="#"><i  class="art"></i><span class="color1">30</span></a></li>
                <li><a href="#"><i  class="cart"></i><span>0</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>


