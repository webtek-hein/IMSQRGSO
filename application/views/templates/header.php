<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $firstname = ($this->session->userdata['user_in']['firstname']);
    $lastname = ($this->session->userdata['user_in']['lastname']);
    $position = ($this->session->userdata['logged_in']['position']);
    $department = ($this->session->userdata['logged_in']['department']);
} else {
    redirect("logout");
}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/logogso.png" type="image/ico" />

    <title>GSO Baguio City Hall</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Tables-->
    <link rel="stylesheet" href="assets/css/bootstrap-table.css">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
    <link href="assets/build/css/custom.css" rel="stylesheet">
    <!-- Placeholder for Dates Style -->
    <link href="assets/css/deptnav.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <link rel="icon" href="assets/images/logo.png">
    
</head>

<body class="nav-md fixed-top footer_fixed">
<div class="container body">
    <div class="main_container">
        <div class=" menu_fixed col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="assets/images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?= $firstname.' '.$lastname?></h2>
                    </div>
                </div>
                <!-- /menu profile quick info -->
                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side  hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li><a href="Inventory"><i class="fa fa-book"></i>Inventory</span></a>
                            </li>
                            <li><a><i class="fa fa-file-text"></i>Departments<span class="fa fa-chevron-down"></span></a>
                                <ul id="deptlist" class="nav child_menu" class="scrollbar">
                                </ul>
                            </li>
                            <li><a href="Return"><i class="fa fa-undo"></i>Returns</a>
                            </li>
                            <li><a href="Supplier"><i class="fa fa-book"></i>Supplier</span></a>
                            </li>
                            <li><a href="Serial"><i class="fa fa-book"></i>Serial</span></a>
                            </li>
                            <li><a><i class="fa fa-file-text"></i>Logs<span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="Increased">Increased</a></li>
                                    <li><a href="Decreased">Decreased</a></li>
                                    <li><a href="Edit">Edit</a></li>
                                    <li><a href="Return_Log">Return Log</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="assets/images/img.jpg" alt=""><?= $firstname.' '.$lastname?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="profile">Profile</a></li>
                                <li><a href="logout"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li>
                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge bg-green">6</span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                <li>
                                    <a>
                                        <span class="image"><img src="assets/images/img.jpg" alt="Profile Image" /></span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                        <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                         </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="assets/images/img.jpg" alt="Profile Image" /></span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                        <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="assets/images/img.jpg" alt="Profile Image" /></span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                        <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a>
                                        <span class="image"><img src="assets/images/img.jpg" alt="Profile Image" /></span>
                                        <span>John Smith</span>
                                        <span class="time">3 mins ago</span>
                                        <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->