<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo URL::base('css/user.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo URL::base('css/naked.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo URL::base('css/docs.css') ?>">
    <!-- <link rel="stylesheet" type="text/css" href="<?php //echo URL::base('vendor/bootstrap/css/bootstrap.css') ?>"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php //echo URL::base('vendor/bootstrap/css/bootstrap-theme.css') ?>"> -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php //echo URL::base('css/jquery-1.11.0.min.js') ?>"> -->
    <script type="text/javascript" src="<?php //echo URL::base('js/jquery-1.7.1.min.js') ?>"></script>
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">  -->
    <link type="text/css" rel="stylesheet" href="<?php echo URL::base('datepicker/themes/ui-lightness/ui.all.css') ?>" />
    <script src="<?php echo URL::base('datepicker/jquery-1.8.0.min.js') ?>"></script>
    <script src="<?php echo URL::base('datepicker/ui/ui.core.js') ?>"></script>
    <script src="<?php echo URL::base('datepicker/ui/ui.datepicker.js') ?>"></script>
    <script src="<?php echo URL::base('datepicker/ui/i18n/ui.datepicker-id.js') ?>"></script> 
</head>
<body bgcolor="#D0D0D0">
<nav class="navbar-menu">
    <div class="wrapper">
        <h1><a href="<?php echo URL::site('/') ?>">Financial Monitoring</a></h1>
        <section class="topbar pull-right">
            <ul class="menu">
                <li><a href="<?php echo URL::site('/list/null/create') ?>">Input Data</a></li>
                <!-- <li class="divide"></li>
                <li><a href="#">Menu 2</a></li>
                <li class="divide"></li>
                <li class="collapsible">
                    <a href="#">Menu 3</a>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Illustrations</a></li>
                    </ul>
                </li> -->
            </ul>
        </section>
    </div>
</nav>
<!-- Navigation -->

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo f('notification.show') ?>
                
                <?php echo $body ?>
            </div>
        </div>
    </div>
</body>
</html>
