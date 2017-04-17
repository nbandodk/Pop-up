<?php 
	require '../../config/config.php';
	$id = $_SESSION['id'];
	$street = $_POST['locstreet'];
	$city = $_POST['loccity'];
	$state = $_POST['locstate'];
	$country = $_POST['loccountry'];
	$is = mysqli_query($con,"SELECT count(id) FROM users2 WHERE id='$id'");
	if ($is >= 1) {
		mysqli_query($con,"UPDATE users2 SET street='$street', city='$city', province='$state', country='$country' WHERE id='$id'");
	} else {
		mysqli_query($con,"INSERT INTO users2 VALUES('$id','','','$street','$city','$state','$country','','','')");
	}
	
	header("Location: ../../profile.php?username=".$_SESSION['username']."&id=".$id);


?>