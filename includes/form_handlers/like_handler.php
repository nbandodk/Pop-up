<?php 
	require '../../config/config.php';
	require '../service/like.php';
	
	if (isset($_SESSION['id'])) {
		$like_obj = new like($con);
	    if (isset($_REQUEST['username'])) {
	    	$like_obj->update_likes($_REQUEST);
			$likeResultSet=$like_obj->selectLikes($_REQUEST['postId']);
			$output = "";
			while ($like = mysqli_fetch_array($likeResultSet)){
		    	$output .="
	    		<a href='#'>
	            	<img src='".$like['profile_pic']."' class='img-circle' height='25' width='25'>
	            	<input type='hidden' value='".$like['username']."'>
	            </a>";
		    }
		    echo $output;
	    }else{
	    	$output = "
	    		<i class='fa fa-thumbs-up' aria-hidden='true'></i>
				Likes (".$like_obj->selectPosts($_REQUEST['postId']).")
			";
	    	echo $output;
	    }
	}else{
		header("Location: ../../register.php");
	}
?>