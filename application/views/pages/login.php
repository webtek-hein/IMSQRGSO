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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    <?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?php echo base_url() ?>assets/images/logo.png" alt="IMG" height="280" width="300">
                </div>

                <method="POST" action="login/user_login_process">
                    <span class="login100-form-title">
                        Member Login
                    </span>
                    <?php echo form_open('Login/user_login_process'); ?>
                    <?php
                    echo "<div class='error_msg'>";
                    if (isset($error_message)) {
                        echo $error_message;
                    }
                    echo validation_errors();
                    echo "</div>";
                    ?>

                    <div class="wrap-input100 validate-input"  >
                        <input class="input100" type="text" name="username" id="name" placeholder="username" data-required="true" data-error-message="Enter your Username"/>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                        </span>
                    </div>
                     
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" id="password" placeholder="password" data-required="true"/>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                            <input type="submit" class="login100-form-btn" value=" Login " name="submit"/>
                    </div>

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
        </div>
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
    <script src="js/main.js"></script>

</body>
</html>