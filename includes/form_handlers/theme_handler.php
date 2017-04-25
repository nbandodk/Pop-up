<?php 
	require '../../config/config.php';

	$id = $_SESSION['id'];
	$theme = $_POST['theme_src'];

	$is = mysqli_num_rows(mysqli_query($con,"SELECT * FROM users2 WHERE id='$id'"));
	if ($is >= 1) {
		mysqli_query($con, "UPDATE users2 SET background_pic='$theme' WHERE id='$id'");
	} else {
		mysqli_query($con, "INSERT INTO users2 VALUES('$id','','','','','','','$theme','','')");
	}
	
	header("Location: ../../profile.php?username=".$_SESSION['username']."&id=".$id);
 ?>