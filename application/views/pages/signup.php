<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

        <title>Sign Up</title>
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/js/normalize.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/signup.css">
        <link rel="icon" href="<?php echo base_url() ?>assets/css/logo.png">
		<script>
			function relocate_home()
			{
			     location.href = "index.php";
			} 
		</script>
</head>
<body>
<h1> SIGN UP</h1>
		<?php echo validation_errors(); ?>
		<?php echo form_open('signup'); ?>
			<table border="0" width="500" align="center" class="table">
				<tr>
                    <td align="center"><input type="text" class="InputBox" name="FirstName" required value="<?php echo isset($_POST["FirstName"]) ? $_POST["FirstName"] : ''; ?>" placeholder= "First Name"></td>
				</tr>
				<tr>
					<td align="center"><input type="text" class="InputBox" name="LastName" required value="<?php echo isset($_POST["LastName"]) ? $_POST["LastName"] : ''; ?>" placeholder= "Last Name"></td>
				</tr>
				<tr>
					<td align="center"><input type="email" class="InputBox" name="Email" required value="<?php echo isset($_POST["Email"]) ? $_POST["Email"] : ''; ?>" placeholder= "Email"></td>
				</tr>
				<tr>
					<td align="center"><input type="text" class="InputBox" pattern="^(09|\+639)\d{9}$" title="ex 09xxxxxxxxx" name="contactno" required value="<?php echo isset($_POST["contactno"]) ? $_POST["contactno"] : ''; ?>" placeholder= "Contact No."></td>
				</tr>
				<tr>
					<td align="center"><input type="text" pattern="^[A-Za-z0-9_-]{4,15}$" title="Username must be more than 4 characters and not more than 15 characters." class="InputBox" name="Username" required value="<?php echo isset($_POST["Username"]) ? $_POST["Username"] : ''; ?>" placeholder= "Username"></td>
				</tr>
				<tr>
					<td align="center"><input type="password" class="InputBox" name="Password" value="" required placeholder= "Password"></td>
				</tr>
				<tr>
					<td align="center"><input type="password" class="InputBox" name="confirm_password" value="" required placeholder= "Repeat password"></td>
				</tr>
				<tr>
				<script>
					function select_dept() {
    					if (document.getElementById('type').value === 'department head' || document.getElementById('type').value === 'receiver') {
        					document.getElementById('dment').style.display  = 'block';
    					} else {
        					document.getElementById('dment').style.display = 'none';
   						}
					}
				</script>
					<td align="center">
						<select  align="center" id="type" name="type"  onclick='select_dept()' required>
						<option selected="true" disabled>--Choose Position--</option>
 						<option value="custodian">Custodian</option>
					  	<option value="department head">Department Head</option>
					    <option value="admin">Admin</option>
					    </select>
					 </td>
				</tr>	
				<tr>
				<td align="center">
					<select  id="dment" name="dment" style="display:none;">
						<option selected="true" disabled>--Choose Department--</option>
          				<?php foreach ($departments as $dept): ?>
                		<option value="<?php echo $dept['dept_id'] ?>"><?php echo $dept['res_center_code'] . ' ' . $dept['department'] ?></option>
          				<?php endforeach; ?>
					</select>
        		</td>
				</tr>
				<tr>
					<td><input type="submit" name="createaccount" value="Register" ></td>
					</tr>
				<tr>
					<td><input type="button" name="cancel" value="Cancel" onclick=" relocate_home()"></td>
				</tr>
				
			</table>
	</body>


</html>
