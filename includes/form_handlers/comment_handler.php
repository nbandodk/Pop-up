<?php 
	require '../../config/config.php';
	require '../service/comment.php';
	
	if (isset($_SESSION['id'])) {
		//remove html tags
		$comment = strip_tags($_REQUEST['comment']); 
		//remove spaces at the beginning and the end of the comment
		$comment = trim($comment); 
		if ($comment!='') {
			$comment_obj = new comment($con,$_SESSION['id']);
		 	// insert the data into the table named comment
		 	$output = $comment_obj->insertComments($_REQUEST);
		 	echo $output;
		} else {
			echo "<p>Please enter the content!</p>";
		}
	}else{
		header("Location: ../../register.php");
	}
?>