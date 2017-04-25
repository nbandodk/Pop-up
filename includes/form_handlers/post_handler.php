<?php 
	require '../../config/config.php';
	require '../service/post.php';

	if (isset($_POST['home_post'])) {
		//store post in home page
		$user_id = $_SESSION['id'];
		$username = $_SESSION['username'];
		$body = $_POST['home_post'];
		$post_obj = new post($con, $user_id);
		$post_obj->submitPost($body);

		header("Location: ../../home.php");

	}elseif (isset($_POST['post_img'])) {
		$user_id = $_SESSION['id'];
		$username = $_SESSION['username'];

		$filetemp = $_FILES['img']['tmp_name'];
		$filename = $username.md5(time()).$_FILES['img']['name'];
		$filetype = $_FILES['img']['type'];
		$filepath = "../../assets/images/post_pics/".$filename;
		$filedbpath = "assets/images/post_pics/".$filename;

		move_uploaded_file($filetemp, $filepath);

		$post_obj = new post($con, $user_id);
		$post_obj->submitImagePost($filedbpath);

		header("Location: ../../home.php");
		
	}elseif (isset($_POST['post_video'])) {
		$user_id = $_SESSION['id'];
		$username = $_SESSION['username'];

		$filetemp = $_FILES['file']['tmp_name'];
		$filename = $username.md5(time()).$_FILES['file']['name'];
		$filetype = $_FILES['file']['type'];
		$filepath = "../../assets/images/post_videos/".$filename;
		$filedbpath = "assets/images/post_videos/".$filename;

		move_uploaded_file($filetemp, $filepath);

		$post_obj = new post($con, $user_id);
		$post_obj->submitVideoPost($filedbpath);

		header("Location: ../../home.php");

	}elseif (isset($_POST['profile_post'])){
		//store post in profile page
		$user_id = $_SESSION['id'];
		$username = $_SESSION['username'];
		$body = $_POST['profile_post'];
		$post_obj = new post($con, $user_id);
		$post_obj->submitPost($body);

		header("Location: ../../profile.php?username=".$username."&id=".$user_id);
		
	}elseif (isset($_POST['pro_post_img'])) {
		$user_id = $_SESSION['id'];
		$username = $_SESSION['username'];

		$filetemp = $_FILES['img']['tmp_name'];
		$filename = $username.md5(time()).$_FILES['img']['name'];
		$filetype = $_FILES['img']['type'];
		$filepath = "../../assets/images/post_pics/".$filename;
		$filedbpath = "assets/images/post_pics/".$filename;

		move_uploaded_file($filetemp, $filepath);

		$post_obj = new post($con, $user_id);
		$post_obj->submitImagePost($filedbpath);

		header("Location: ../../profile.php?username=".$username."&id=".$user_id);

	}elseif (isset($_POST['pro_post_video'])) {
		$user_id = $_SESSION['id'];
		$username = $_SESSION['username'];

		$filetemp = $_FILES['file']['tmp_name'];
		$filename = $username.md5(time()).$_FILES['file']['name'];
		$filetype = $_FILES['file']['type'];
		$filepath = "../../assets/images/post_videos/".$filename;
		$filedbpath = "assets/images/post_videos/".$filename;

		move_uploaded_file($filetemp, $filepath);

		$post_obj = new post($con, $user_id);
		$post_obj->submitVideoPost($filedbpath);

		header("Location: ../../profile.php?username=".$username."&id=".$user_id);
		
	}elseif (isset($_SESSION['Loading'])) {
		$user_id = $_SESSION['id'];
		$post_obj = new post($con, $user_id);

		echo $post_obj->loadAllFriendsPosts($_REQUEST,3);

	}elseif (isset($_SESSION['Loading_myposts'])) {
		$user_id = $_SESSION['id'];
		$post_obj = new post($con, $user_id);

		echo $post_obj->loadAllMyPosts($_REQUEST,2);
		
	}elseif (isset($_SESSION['Loading_onefriendposts'])) {
		$user_id = $_REQUEST['onefriend_id'];
		$post_obj = new post($con, $user_id);

		echo $post_obj->loadOneFriendPosts($_REQUEST,2,$user_id);
		
	}else {
		header("Location: ../../register.php");
	}
 ?>