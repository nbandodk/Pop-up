<?php 
	$con = mysqli_connect("localhost","root","","Pop-up","3308");
	if (mysqli_connect_errno()) {
		echo "Fail to connect to database";
	}

	if (isset($_POST['login_button'])) {
		$email = filter_var($_POST['log_email'],FILTER_SANITIZE_EMAIL); //check the format of the email
		$_SESSION['log_email'] = $email;
		$password = md5($_POST['log_password']); 

		$database_login = mysqli_query($con, "select * from user where email='$email' and password='$password' ");

		$database_login_num = mysqli_num_rows($database_login);
		if ($database_login_num == 1) {
			$row = mysqli_fetch_array($database_login); //get tuple from db
			$_SESSION['log_email'] = $row['email_address']; // put attribute (variable) in session variable
			$_SESSION['log_password'] = $row['password'];
		}
	}

?>