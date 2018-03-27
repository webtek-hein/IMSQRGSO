<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/logogso.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/animate/animate.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/vendors/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/util.css">
    <link rel="stylesheet" type="text/css" id="bootstrap-css" href="<?php echo base_url() ?>assets/css/login.css">
<!--===============================================================================================-->


</head>

<body>
    <?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
    <div class="fixed-background">
        <img data-tilt src="<?php echo base_url() ?>assets/images/bird.jpg" alt="IMG" style="background-position: center;
    background-size: cover;">
    </div>
    <div class="container" style="width:800px; height: 600px;opacity: 0.8;
    filter: alpha(opacity=50\);">
        <div class="col-md-12 col-md-offset-1 main" >
            <div id="left-side" class="col-md-6" >
                <div class="login00-pic js-tilt" data-tilt>
                    <img data-tilt src="<?php echo base_url() ?>assets/images/butterfly.png" alt="IMG" height="220" width="220" style=" margin-left:65px; margin-top: 115px;">
                </div>
            </div><!--col-sm-6-->

            <div id="right-side" class="col-md-6">
                <h3>Login</h3>

                <!--Form with header-->
                <div class="form">

                    <method="POST" action="login/user_login_process">
                    <?php echo form_open('Login/user_login_process'); ?>
                    <?php
                    echo "<div class='error_msg'>";
                    if (isset($error_message)) {
                        echo $error_message;
                    }
                    echo validation_errors();
                    echo "</div>";
                    ?>

                    <div class="form-group">
                        <label for="form2"> Username</label>
                        <input type="text" id="username" name="username" class="form-control input-lg" >
                    </div>

                    <div class="form-group">
                        <label for="form4">Password</label>
                        <input type="password" id="password" name="password" class="form-control input-lg">

                    </div>
                             <div class="container-login100-form-btn">
                            <input type="submit" class="login100-form-btn" value=" Login " name="submit"/>
                    <div class="text-center p-t-12">
                    <span class="txt1">
                            Forgot
                        </span>
                        <a class="txt2" href="<?php echo base_url()?>forget">
                            Password?
                        </a>
                        <?php echo form_close(); ?>
                    </div>

                </div>
                <!--/Form with header-->

                </div><!--col-sm-6-->
        </div>

    </div><!--container-->
    </div>

<!--===============================================================================================-->
    <script src="assets/vendors/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/vendors/bootstrap/js/popper.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/vendors/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="assets/vendors/tilt/tilt.jquery.min.js"></script>
    <script type="text/javascript" src="http://parsleyjs.org/dist/parsley.min.js"></script>
 <!--===============================================================================================-->

    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->


</body>
</html>