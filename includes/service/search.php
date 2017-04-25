<?php 

	/**
	* 
	*/
	class search
	{
		private $con;
		private $myId;
		function __construct($con,$id)
		{
			$this->con = $con;
			$this->myId = $id;
		}

		function searchUserAjax($username){
			$resultSet = mysqli_query($this->con,"SELECT * FROM users WHERE username LIKE '$username%' AND user_closed = 'no' LIMIT 5");
			//get all the friends' ids
			$friend_list = $this->searchFriend();
			$output = "";
			while ($row = mysqli_fetch_array($resultSet))
			{
				if (in_array($row['id'], $friend_list)) {
				$output .="
					<a href='friend_profile.php?friend_id=".$row['id']."'>
						<img src='".$row['profile_pic']."' class='img-circle' height='25' width='25'> ".$row['username']."
					</a>
					<input type='hidden' value='".$row['username']."'/>
					<input type='hidden' value='".$row['id']."'/>
					<a class='Delete' style='float: right'>
            			<i class='icon-remove'></i> Delete
          			</a>
					<hr>
				";
				}elseif ($row['id'] == $this->myId) {
				$output .="
					<a href='profile.php?username=".$row['username']."&id=".$row['id']."'>
						<img src='".$row['profile_pic']."' class='img-circle' height='25' width='25'> ".$row['username']."
					</a>
					<input type='hidden' value='".$row['username']."'/>
					<input type='hidden' value='".$row['id']."'/>
					<a href='home.php' style='float: right'>
            			<i class='icon-home'></i> Home
          			</a>
					<hr>
				";
				}else{
				$output .="
					<a href='#'>
						<img src='".$row['profile_pic']."' class='img-circle' height='25' width='25'> ".$row['username']."
					</a>
					<input type='hidden' value='".$row['username']."'/>
					<input type='hidden' value='".$row['id']."'/>
					<a class='Add' style='float: right'>
            			<i class='icon-ok'></i> Add
          			</a>
					<hr>
				";
				}
			}
			if ($output == '') {
				$output .= "<p>No result</p>";
			} else {
				$output .= "<a href='includes/form_handlers/search_handler.php?searchValue=".$username."'>More...</a>";
			}
			return $output;
		}

		function searchUserReg($username){
			$resultSet = mysqli_query($this->con,"SELECT * FROM users WHERE username LIKE '$username%' AND user_closed = 'no'");
			//get all the friends' ids
			$friend_list = $this->searchFriend();

			//output result
			$output="";
 			$enter=0;
 			$flag=0;
 			while ($row = mysqli_fetch_array($resultSet))
			{
				if ($enter%3 == 0) {
					$output .="<div class='row'>";
					$flag=$enter;
				}
				$output .="
				<div class='col-sm-4'>
 					<div class='result_box'>";
				//friend
				if (in_array($row['id'], $friend_list)) {
					$output .="
						<a href='friend_profile.php?friend_id=".$row['id']."'>
							<img src='".$row['profile_pic']."' class='img-circle' height='65' width='65'>
							<p style='margin-top: 10px'>".$row['username']."</p>
						</a>
						<input type='hidden' value='".$row['id']."'/>
						<a class='Delete' style='float: left'>
                			<i class='icon-remove'></i> Delete
              			</a>
					";
				}elseif ($row['id'] == $this->myId) {
					$output .="
						<a href='home.php'>
							<img src='".$row['profile_pic']."' class='img-circle' height='65' width='65'>
							<p style='margin-top: 10px'>".$row['username']."</p>
						</a>
						<input type='hidden' value='".$row['id']."'/>
						<a href='home.php' style='float: left'>
                			<i class='icon-home'></i> Home
              			</a>
					";
				}else{
					$output .="
						<a href='#'>
							<img src='".$row['profile_pic']."' class='img-circle' height='65' width='65'>
							<p style='margin-top: 10px'>".$row['username']."</p>
						</a>
						<input type='hidden' value='".$row['id']."'/>
						<a class='Add' style='float: left'>
                			<i class='icon-ok'></i> Add
              			</a>
					";
				}
				$output .="	
					</div>
				</div>
				";
				if ($enter-$flag == 2) {
					$output .="</div>";
				}
				$enter++;
			}
			return $output;
		}

		function filteredSearch($isFriend, $username, $age, $gender, $street, $city, $province, $country){
			$query = $this->friendFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country);
			$resultSet = mysqli_query($this->con,$query);

			//output result
			$output="";
 			$enter=0;
 			$flag=0;
 			while ($row = mysqli_fetch_array($resultSet))
			{
				if ($enter%3 == 0) {
					$output .="<div class='row'>";
					$flag=$enter;
				}
				$output .="
				<div class='col-sm-4'>
 					<div class='result_box'>
						<a href='#'>
							<img src='".$row['profile_pic']."' class='img-rounded' height='65' width='65'>
							<p style='margin-top: 10px'>".$row['username']."</p>
						</a>
						<input type='hidden' value='".$row['id']."'/>";
				//friend
				if ($row['id'] == $this->myId) {
					$output .="
						<a href='home.php' style='float: left'>
                			<i class='icon-home'></i> Home
              			</a>
					";
				}elseif ($isFriend == 1) {
					$output .="
						<a class='Delete' style='float: left'>
                			<i class='icon-remove'></i> Delete
              			</a>
					";
				}else{
					$output .="
						<a class='Add' style='float: left'>
                			<i class='icon-ok'></i> Add
              			</a>
					";
				}
				$output .="	
					</div>
				</div>
				";
				if ($enter-$flag == 2) {
					$output .="</div>";
				}
				$enter++;
			}
			return $output;
		}

		function friendFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country){

			if ($isFriend == 1) {
				$query = "
				SELECT * 
				FROM (SELECT u1.username, u1.profile_pic, u1.user_closed, u2.* FROM users u1, users2 u2 WHERE u1.id = u2.id) newUsers 
				WHERE (newUsers.id in (SELECT friend_id FROM user_friend WHERE user_id='$this->myId' AND block<>'yes') OR newUsers.id='$this->myId') 
				     AND newUsers.username LIKE '$username%' 
				     AND newUsers.user_closed = 'no' ";
			} else {
				$query = "
				SELECT * 
				FROM (SELECT u1.username, u1.profile_pic, u1.user_closed, u2.* FROM users u1, users2 u2 WHERE u1.id = u2.id) newUsers 
				WHERE (newUsers.id not in (SELECT friend_id FROM user_friend WHERE user_id='$this->myId' AND block<>'yes') AND newUsers.id<>'$this->myId') 
				     AND newUsers.username LIKE '$username%' 
				     AND newUsers.user_closed = 'no' ";
			}
			$query.=$this->ageFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country);
			return $query;
			
		}

		function ageFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country){
			$query="";
			if ($age!='') {
				$query.="AND newUsers.age='$age' ";
			} 
			$query.=$this->genderFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country);
			return $query;
		}

		function genderFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country){
			$query="";
			if ($gender!='') {
				$query.="AND newUsers.gender='$gender' ";
			} 
			$query.=$this->streetFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country);
			return $query;
		}

		function streetFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country){
			$query="";
			if ($street!='') {
				$query.="AND newUsers.street LIKE '%$street%' ";
			} 
			$query.=$this->cityFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country);
			return $query;
		}

		function cityFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country){
			$query="";
			if ($city!='') {
				$query.="AND newUsers.city LIKE '$city%' ";
			} 
			$query.=$this->provinceFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country);
			return $query;
		}

		function provinceFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country){
			$query="";
			if ($province!='') {
				$query.="AND newUsers.province='$province' ";
			} 
			$query.=$this->countryFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country);
			return $query;
		}

		function countryFilter($isFriend, $username, $age, $gender, $street, $city, $province, $country){
			$query="";
			if ($country!='') {
				$query.="AND newUsers.country='$country' ";
			} 
			return $query;
		}

		function searchUserRegFriend($username){
			$query = "SELECT * FROM users WHERE (id in (SELECT friend_id FROM user_friend WHERE user_id='$this->myId' AND block='no') OR id='$this->myId') AND username LIKE '$username%' AND user_closed = 'no' ";
			//search friend
			$friendResultSet = mysqli_query($this->con,$query);
			
			//output result
			$output="";
 			$enter=0;
 			$flag=0;
 			while ($row = mysqli_fetch_array($friendResultSet))
			{
				if ($enter%3 == 0) {
					$output .="<div class='row'>";
					$flag=$enter;
				}
				$output .="
				<div class='col-sm-4'>
 					<div class='result_box'>
						<a href='#'>
							<img src='".$row['profile_pic']."' class='img-rounded' height='65' width='65'>
							<p style='margin-top: 10px'>".$row['username']."</p>
						</a>
						<input type='hidden' value='".$row['id']."'/>
						<a class='Delete' style='float: left'>
                			<i class='icon-remove'></i> Delete
              			</a>
					</div>
				</div>
				";
				if ($enter-$flag == 2) {
					$output .="</div>";
				}
				$enter++;
			}
			return $output;
		}

		function searchUserRegNonfriend($username){
			$query = "SELECT * FROM users WHERE id not in (SELECT friend_id FROM user_friend WHERE user_id='$this->myId' AND block='no') AND id<>'$this->myId' AND username LIKE '$username%' AND user_closed = 'no' ";
			//search friend
			$nonfriendResultSet = mysqli_query($this->con,$query);
			
			//output result
			$output="";
 			$enter=0;
 			$flag=0;
 			while ($row = mysqli_fetch_array($nonfriendResultSet))
			{
				if ($enter%3 == 0) {
					$output .="<div class='row'>";
					$flag=$enter;
				}
				$output .="
				<div class='col-sm-4'>
 					<div class='result_box'>
						<a href='#'>
							<img src='".$row['profile_pic']."' class='img-rounded' height='65' width='65'>
							<p style='margin-top: 10px'>".$row['username']."</p>
						</a>
						<input type='hidden' value='".$row['id']."'/>
              			<a class='Add' style='float: left'>
                			<i class='icon-ok'></i> Add
              			</a>
					</div>
				</div>
				";
				if ($enter-$flag == 2) {
					$output .="</div>";
				}
				$enter++;
			}
			return $output;
		}
		

		//get only friends
		function searchFriend(){
			$friendsIdList = mysqli_query($this->con,"SELECT friend_id FROM user_friend WHERE user_id='$this->myId' AND block<>'yes' ");
			
			$friends = array();
			//if exists any friend
			if (mysqli_num_rows($friendsIdList) >= 1) {
				while ($row = mysqli_fetch_array($friendsIdList)){
					array_push($friends, $row['friend_id']);
				}
				unset($row);
			}

			return $friends;
		}


	}
 ?>
 				