<?php 
require 'config/config.php';
require 'includes/service/search.php';
	
	// $search_result = new search($con);
	// echo $search_result->searchUserAjax("niu");
	
	$resultSet = mysqli_query($con,"SELECT * FROM users WHERE username LIKE 'n%' AND user_closed = 'no'");
			$output = "";
			$i=0;
			while ($row = mysqli_fetch_array($resultSet) and $i<3){
				// $output .="
				// 	<a href='#'>
				// 		<img src='".$row['profile_pic']."' class='img-circle' height='25' width='25'>".$row['username']."
				// 	</a>
				// 	<hr>
				// ";
				$i++;
				echo $row['username'];
			}
			echo $output;


 ?>