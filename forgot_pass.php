<?php 
require 'config/config.php';
require 'includes/form_handlers/forgot_handler.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pop-up Verification</title>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

	<!-- css including boostrap -->
	<link href="assets/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/Bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">

	<!-- Custom styles for this template -->
	<link rel="stylesheet" type="text/css" href="assets/css/cover.css">
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	
	<!-- JavaScript -->
	<script type="text/javascript" src="assets/Bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/register.js"></script>
</head>
<body>

	<div class="site-wrapper">

      	<div class="site-wrapper-inner">

        	<div class="cover-container">

				<div class="verify_box">
					<div class="verify_header">
						<h3>Enter your email below</h3>
					</div>

					<div id="verification">
						<form action="forgot_pass.php" method="POST">
							<?php if(in_array("<span style='color:#14C800;'>Check your email for the new password</span><br>", $error_array)) echo "<span style='color:#14C800;'>Check your email for the new password</span><br>"; ?>
							<?php if(in_array("<span style='color:#14C800;'>Password could not be changed :(</span><br>", $error_array)) echo "<span style='color:#14C800;'>Password could not be changed :(</span><br>"; ?>
							<?php if(in_array("<span style='color:red;'>No such email found</span><br>", $error_array)) echo "<span style='color:red;'>No such email found</span><br>"; ?>
							<input type="text" class="forgetpass_input" name="f_email" placeholder="Email" required>
							<!-- <input type="submit" name="verification_button" value="Verify">-->
							<button type="submit" class="btn btn-danger forgetpass_btn" name="forgot_button">Send</button>
							<br>
							<a href="register.php" id="signin" class="signin">Click here to go back to the login page.</a>
						</form>
					</div>

				</div>

			</div>

		</div>

	</div>

</body>
</html>