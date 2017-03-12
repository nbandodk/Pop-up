<?php 

if(isset($_POST['login_button'])) {

	$email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); // sanitize email

	$_SESSION['log_email'] = $email; // store email into session var
	$password = md5($_POST['log_password']); //get encrypted password

	$_SESSION['log_password'] = $password; 

	$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
	$check_login_query = mysqli_num_rows($check_database_query); // get the resulting subtable 

	if($check_login_query == 1) {
		$row = mysqli_fetch_array($check_database_query);
		$user_closed = $row['user_closed'];
		$username = $row['username'];
<<<<<<< HEAD
		$id = $row['id'];
=======
>>>>>>> f468e10bd818f236857a893c72a6e0a121a8fbf9

		if ($user_closed == 'yes') { // send the email to user
			$hash = md5(rand(0,1000)); // Generate random 32 character hash
			$to      = $email; // Send email to our user
			$subject = 'Signup | Verification'; // Give the email a subject 
			$message = '
				Thanks for signing up!
				Your account has been created, you can login with the following credentials after you have activated your account by using the verification code below.
				 
				------------------------
				Username: '.$name.'
				Password: '.$password.'
				Verification code: '.$hash.'
				------------------------
		
				'; 
				       
			$message = wordwrap($message,70); 
			$message = str_replace("\n.", "\n..", $message);  

			$headers = 'From:noreply@pop-up.com' . "\r\n"; // Set from headers
			mail($to, $subject, $message, $headers); // Send our email

			$_SESSION['hash'] = $hash; // store the hash in session
			$_SESSION['username'] = $username;
<<<<<<< HEAD
			$_SESSION['id'] = $id;
=======
>>>>>>> f468e10bd818f236857a893c72a6e0a121a8fbf9

			header("Location: login_verification.php"); // link to verification page
			exit();
		}else{
			$_SESSION['username'] = $username;
<<<<<<< HEAD
			$_SESSION['id'] = $id;
			header("Location: home.php");
=======
			header("Location: index.php");
>>>>>>> f468e10bd818f236857a893c72a6e0a121a8fbf9
			exit();
		}
		
	}
	else {
		// put the error in the varibale $error_array
		array_push($error_array, "Email or Password was incorrect<br>");
	}
}

?>