<?php 
require '../../config/config.php';
require '../service/post.php';

	if (isset($_REQUEST['delete_post'])){
		$user_id = $_SESSION['id'];
		$post_obj = new post($con, $user_id);
		echo $post_obj->deleteMyPost($_REQUEST);
	}else{
		header("Location: ../../register.php");
	}
 ?>