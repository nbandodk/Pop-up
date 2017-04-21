<?php 
	require '../../config/config.php';
	$id = $_SESSION['id'];
	$fname = $_POST['profname'];
	$lname = $_POST['prolname'];
	$email = $_POST['proemail'];
	$age = $_POST['proage'];
	$gender = $_POST['progender'];
	mysqli_query($con,"UPDATE users SET first_name='$fname', last_name='$lname', email='$email' WHERE id='$id'");

	$is = mysqli_num_rows(mysqli_query($con,"SELECT * FROM users2 WHERE id='$id'"));
	if ($is >= 1) {
		mysqli_query($con,"UPDATE users2 SET age='$age', gender='$gender' WHERE id='$id'");
	} else {
		mysqli_query($con,"INSERT INTO users2 VALUES('$id','$age','$gender','','','','','','','')");
	}
	
	header("Location: ../../profile.php?username=".$_SESSION['username']."&id=".$id);


?>