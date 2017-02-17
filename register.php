<?php 
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
?>



<!DOCTYPE html>
<html>
<head>
	<title>Pop-up Login!</title>
	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- css including boostrap -->
	<link href="assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/Bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/index.css">
	<!-- JavaScript -->
	<script type="text/javascript" src="assets/Bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/register.js"></script>

</head>
<body>

	<div class="wrapper">
		<div class="login_box">
			<div class="login_header">
				<h1>Pop-up</h1>
				Login or sign up below!
			</div>

			<div id="first">
				<form action="register.php" method="POST">
					<?php if(in_array("Email or Password was incorrect<br>", $error_array)) echo "Email or Password was incorrect<br>"; ?>
					<input type="email" name="log_email" placeholder="Email Address" value="<?php if(isset($_SESSION['log_email']))echo $_SESSION['log_email']; ?>" required><br>
					<input type="password" name="log_password" placeholder="Password"><br>
					<input type="submit" name="login_button" value="Login"><br>
					<a href="#" id="signup" class="signup">Need an account? Register here.</a>

					<br>
				</form>
			</div>

			
			<div id="second">
				<form action="register.php" method="POST">
					<input type="text" name="reg_fname" placeholder="First Name" value="<?php if(isset($_SESSION['reg_fname']))echo $_SESSION['reg_fname']; ?>" required>
					<br>
					<?php if(in_array("Your first name must be between 2 and 25 characters<br>", $error_array)) echo "Your first name must be between 2 and 25 characters<br>"; ?>
					
					
					<input type="text" name="reg_lname" placeholder="Last Name" value="<?php if(isset($_SESSION['reg_lname']))echo $_SESSION['reg_lname']; ?>" required>
					<br>
					<?php if(in_array("Your last name must be between 2 and 25 characters<br>", $error_array)) echo "Your last name must be between 2 and 25 characters<br>"; ?>
					
					
					<input type="email" name="reg_email" placeholder="Email" value="<?php if(isset($_SESSION['reg_email']))echo $_SESSION['reg_email']; ?>" required>
					<br>
					<input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php if(isset($_SESSION['reg_email2']))echo $_SESSION['reg_email2']; ?>" required>
					<br>
					<?php if(in_array("Email already in use<br>", $error_array)) echo "Email already in use<br>"; 
					 else if(in_array("Invalid email Format<br>", $error_array)) echo "Invalid email Format<br>"; 
					 else if(in_array("Emails don't match<br>", $error_array)) echo "Emails don't match<br>"; ?>
					

					<input type="password" name="reg_password" placeholder="Password" required>
					<br>
					<input type="password" name="reg_password2" placeholder="Confirm Password" required>
					<br>
					<?php if(in_array("Your passwords do not match<br>", $error_array)) echo "Your passwords do not match<br>";	
					 else if(in_array("Your password can only contain english characters or numbers<br>", $error_array)) echo "Your password can only contain english characters or numbers<br>";
					 else if(in_array("Your password must be between 5 and 30 characters<br>", $error_array)) echo "Your password must be between 5 and 30 characters<br>"; ?>
					

					<input type="submit" name="register_button" value="Register">
					<br>
					<?php if(in_array("<span style='color:#14C800;'>You're all set! Go ahead and log in!</span><br>", $error_array)) echo "<span style='color:#14C800;'>You're all set! Go ahead and log in!</span><br>"; ?>
					<a href="#" id="signin" class="signin">Already have an account? Log in here.</a>


				</form>	
			</div>
		</div>
	</div>


</body>
</html>