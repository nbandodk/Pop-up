<?php 
	//coding here
	require '../../config/config.php';
	require '../service/Message.php';

	if (isset($_SESSION['id']) && isset($_POST["num_friends"]) ) {
		$id = $_SESSION['id'];
		$num_friends = $_POST['num_friends'];

		$num_friends_query = mysqli_query($con, "SELECT friend_id FROM user_friend WHERE user_id='$id' AND block='no' ");
		$num_friends = mysqli_num_rows($num_friends_query);

		$data = "";

		if($num_friends > 0) {

			$suggest_friends_query = mysqli_query($con, "select DISTINCT u1.friend_id from user_friend u1 JOIN 
														(SELECT u2.friend_id from user_friend u2 where u2.user_id='$id')w 
														ON u1.user_id = w.friend_id
														and u1.friend_id <> '$id' and u1.friend_id NOT in 
														(SELECT friend_id FROM user_friend WHERE user_id ='$id')
														limit 4" );
		  }
		else {
			$suggest_friends_query = mysqli_query($con, "select id as friend_id from users where id <>'$id' and RAND()<=0.6 limit 4");
		}

            while ($user_friend=mysqli_fetch_array($suggest_friends_query)) {
					    			//get the name and img of the friends
				$friend = new user($con, $user_friend['friend_id']);
				$data = $data . "
					<div class=' panel-heading' style='padding-left: 15px; padding-top: 12px; padding-bottom: 12px;'>
  						<h4 class='panel-title'>
  							<input type='submit' name='add_friend' class='add_friend_class' value='Add ' style='float:right; border-radius:5px; background-color:#2ecc71; border:1px solid #2ecc00; padding:2px 5px; opacity:0.98;'>

    						<a href='friend_profile.php?friend_id=".$friend->getUserid()."'><img src='".$friend->getProfile_pic()."' class='img-circle' height='25' width='25'><br> &nbsp".$friend->getUsername()."</a>

  						</h4>
					</div>
					<hr style='margin:0; border-top:1px solid #ddd'>";
					
    		}

    		echo $data;

    }
				    		
					    			
?>
