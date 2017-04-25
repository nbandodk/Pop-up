<?php 
$error_array = array(); //errors


	if(isset($_POST['forgot_button'])) {

	// $hash = $_SESSION['hash'];
	// $email = $_SESSION['log_email'];
	$fem = strip_tags($_POST['f_email']); //remove html tags
	$fem = str_replace(' ', '', $fem); //remove spaces

	$check_query = mysqli_query($con, "SELECT * FROM users WHERE email='$fem'");
	if(mysqli_num_rows($check_query) == 1) {
			$row = mysqli_fetch_array($check_query);
			$id = $row['id'];

			$temp_pass = md5(rand(0, 1000));
			$password = md5($temp_pass);
			$update_query = mysqli_query($con, "UPDATE users SET password='$password' WHERE id='$id'");

			if($update_query) {
				array_push($error_array, "<span style='color:#14C800;'>Check your email for the new password</span><br>");
			}
			else
			{
				array_push($error_array, "<span style='color:#14C800;'>Password could not be changed :(</span><br>");
			}

			$to      = $fem; // Send email to our user
			$subject = 'Password Reset Request'; // Give the email a subject 
			$message = '
				Here is your new password!!!!!
				Your account has been created, you can login with the following credentials after you have activated your account by using the verification code below.
				 
				------------------------
				
				Password: '.$temp_pass.'
				
				------------------------
		
				'; 
				       
			$message = wordwrap($message,70); 
			$message = str_replace("\n.", "\n..", $message);  

			$headers = 'From:noreply@pop-up.com' . "\r\n"; // Set from headers
			mail($to, $subject, $message, $headers); // Send our email
	}
	else {
		array_push($error_array, "<span style='color:red;'>No such email found</span><br>");
	}
	// if ($hash == $ver_code) {
	// 	$user_closed_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND user_closed='yes'");
	// 		if(mysqli_num_rows($user_closed_query) == 1) {
	// 			$reopen_account = mysqli_query($con, "UPDATE users SET user_closed='no' WHERE email='$email'");
	// 		}
	// 	header("Location: home.php");
	// 	exit();
	// }else {
	// 	// put the error in the varibale $error_array
	// 	array_push($error_array, "<br>verification code was incorrect<br>");
	// }

}
?>