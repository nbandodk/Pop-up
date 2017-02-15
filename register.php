<html>
	<head>
		<title>Welcome to Pop-up!</title>
		<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	</head>
	<body>
		<div class="wrapper">
			<div class="login_box">
				<div class="login_header">
					<h1>Welcome to Pop-up</h1>
					<h2>Login or sign up below.</h2>
				</div>
				
				<form action="register.php">
					<input type="email" name="log_email" placeholder="Email address">
					<br>
					<input type="password" name="log_password" placeholder="Password">
					<br>
					<input type="submit" name="login_button" value="Login">
				</form>
				
				<form action="register.php" method="POST">
					<input type="text" name="reg_fname" placeholder="First Name" required>
					<br>
					<input type="text" name="reg_lname" placeholder="Last Name" required>
					<br>
					<input type="password" name="reg_pwd1" placeholder="Password" required>
					<br>
					<input type="password" name="reg_pwd2" placeholder="Confirm Password" required>
					<br>
					<input type="email" name="reg_email1" placeholder="Email" required>
					<br>
					<input type="email" name="reg_email2" placeholder="Confirm Email" required>
					<br>
					<div class="lay1">
						<input type="submit" name="cancel_button" value="Cancel">
					</div>
					<div class="lay2">
						<input type="submit" name="register_button" value="Register">
					</div>
				</form>
			</div>
		</div>
	</body>
</html>