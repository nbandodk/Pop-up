<?php
if(isset($_POST['login_button'])){

	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //SANITIZES EMAIL

	$_SESSION['log_email'] = $email ; //stores email into session variable
	$password = md5($_POST['log_password']); //get password
	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE  email = '$email' AND password = '$password' ");

	$check_login_query = mysqli_num_rows($check_database_query);
	 if($check_login_query == 1){
	 	$row = mysqli_fetch_array($check_database_query); //fetch_array to store the values returned by the query
	 	$username = $row['username']; // creates new session variable username

	 	$user_closed_query = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' AND userclosed  = 'yes'");
	 	if(mysqli_num_rows($user_closed_query == 1)){
	 		$reopen_account  = mysqli_query($con, "UPDATE users SET user_closed = 'no' WHERE email = '$email'");

	 	}
	 	$_SESSION['username'] = $username; //this is the session variable
	 	header("Location: index.php"); // this will direct page to index.php as soon as they login
	 	exit();

	 }
	 else {
	 	array_push($error_array, "Email or password was incorrect <br>");
	 }
}


?>

