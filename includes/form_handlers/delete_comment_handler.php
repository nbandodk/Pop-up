<?php 
	require '../../config/config.php';
	require '../service/comment.php';

	if (isset($_REQUEST['delete_comment'])){
		$comment_obj = new comment($con);
		$comment_obj->deleteComments($_REQUEST['commentId']);
	}else{
		header("Location: ../../register.php");
	}
 ?>