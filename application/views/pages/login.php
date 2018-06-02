<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/logogso.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" id="bootstrap-css" href="<?php echo base_url() ?>assets/css/login.css">
<!--===============================================================================================-->


</head>

<body>
    <?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
    <div class="fixed-background">
        <img data-tilt src="<?php echo base_url() ?>assets/images/bird.jpg" alt="IMG" style="max-width: 100%;height: auto;width: auto\9;">
    </div>
    <div class="container" style="width:800px; height: 600px;    opacity: 0.8;
    filter: alpha(opacity=50);">
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
                    if($this->session->flashdata('validationfailed')): ?>
                        <br><p><?php echo $this->session->flashdata('validationfailed'); ?></p>
                    <?php elseif ($this->session->flashdata('userfailed')):?>
                        <br><p><?php echo $this->session->flashdata('userfailed'); ?></p>
                    <?php endif; ?>

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
                                 <a href="forgot" class="pull-right">Forgot Password</a>
                </div>
                <!--/Form with header-->

                </div><!--col-sm-6-->
        </div>

    </div><!--container-->
    </div>



</body>
</html>