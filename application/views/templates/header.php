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
    <link rel="icon" href="<?php echo base_url()?>assets/images/logogso.png" type="image/ico" />

    <title>GSO Baguio City Hall</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Tables-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap-table.css">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url() ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo base_url() ?>assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/build/css/custom.css" rel="stylesheet">
    <!-- Placeholder for Dates Style -->
    <link href="<?php echo base_url() ?>assets/css/deptnav.css" rel="stylesheet">
    <!--Bootstrap Dialog-->
    <link href="<?php echo base_url() ?>assets/css/bootstrap-dialog.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <link rel="icon" href="<?php echo base_url()?>assets/images/logogso.png">
    <!--table design-->
    <link href="<?php echo base_url()?>assets/css/tabledesign.css" rel="stylesheet">

</head>

<body class="nav-sm fixed-top">
    <div class="main_container">
        <div class="menu_fixed col-md-3 left_col" id="HeaderNav">
            <div class="left_col scroll-view">
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side  hidden-print main_menu">
                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <li id="li1"><a href="<?php echo base_url()?>dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li id="li2"><a href="Inventory"><i class="fa fa-book"></i>Inventory</a>
                            </li>

                            <?php $position = $this->session->userdata['logged_in']['position'];
                            if ($position === 'Admin' || $position === 'Custodian'){
                                echo '<li id="dept"><a href="department"><i class="fa fa-institution"></i>Department</a>
                                      </li>'.
                                    '<li id="li3"><a href="Supplier"><i class="fa fa-truck"></i>Supplier</a>
                                     </li>';
                            }
                            if ($position === 'Admin'){
                                echo '<li id="li4"><a href="Accounts"><i class="fa fa-users"></i>Users</a></li>';

                            }
                            echo '<li id="li5"><a href="Return"><i class="fa fa-undo"></i>Returns</a></li>';
                            ?>
                            <li id="li6"><a><i class="fa fa-edit"></i>Logs</a>
                                <?php
                                echo '<ul class="nav child_menu">';
                                echo '<li><a href=' . base_url() . 'increased>Increased</a></li>'.
                                    '<li><a href=' . base_url() . 'decreased>Decreased</a></li>';
                                if ($position === 'Admin' || $position === 'Custodian') {
                                    echo '<li><a href=' . base_url() . 'edit>Edit</a></li>';
                                }
                                echo '<li><a href=' . base_url() . 'return_log>Return Log</a></li>';
                                echo '</ul></li>';
                                ?>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
                </div>
                <!-- top navigation -->
                <div id="topNav" class="top_nav">
                        <nav class="nav_menu">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php echo base_url()?>assets/images/img.jpg" alt=""><?= $firstname.' '.$lastname?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="<?php echo base_url()?>profile">Profile</a></li>
                                        <li><a href="<?php echo base_url()?>logout"><i class="fa fa-sign-out pull-right"></i>Log Out</a></li>
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
                                                <span class="image"><img src="<?php echo base_url()?>assets/images/img.jpg" alt="Profile Image" /></span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                                <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                         </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="<?php echo base_url()?>assets/images/img.jpg" alt="Profile Image" /></span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                                <span class="message">
                                            Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="<?php echo base_url()?>assets/images/img.jpg" alt="Profile Image" /></span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                                <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                        </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="<?php echo base_url()?>assets/images/img.jpg" alt="Profile Image" /></span>
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
                <!-- /top navigation -->