 <?php 
	if(isset($_SESSION['username'])) {
		$userLoggedIn = $_SESSION['username'];
		if (!(isset($_GET['username']) && isset($_GET['id']))) {
			header("Location: home.php");
			exit;
		}
	}else {
		header("Location: register.php");
		exit;
	}

	if($_SESSION['username'] == $_GET['username'] and $_SESSION['id'] == $_GET['id']) {
		$user_id = $_GET['id'];
		$user_details_query  = mysqli_query($con, "SELECT * FROM users WHERE id='$user_id'");
		$user = mysqli_fetch_array($user_details_query);
		// getting friends of the user on whose profile who are:
		$user_friends_query = mysqli_query($con, "SELECT user_id FROM user_friend WHERE user_id='$user_id'");
		$friendNum = mysqli_num_rows($user_friends_query);
		// getting number of user posts
		$check_database_query = mysqli_query($con, "SELECT id FROM posts WHERE added_by_id='$user_id' and deleted='no'");
		$postNum = mysqli_num_rows($check_database_query);
		//get the friends list of the user 
		$user_friends = mysqli_query($con, "SELECT friend_id FROM user_friend WHERE user_id='$user_id'");
		$user2 = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM users2 WHERE id='$user_id'"));
	}else {
		header("Location: home.php");
		exit;
	}

	if(isset($_POST['update_profile_picture'])) {
		header("Location: upload.php");
		exit;
	}
 ?>