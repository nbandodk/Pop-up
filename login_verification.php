<?php 
require 'config/config.php';
require 'includes/form_handlers/verification_handler.php';
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
						<h3>Input your verification code!</h3>
					</div>

					<div id="verification">
						<form action="login_verification.php" method="POST">
							<p>
 								<?php if(in_array("<br>verification code was incorrect<br>", $error_array)) echo "<br>verification code was incorrect<br>"; ?>
 								<input type="text" class="verify_input" name="ver_code" placeholder="Verfication Code" required>
 
 								<!-- <input type="submit" name="verification_button" value="Verify"> -->
 								<button type="submit" class="btn btn-danger verify_btn" style="display:inline-block" name="verification_button">Verify</button>
 							</p>
						</form>
					</div>

				</div>

			</div>

		</div>

	</div>

</body>
</html>