<?php 

	//Decalring vars
	$id = "";
	$user = array();
	//coding here
	if (isset($_SESSION['id'])) {
		$id = $_SESSION['id'];
		$check_database_query = mysqli_query($con, "SELECT * FROM users WHERE id='$id'");
		$user = mysqli_fetch_array($check_database_query);
	} else {
		header("Location: register.php");
	}
?>