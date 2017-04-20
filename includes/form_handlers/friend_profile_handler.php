 <?php 
	if(isset($_SESSION['id'])) {
		$user_id = $_GET['friend_id'];
		$user_details_query  = mysqli_query($con, "SELECT * FROM users WHERE id='$user_id'");
		$user = mysqli_fetch_array($user_details_query);
		
		$user_details_query  = mysqli_query($con, "SELECT * FROM users2 WHERE id='$user_id'");
		$user2 = mysqli_fetch_array($user_details_query);
	}else {
		header("Location: register.php");
		exit;
	}
 ?>