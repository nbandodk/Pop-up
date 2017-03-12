<?php 
	require '../../config/config.php';
	require '../service/post.php';

	if (isset($_POST['home_post'])) {
		//store post
		$user_id = $_SESSION['id'];
		$username = $_SESSION['username'];
		$body = $_POST['home_post'];
		$post_obj = new post($con, $user_id);
		$post_obj->submitPost($body);

		header("Location: ../../home.php");
	}else{
		header("Location: ../../register.php");
	}
	
 ?>