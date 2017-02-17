<?php 
require 'config/config.php';
require 'includes/form_handlers/verification_handler.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pop-up Verification</title>
		<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- css including boostrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<!-- JavaScript -->
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/register.js"></script>
</head>
<body>


	<div class="wrapper">
		<div class="login_box">
			<div class="login_header">
				<h1>Pop-up</h1>
				Enter verification code below!
			</div>

			<div id="verification">
				<form action="login_verification.php" method="POST">
					<?php if(in_array("<br>verification code was incorrect<br>", $error_array)) echo "<br>verification code was incorrect<br>"; ?>
					<input type="text" name="ver_code" placeholder="Verfication Code" required>
					<input type="submit" name="verification_button" value="Verify">
				</form>
			</div>
		</div>
	</div>


</body>
</html>