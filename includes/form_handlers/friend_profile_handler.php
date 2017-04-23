 <?php 
	if(isset($_SESSION['id'])) {
		$current_user_id = $_SESSION['id'];
		$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE id='$current_user_id'");
		$current_user = mysqli_fetch_array($user_details_query);

		//the info of friend in table users
		$user_id = $_GET['friend_id'];
		$user_details_query  = mysqli_query($con, "SELECT * FROM users WHERE id='$user_id'");
		$user = mysqli_fetch_array($user_details_query);
		
		//the info of friend in table users2 
		$user_details_query  = mysqli_query($con, "SELECT * FROM users2 WHERE id='$user_id'");
		$user2 = mysqli_fetch_array($user_details_query);
	}else {
		header("Location: register.php");
		exit;
	}
 ?>