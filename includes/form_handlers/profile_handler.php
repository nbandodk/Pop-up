<?php 
	if (isset($_SESSION['username'])) {
		if ($_SESSION['username'] == $_GET['username'] && $_SESSION['id'] == $_GET['id']) {
		}else{
			header("Location: ../home.php");
		}
	}else {
		header("Location: register.php");
	}
 ?>