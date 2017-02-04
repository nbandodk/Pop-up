<?php 
$con = mysqli_connect("localhost", "root", "", "social"); //Connecton var

if(mysqli_connect_errno())
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

//Decalring vars
$fname = ""; //First name
$lname = ""; //Last name
$em = ""; //Email
$em2 = ""; //Email2
$password = ""; //Pass
$password2 = ""; //Pass2
$date = ""; //Date
$error_array = ""; //errors

if(isset($_POST['register_button'])) {
	//Registration form values

	//First name
	$fname = strip_tags($_POST['reg_fname']); //remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname)); //uppercase first letter

	//Last name
	$lname = strip_tags($_POST['reg_lname']); //remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname)); //uppercase first letter

	//Email
	$em = strip_tags($_POST['reg_email']); //remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = ucfirst(strtolower($em)); //uppercase first letter

	//Email2
	$em2 = strip_tags($_POST['reg_email2']); //remove html tags
	$em2 = str_replace(' ', '', $em2); //remove spaces
	$em2 = ucfirst(strtolower($em2)); //uppercase first letter

	//Password
	$password = strip_tags($_POST['reg_password']); //remove html tags

	//Password2
	$password2 = strip_tags($_POST['reg_password2']); //remove html tags
	
	$date = date("Y-m-d"); //curr date

}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Pop-up!</title>
</head>
<body>

	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name" required>
		<br>
		<input type="text" name="reg_lname" placeholder="Last Name" required>
		<br>
		<input type="email" name="reg_email" placeholder="Email" required>
		<br>
		<input type="email" name="reg_email2" placeholder="Confirm Email" required>
		<br>
		<input type="password" name="reg_password" placeholder="Password" required>
		<br>
		<input type="password" name="reg_password2" placeholder="Confirm Password" required>
		<br>
		<input type="submit" name="register_button" value="Register"> 

	</form>



</body>
</html>