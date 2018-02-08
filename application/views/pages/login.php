<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GSO Inventory Account </title>

    <!-- Bootstrap -->
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="assets/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">
    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>


    <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/normalize.min.css">
        <script>
            function relocate_home()
            {
                 location.href = "login";
            } 
        </script>    
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form>
                    <h1>Login Form</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="index.html">Log in</a>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> Create Account </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
               
        <?php echo validation_errors(); ?>
        <?php echo form_open('login#signup'); ?>
            <table border="0" width="500" align="center" class="table">
                <h1> SIGN UP</h1>
                <tr>
                    <td align="center"><input type="text" class="form-control" name="FirstName" required value="<?php echo isset($_POST["FirstName"]) ? $_POST["FirstName"] : ''; ?>" placeholder= "First Name"></td>
                </tr>
                <tr>
                    <td align="center"><input type="text" class="form-control" name="LastName" required value="<?php echo isset($_POST["LastName"]) ? $_POST["LastName"] : ''; ?>" placeholder= "Last Name"></td>
                </tr>
                <tr>
                    <td align="center"><input type="email" class="form-control" name="Email" required value="<?php echo isset($_POST["Email"]) ? $_POST["Email"] : ''; ?>" placeholder= "Email"></td>
                </tr>
                <tr>
                    <td align="center"><input type="text" class="form-control" pattern="^(09|\+639)\d{9}$" title="ex 09xxxxxxxxx" name="contactno" required value="<?php echo isset($_POST["contactno"]) ? $_POST["contactno"] : ''; ?>" placeholder= "Contact No."></td>
                </tr>
                <tr>
                    <td align="center"><input type="text" pattern="^[A-Za-z0-9_-]{4,15}$" title="Username must be more than 4 characters and not more than 15 characters." class="form-control" name="Username" required value="<?php echo isset($_POST["Username"]) ? $_POST["Username"] : ''; ?>" placeholder= "Username"></td>
                </tr>
                <tr>
                    <td align="center"><input type="password" class="form-control" name="Password" value="" required placeholder= "Password"></td>
                </tr>
                <tr>
                    <td align="center"><input type="password" class="form-control" name="confirm_password" value="" required placeholder= "Repeat password"></td>
                </tr>
                <tr>
                <script>
                    function select_dept() {
                        $('.position').change(function () {
                            position = $('.position').val();
                            if(position === 'department head'){
                                $('#dment').css({
                                    "display": "block"
                                });
                                $.getJSON( "inventory/getdept", function( data ) {
                                    alert(data);
                                }
                            }else {
                                $('#dment').css({
                                    "display": "none"
                                });
                            }
                        });
                        }
                </script>
                    <td align="center">
                        <select class="position form-control" align="center" id="type" name="type"  onclick='select_dept()' required>
                        <option selected="true" disabled>--Choose Position--</option>
                        <option value="custodian">Custodian</option>
                        <option value="department head">Department Head</option>
                        <option value="admin">Admin</option>
                        </select>
                     </td>
                </tr>   
                <tr>
                <td align="center">
                    <select class="form-control" id="dment" name="dment" style="display:none;">
                        <option selected="true" disabled>--Choose Department--</option>
                        <?php foreach ($departments as $dept): ?>
                        <option value="<?php echo $dept['dept_id'] ?>"><?php echo $dept['res_center_code'] . ' ' . $dept['department'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                </tr>
                <tr>
                 <td><input type="submit" class="btn btn-primary btn-block btn-small" name="createaccount" value="Register" ></td>
                    </tr>
                <tr>
                    <td><input type="button" class="btn btn-primary btn-block btn-small" name="cancel" value="Cancel" onclick=" relocate_home()"></td>
                </tr>
                
            </table>
            </section>
        </div>
    </div>
</div>
</body>
</html>
