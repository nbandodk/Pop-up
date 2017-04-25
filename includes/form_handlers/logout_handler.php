<?php 
	require '../../config/config.php';

	session_start(); 
	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
		
		$date_time_now = date("Y-m-d H:i:s");
		$last_seen_status_query  = mysqli_query($con, "UPDATE user_last_seen_status SET logged_in = 'no',last_online_time = '$date_time_now' WHERE id = '$id'");

	}

	session_destroy();

	header("Location: ../../register.php");
?>