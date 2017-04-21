<?php 
	require '../../config/config.php';

	$id = $_SESSION['id'];
	$theme = $_POST['theme_src'];
	mysqli_query($con,"UPDATE users2 SET background_pic='$theme' WHERE id='$id'");
	
	header("Location: ../../profile.php?username=".$_SESSION['username']."&id=".$id);
 ?>