<html>
<head>
    <title>Login</title>
    <link href="<?php echo base_url(); ?>assets/css/font.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css">
    <link rel="icon" href="<?php echo base_url() ?>assets/css/logo.png">
   
</head>
<body>

<?php if($this->session->flashdata('msg')): ?>
    <p><?php echo $this->session->flashdata('msg'); ?></p>
<?php endif; ?>
<div id="main">

    <div id="login">
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
        <a href="<?php echo base_url() ?>signup" >Click Here To Sign Up </a> <br><br>
        <a href="<?php echo base_url() ?>forget">forgot password? </a>
        <?php echo form_close(); ?>
    </div>
</div>
</body>
</html>

