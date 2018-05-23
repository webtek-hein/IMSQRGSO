<!DOCTYPE html>
<html lang="en">
<?php
if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $name = ($this->session->userdata['user_in']['name']);
    $position = ($this->session->userdata['logged_in']['position']);
    $department = ($this->session->userdata['logged_in']['department']);
} else {
    redirect("logout");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inventory Management System</title>
    <meta name="description" content="Inventory Management System - GSO">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="<?php echo base_url() ?>assets/images/butterfly.png">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="assets/css/sb-admin.css">

    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <!--<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>-->
    <script
            src="assets/js/jquery-3.3.1.min.js"
            integrity=""
            crossorigin="anonymous"></script>

</head>

<body>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="./"><img src="assets/images/logo7.png" alt="Logo"></a>
        </div>

        <!-- sidebar menu -->
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="<?php echo base_url() ?>dashboard"><i class="menu-icon fa fa-dashboard"></i> DASHBOARD </a>
                </li>
                <li>
                    <?php 
                    if ($position === 'Supply Officer') {
                    echo '<a href="department"><i class="menu-icon fa fa-book"></i> INVENTORY</a>';
                    }else{
                        echo '<a href="inventory"><i class="menu-icon fa fa-book"></i> INVENTORY</a>';
                    }
                    ?>
                </li>

                <?php
                if ($position === 'Admin' || $position === 'Custodian') {
                    echo '<li id="dept">
                                     <a href="department"><i class="menu-icon fa fa-institution"></i>DEPARTMENT</a>
                                  </li>' .
                        '<li id="li3">
                                    <a href="supplier"><i class="menu-icon fa fa-truck"></i>SUPPLIER</a>
                                 </li>';
                }
                if ($position === 'Admin') {
                    echo '<li id="li4">
                                    <a href="Accounts"><i class="menu-icon fa fa-users"></i>USERS</a>
                                  </li>' . 
                        '<li id="li6">
                                     <a href="AccountSettings"><i class="menu-icon fa fa-gears"></i>Change Password</a>
                                  </li>';
                }
                if ($position === 'Supply Officer' || $position === 'Custodian') {
                echo '<li id="li5">
                                    <a href="return"><i class="menu-icon fa fa-undo"></i>RETURNS</a>
                                  </li>';
                }
                ?>


                    <?php
                    echo '';
                    if ($position !== 'Supply Officer') {
                        echo ' <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Logs</a>
                                                <ul class="sub-menu children dropdown-menu">'.
                                '<li><a href=' . base_url() . 'increased>INCREASED</a></li>' .
                                '<li><a href=' . base_url() . 'decreased>DECREASED</a></li>'.
                                '<li><a href=' . base_url() . 'edit>EDIT LOG</a></li>'.
                                '<li> <a href="' . base_url() . 'return_log">RETURN LOG</a>
                                  </li></ul>';

                    }else{
                        echo '<li id="li6">
                                    <a href="' . base_url() . 'return_log"><i class="menu-icon fa fa-laptop"></i>RETURN LOG</a>
                                  </li>';

                    }
                    echo '</li>';
                    ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->
<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <header id="header" class="header">

        <div class="header-menu">

            <div class="header-left">
            <div class="col-sm-7" style="color:black;">
                <a> <?=$name?></a>
                <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <h5><?= $position.' : '.$department?></h5>
            </div>
            </div>
            <div class="col-sm-5">
                <div class="float-right">
                        <a class="" href="login/logout"><i class="fa fa-power-off"> Sign Out</i></a>
                </div>

            </div>
        </div>

    </header>
    <!-- Header-->
