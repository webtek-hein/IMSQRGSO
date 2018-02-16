<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <link rel="icon" href="assets/images/logo.png">
   
</head>
<body>
<?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
<div id="main">

    <div id="login">
        <img src="assets/images/logogso.png" alt=" " class="img-circle profile_img" height="250" width="265">
        <h1>Login</h1>

        <?php echo form_open('Login/user_login_process'); ?>
        <?php
        echo "<div class='error_msg'>";
        if (isset($error_message)) {
            echo $error_message;
        }
        echo validation_errors();
        echo "</div>";
        ?>

        <input type="text" name="username" id="name" placeholder="username" required/>
        <input type="password" name="password" id="password" placeholder="password" required/>
        <input type="submit" class="btn btn-primary btn-block btn-large" value=" Login " name="submit"/><br />
        <a href="forget">forgot password? </a>
        <?php echo form_close(); ?>
    </div>
</div>
</body>
</html>

