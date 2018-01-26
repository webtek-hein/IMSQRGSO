<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>GSO INVENTORY</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>



    <!--  Fonts and icons     -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/themify-icons.css" rel="stylesheet">

    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css">

    <!-- Bootstrap core CSS     -->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/jquery.min.js"></script>

</head>

<body>


<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="danger">

        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    GSO INVENTORY
                </a>
            </div>

            <ul class="nav">
                <li id="Dashboard">
                    <a href="dashboard">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li  id="Inventory">
                    <a href="inventory">
                        <i class="fa fa-bars"></i>
                        <p>Inventory</p>
                    </a>
                </li>
                <li id="Department">
                    <a href="department">
                        <i class="fa fa-home"></i>
                        <p>Department</p>
                    </a>
                </li>
                <li id="Return">
                    <a href="return">
                        <i class="fa fa-reply"></i>
                        <p>Return</p>
                    </a>
                </li>
                <li id="Logs">
                    <a href="logs">
                        <i class="ti-agenda"></i>
                        <p>Logs</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        $('#<?= $title?>').toggleClass('active');
    </script>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?= $title?></a>
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-user"></i>
                                    <p>Profile</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="user.php">View Profile</a></li>
                                <li><a href="#">Logout</a></li>
                              </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>