
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Clothing 9000</title>

    <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/shop-homepage.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/vendor/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/vendor_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">

</head>
<body class="skin-blue sidebar-mini">
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php
            echo anchor('site', 'Clothing 9000!', array('class' => 'navbar-brand'));

            ?>
        </div>
        <div class="pull-right user-info">
            <?php

            if($this->session->is_logged_in){
                echo "Welcome back ";
                echo  $this->session->username;
                echo anchor('login/logout', 'Logout');
            }
            else{
                echo anchor('login', 'Login');
            }
            ?>

        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <?php echo anchor('store', 'Shop'); ?>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <?php
                if($this->session->isAdmin==1) {
                    echo "<li>". anchor('admin', 'Admin', array('class'=>'admin-link')) . "</li>";
                }
                ?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <div class="row">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="admin-sidebar col-md-3">
        <h3>Admin Menu</h3>
        <hr>
           <h4 class="left">Entry Types</h4>
            <ul>
                <li><i class="fa fa-laptop"></i><?php echo anchor('admin/show/items', 'Store Items'); ?></li>
                <li><i class="fa fa-share-alt"></i><?php echo anchor('admin/show/categories', 'Item Categories'); ?></li>
                <li ><i class="fa fa-building"></i><?php echo anchor('admin/show/brands', 'Brands'); ?></li>
                <li ><i class="fa fa-list"></i><?php echo anchor('admin/show/orders', 'Orders'); ?></li>
                <li><i class="fa fa-users"></i><?php echo anchor('admin/show/users', 'Users'); ?></li>
            </ul>

        <hr>
        <h4 class="left">Reports/Charts</h4>
        <ul>
            <li><i class="fa fa-laptop"></i><?php echo anchor('admin/show/items', 'Store Items'); ?></li>
            <li><i class="fa fa-share-alt"></i><?php echo anchor('admin/show/categories', 'Item Categories'); ?></li>
            <li ><i class="fa fa-building"></i><?php echo anchor('admin/show/brands', 'Brands'); ?></li>
            <li><i class="fa fa-users"></i><?php echo anchor('admin/show/users', 'Users'); ?></li>
        </ul>


    </aside>

    <div class="content-wrapper">


