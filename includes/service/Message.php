<?php 
	require 'user.php';
	require 'like.php';
	require 'comment.php';
	/**
	* 
	*/
	class Message 
	{
		private $con;
		private $id;
		private $user_obj;
		
		function __construct($con,$id){
			$this->con = $con;
			$this->id = $id;
			$this->user_obj = new user($con, $id);
		}

		public function getMostRecentUser(){
			$userLoggedIn_id = $this->user_obj->getUserid();
			$query = mysqli_query($this->con, "SELECT user_to_id, user_from_id FROM messages WHERE user_to_id ='$userLoggedIn_id' OR user_from_id = '$userLoggedIn_id' ORDER BY id DESC LIMIT 1" );
			if(mysqli_num_rows($query) == 0)
				return 0;
			$row = mysqli_fetch_array($query);
			$user_to_id = $row['user_to_id'];
			$user_from_id = $row['user_from_id'];

			if($user_to_id  != $userLoggedIn_id)
				return $user_to_id;
			else
				return $user_from_id;
			
		}

		public function sendMessage($user_to_id, $body, $date) {
			if($body != "") {
				$userLoggedIn_id = $this->user_obj->getUserId();
				$query = mysqli_query($this->con,"INSERT INTO messages VALUES('', '$user_to_id', '$userLoggedIn_id', '$body', '$date', 'no', 'no', 'no')");
			}
		}


		public function sendAndShowSentMessage($user_to_id, $body, $date)  {
			if($body != "") {
				$userLoggedIn_id = $this->user_obj->getUserId();
				$query = mysqli_query($this->con,"INSERT INTO messages VALUES('', '$user_to_id', '$userLoggedIn_id', '$body', '$date', 'no', 'no', 'no')");
				$data = "";
				$div_top = "<div class='message' id='blue'>";
				$data = $data . $div_top . $body . "</div><br><br>";
				return $data;
			}
		}

		
		public function getMessages($otherUser_id) {
			$userLoggedIn_id = $this->user_obj->getUserId();
			$data = "";

			$query = mysqli_query($this->con, "UPDATE messages SET opened='yes' , seen='yes' WHERE user_to_id='$userLoggedIn_id' AND user_from_id='$otherUser_id'");
			$get_messages_query = mysqli_query($this->con, "SELECT * FROM messages WHERE (user_to_id = '$userLoggedIn_id' AND user_from_id = '$otherUser_id') OR (user_to_id = '$otherUser_id' AND user_from_id = '$userLoggedIn_id') ");

			while($row = mysqli_fetch_array($get_messages_query)) {
				$user_to_id = $row['user_to_id'];
				$user_from_id = $row['user_from_id'];
				$body = $row['message_body'];

				$div_top = ($user_to_id == $userLoggedIn_id) ? "<div class='message' id='green'>" : "<div class='message' id='blue'>";
				$data = $data . $div_top . $body . "</div><br><br>"; 
			}
			return $data;
		}


		public function getUnseenMessages($otherUser_id){
			$userLoggedIn_id = $this->user_obj->getUserId();
			$data = "";

			$get_messages_query = mysqli_query($this->con, "SELECT * FROM messages WHERE (user_to_id = '$userLoggedIn_id' AND user_from_id = '$otherUser_id') AND seen = 'no' ");


			$query = mysqli_query($this->con, "UPDATE messages SET opened='yes', seen='yes'  WHERE user_to_id='$userLoggedIn_id' AND user_from_id='$otherUser_id' AND opened='no'");
			
			while($row = mysqli_fetch_array($get_messages_query)) {
				$user_to_id = $row['user_to_id'];
				$user_from_id = $row['user_from_id'];
				$body = $row['message_body'];

				$div_top = ($user_to_id == $userLoggedIn_id) ? "<div class='message' id='green'>" : "<div class='message' id='blue'>";
				$data = $data . $div_top . $body . "</div><br><br>"; 
			}
			return $data;
		
		}


		public function getLatestMessage($userLoggedIn_id,$user2_id){
			$details_array = array();

			$query = mysqli_query($this->con,"SELECT message_body, user_to_id, date,seen FROM messages WHERE (user_to_id ='$userLoggedIn_id' AND user_from_id = '$user2_id') OR (user_to_id ='$user2_id' AND user_from_id = '$userLoggedIn_id') ORDER BY id DESC LIMIT 1");

			$row = mysqli_fetch_array($query);
			$sent_by = ($row['user_to_id'] == $userLoggedIn_id) ? "They said: " : "You said: " ;

					$date_time_now = date("Y-m-d H:i:s");
					$start_date = new DateTime($row['date']); 
					$end_date = new DateTime($date_time_now); 
					$interval = $start_date->diff($end_date); 
					$time_message = ""; 
					if($interval->y >= 1) {
						if($interval == 1)
							$time_message = $interval->y . " year ago"; //1 year ago
						else 
							$time_message = $interval->y . " years ago"; //1+ year ago
					}
					else if ($interval-> m >= 1) {
						if($interval->d == 0) {
							$days = " ago";
						}
						else if($interval->d == 1) {
							$days = $interval->d . " day ago";
						}
						else {
							$days = $interval->d . " days ago";
						}


						if($interval->m == 1) {
							$time_message = $interval->m . " month". $days;
						}
						else {
							$time_message = $interval->m . " months". $days;
						}

					}
					else if($interval->d >= 1) {
						if($interval->d == 1) {
							$time_message = "Yesterday";
						}
						else {
							$time_message = $interval->d . " days ago";
						}
					}
					else if($interval->h >= 1) {
						if($interval->h == 1) {
							$time_message = $interval->h . " hour ago";
						}
						else {
							$time_message = $interval->h . " hours ago";
						}
					}
					else if($interval->i >= 1) {
						if($interval->i == 1) {
							$time_message = $interval->i . " minute ago";
						}
						else {
							$time_message = $interval->i . " minutes ago";
						}
					}
					else {
						if($interval->s < 30) {
							$time_message = "Just now";
						}
						else {
							$time_message = $interval->s . " seconds ago";
						}
					}

			array_push($details_array, $sent_by);
			array_push($details_array, $row['message_body']);
			array_push($details_array, $time_message);
			array_push($details_array, $row['seen']);

			return $details_array;
		}

		public function getChats() {
			$userLoggedIn_id = $this->user_obj->getUserid();
			$return_string = "";
			$chats = array();

			$query = mysqli_query($this->con, "SELECT user_to_id, user_from_id FROM messages WHERE user_to_id ='$userLoggedIn_id' OR user_from_id = '$userLoggedIn_id' ORDER BY id DESC");

			while($row = mysqli_fetch_array($query)){
				$user_to_push_id = ($row['user_to_id']!= $userLoggedIn_id) ? $row['user_to_id'] : $row['user_from_id'];
				if(!in_array($user_to_push_id, $chats)) {
					array_push($chats, $user_to_push_id);
				}
			}

			foreach ($chats as $id) {
				$user_found_obj =  new User($this->con,$id);
				$latest_message_details = $this->getLatestMessage($userLoggedIn_id,$id);
				$dots = (strlen($latest_message_details[1]) >= 12) ? "..." : "";
				$split = str_split($latest_message_details[1], 12);
				$split = $split[0] . $dots; 

				if($latest_message_details[3] == 'no') {
				$return_string .= "
					<a href='messages.php?u=$id' id='latest_chat'> <div class='box b1' style='background-color: aliceblue;'>
						<div class='user_found_messages'>
							<img class='img-rounded' src='" . $user_found_obj->getProfile_pic() . "' style='margin-right: 5px; margin-top: 5px'>
							" . $user_found_obj->getUsername() . "<br>
							<span class='timestamp_smaller' id='grey'> " . $latest_message_details[2] . "</span><br>
							<p id='grey' style='margin: 0;'>" . $latest_message_details[0] . $split . " </p>
							</div>
						</div>
					</a>";
				}
				else {
				$return_string .= "
					<a href='messages.php?u=$id'> <div class='box b1' style='background-color:#fff;'>
							<div class='user_found_messages'>
								<img class='img-rounded' src='" . $user_found_obj->getProfile_pic() . "' style='margin-right: 5px; margin-top: 5px'>
								" . $user_found_obj->getUsername() . "<br>
								<span class='timestamp_smaller' id='grey'> " . $latest_message_details[2] . "</span><br>
								<p id='grey' style='margin: 0;'>" . $latest_message_details[0] . $split . " </p>
							</div>
						</div>
					</a>";
				}
			}
			return $return_string;
		}
	}
?>