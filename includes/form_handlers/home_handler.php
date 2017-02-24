<?php 
	//Decalring vars
	$id = "";
	$profile_pic = "";
	//coding here
	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
		$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
		$tuple = mysqli_fetch_array($check_database_query);
		$profile_pic = $tuple['profile_pic'];
	} else {
		header("Location: register.php");
	}
?>