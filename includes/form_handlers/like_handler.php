<script src="assets/js/flat.js"></script>
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
	    		<a href='profile.php?username=".$like['username']."&id=".$like['user_id']."'>
	            	<img src='".$like['profile_pic']."' class='img-circle' height='20' width='20' data-toggle='tooltip' data-placement='top' title='".$like['username']."'>
	            </a>";
		    }
		    echo $output;
	    }else{
	    	$output = "
	    		<i class='icon-heart-empty' aria-hidden='true'></i> (".$like_obj->selectPosts($_REQUEST['postId']).")
			";
	    	echo $output;
	    }
	}else{
		header("Location: ../../register.php");
	}
?>