<?php 
require '../../config/config.php';
if (isset($_SESSION['id'])) {
		
	if(isset($_POST['reset_password'])) {
		
		$password2 = strip_tags($_POST['reset_password']);
		$password2 = md5($password2);
		$id = $_SESSION['id'];
		mysqli_query($con, "UPDATE users SET password='$password2', user_closed='yes' WHERE id='$id'");
	}		
} 
else {
	header("Location: register.php");
}

 ?>