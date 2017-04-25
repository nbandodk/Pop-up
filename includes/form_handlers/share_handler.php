<?php
	require '../service/post.php';
	require '../../config/config.php';

	if (isset($_REQUEST['shareUsername'])) {
		//store shared post
		$shareContent = $_REQUEST['shareContent'];
		//shareUsername is the username who post it
		$shareUsername = $_REQUEST['shareUsername'];
		$user_id = $_SESSION['id'];
		$post_obj = new post($con, $user_id);
		$post_obj->submitSharedPost($shareUsername,$shareContent);
	}
?>