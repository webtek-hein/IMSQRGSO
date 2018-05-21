
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/forget.css">
<link rel="icon" href="<?php echo base_url() ?>assets/css/logo.png">

</head>
<body>
<div class="fixed-background">
    <img data-tilt src="<?php echo base_url() ?>assets/images/bird.jpg" alt="IMG" style="max-width: 100%;height: auto;width: auto\9;">
</div>
<div class="container" style="width:800px; height: 600px;    opacity: 0.8;
    filter: alpha(opacity=50\);">
    <div class="col-md-12 col-md-offset-1 main" >
        <div id="left-side" class="col-md-6" >
            <div class="login00-pic js-tilt" data-tilt>
                <img data-tilt src="<?php echo base_url() ?>assets/images/butterfly.png" alt="IMG" height="220" width="220" style=" margin-left:65px; margin-top: 115px;">
            </div>
        </div>

        <div id="right-side" class="col-md-6">
            <h3>Reset password</h3>

            <div class="form">
    <?php echo form_open('Forget/doforget'); ?>
    <form>
        <fieldset>
            <div class="control-group">
                <label for="email" style="text-decoration:none; font-family:sans-serif;"> Email</label>
                <input class="box" type="text" id="email" name="email" required/>
            </div>
            <br>
            <div class="form-actions">
                <input type="submit" class="btn btn-primary" value="Reset" />
            </div>
            <?php
            echo "<div class='error_msg'>";
            if (isset($error_message)) {
                echo $error_message;
            }elseif (isset($success_message)){
                echo $success_message;
            }
            echo validation_errors();
            echo "</div>";
            ?>
            <a href="login" style="text-decoration:none; font-family:sans-serif; text-align: center;">Sign In</a>
            <br>
            <a href="<?php echo base_url() ?>signup" style="text-decoration:none; font-family:sans-serif;"></a>

        </fieldset>
    </form>
            </div>
    </div>
</div>
</body>
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