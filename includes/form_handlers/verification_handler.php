<?php 
$error_array = array(); //errors

if (isset($_SESSION['hash'])) {
	if(isset($_POST['verification_button'])) {

	$hash = $_SESSION['hash'];
	$email = $_SESSION['log_email'];
	$ver_code = strip_tags($_POST['ver_code']); //remove html tags
	$ver_code = str_replace(' ', '', $ver_code); //remove spaces

	if ($hash == $ver_code) {
		$user_closed_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND user_closed='yes'");
		$row = mysqli_fetch_array($user_closed_query);
		$id = $row['id'];
			if(mysqli_num_rows($user_closed_query) == 1) {
				$reopen_account = mysqli_query($con, "UPDATE users SET user_closed='no' WHERE email='$email'");
			}
			$_SESSION['id'] = $id;
		header("Location: home.php");
		exit();
	}else {
		// put the error in the varibale $error_array
		array_push($error_array, "<br>verification code was incorrect<br>");
	}
}
} else {
	header("Location: register.php");
}

?>