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
    <link rel="icon" href="<?php echo base_url() ?>assets/images/logogso.png" type="image/ico"/>

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
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css"
          rel="stylesheet">
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
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <link rel="icon" href="<?php echo base_url() ?>assets/images/logogso.png">
    <!--table design-->
    <link href="<?php echo base_url() ?>assets/css/tabledesign.css" rel="stylesheet">

</head>

<body class="nav-md">
<div class="menu_fixed col-md-2 left_col" id="HeaderNav">
    <div class="scroll-view">
        <div class="profile clearfix">
            <div class="profile_pic">
                <img class="left" src="<?php echo base_url(); ?>assets/images/logoimsgso.png" width="50px"
                     height="50px">
            </div>
            <div class="profile_info">
                <span><p>GSOIMS</p></span>
            </div>
        </div>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side  hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li id="li1">
                        <a href="<?php echo base_url() ?>dashboard"><i class="fa fa-dashboard"></i> DASHBOARD </a>
                    </li>
                    <li id="li2">
                        <a href="Inventory"><i class="fa fa-book"></i>INVENTORY</a>
                    </li>

                    <?php $position = $this->session->userdata['logged_in']['position'];
                    if ($position === 'Admin' || $position === 'Custodian') {
                        echo '<li id="dept">
                                     <a href="department"><i class="fa fa-institution"></i>DEPARTMENT</a>
                                  </li>' .
                            '<li id="li3">
                                    <a href="Supplier"><i class="fa fa-truck"></i>SUPPLIER</a>
                                 </li>';
                    }
                    if ($position === 'Admin') {
                        echo '<li id="li4">
                                    <a href="Accounts"><i class="fa fa-users"></i>USERS</a>
                                  </li>';
                    }
                    echo '<li id="li5">
                                    <a href="Return"><i class="fa fa-undo"></i>RETURNS</a>
                                  </li>';
                    ?>
                    <li id="li6">
                        <a><i class="fa fa-edit"></i>LOGS <span class="fa fa-chevron-down"></span></a>
                        <?php
                        echo '<ul class="nav child_menu">';
                        echo '<li><a href=' . base_url() . 'increased>INCREASED</a></li>' .
                            '<li><a href=' . base_url() . 'decreased>DECREASED</a></li>';
                        if ($position === 'Admin' || $position === 'Custodian') {
                            echo '<li><a href=' . base_url() . 'edit>EDIT</a></li>';
                        }
                        echo '<li><a href=' . base_url() . 'return_log>RETURN LOG</a></li>';
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

    </nav>
</div>
<!-- /top navigation -->

