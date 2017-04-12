<?php
include("../../config/config.php");
include("../service/user.php");
require 'home_handler.php';

$query = $_POST['query'];
$userLoggedIn_id = $_POST['userLoggedIn_id'];

//   $user_friends_details	This is the array that holds the user friends details



$search_results_array = array(); // to hold results that match the entered text


$names = explode(" ", $query); // splitting the strings on space

	foreach($user_friends_details as $friend) {
	    
		//  if query contains "_" check for username  nikil_chil

	    if(strpos($query, "_") !== false) {		
	    	if(strpos($friend['username'], $query))
				$search_results_array = $friend;
		}

		//  if query contains two words check for first and last names respectively

		else if(count($names) == 2) {
			if( ( strpos($friend['first_name'], '$names[0]') ) AND ( strpos($friend['last_name'], '$names[0]') ) )
			$search_results_array = $friend;
		}
		 
		 // //  if query contains only one word  check if it matches with either first or last name

		else {
			if( ( strpos($friend['first_name'], '$names[0]') ) OR ( strpos($friend['last_name'], '$names[0]') ) )
			$search_results_array = $friend;
		}

	}


	foreach ($search_results_array as $friends_result) {

		echo "<div class='resultDisplay'>
					<a href='messages.php?u=" . $friends_result['id'] . "' style='color: #000'>
						<div class='liveSearchProfilePic'>
							<img src='". $friends_result['profile_pic'] . "'>
						</div>

						<div class='liveSearchText'>
							".$friends_result['first_name'] . " " . $friends_result['last_name']. "
							<p style='margin: 0;'>". $friends_result['username'] . "</p>
						</div>
					</a>
				</div>";

		
	}
		

	echo " It is working";
	
?>