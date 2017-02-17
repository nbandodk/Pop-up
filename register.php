<?php 
require "config/config.php";
require "includes/form_handlers/register_handler.php";
require "includes/form_handlers/login_handler.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title> Welcome to Pop-up</title>
 	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
 	
 </head>
 <body>
	<div class="wrapper">
		
	  		<div class="login_box">
	  			<div class="login_header"><h1>Pop-up</h1>Login or SignUp below!</div>

				 <form action = "register.php" method = "POST">
				 	<input type = "email" name = "log_email" placeholder = "Email_address" value = " <?php  
				 	if (isset($_SESSION['reg_fname'])) {
				 	echo $_SESSION['reg_fname'];
				 	}?>" required> <br>
				 	<input type = "password" name = "log_password" placeholder = "Password"><br>
				 	<input type="submit" name="login_button" value="Login"><br>

				 	<?php if(in_array("Email or password was incorrect <br>", $error_array)) echo "Email or password was incorrect <br>" ; ?>

				 </form>
				 
				 <form action="register.php" method="POST">
				 	<input type="text" name="reg_fname" placeholder="First Name" value = " <?php  
				 	if (isset($_SESSION['reg_fname'])) {
				 	echo $_SESSION['reg_fname'];
				 	}?>" required>
				 	<br>
				 	<?php if( in_array( "your first name must be between 2 and 25 characters <br>" , $error_array)) echo "your first name must be between 2 and 25 characters <br>";?>

				 	<input type="text" name="reg_lname" placeholder="Last Name" value = " <?php  
				 	if (isset($_SESSION['reg_lname'])) {
				 	echo $_SESSION['reg_lname'];
				 	}?>" required>
				 	<br>
				 	<?php if( in_array( "your last name must be between 2 and 25 characters <br>" , $error_array)) echo "your last name must be between 2 and 25 characters <br>";?>

				 	<input type="email" name="reg_email" placeholder="Email" value = " <?php  
				 	if (isset($_SESSION['reg_email1'])) {
				 	echo $_SESSION['reg_email1'];
				 	}?>" required>
				 	<br>
				 	<input type="email" name="reg_email2" placeholder="Confirm Email" value = " <?php  
				 	if (isset($_SESSION['reg_email2'])) {
				 	echo $_SESSION['reg_email2'];
				 	}?>" required>
				 	<br> 
				 	<?php if( in_array( "Email already in use <br>" , $error_array)) echo "Email already in use <br>";
				 	 else if( in_array( "Invalid email format <br>" , $error_array)) echo "Invalid email format <br>";
				 	 else if( in_array( "emails don't match  <br>" , $error_array)) echo "emails don't match  <br>"; ?>
				 	
				 	<input type="password" name="reg_password" placeholder="Password" required>
				 	<br>
				 	<input type="password" name="reg_password2" placeholder="Confirm Password" required>
				 	<br>
				 	<?php if( in_array( "passwords do not match <br>" , $error_array)) echo "passwords do not match <br>";
				 	 else if( in_array( "your password can only contain Alphabets and letters <br>" , $error_array)) echo "your password can only contain Alphabets and letters <br>";
				 	 else if( in_array( "your password must be between 5 and 30 characters <br>" , $error_array)) echo "your password must be between 5 and 30 characters <br>"; ?>
				 	
				 	<input type="submit" name="register_button" value="Register">
				 	<br>
				 	<?php if( in_array( "<span style = 'color: #14C800;'> You're all set! Go ahead and login! </span><br>" , $error_array)) echo "<span style = 'color: #14C800;'> You're all set! Go ahead and login! </span><br>";?>

				 </form>


			
	    </div>
    </div>
	 
   </body>

 </html>