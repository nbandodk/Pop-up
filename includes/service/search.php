<?php 

	/**
	* 
	*/
	class search
	{
		private $con;
		function __construct($con)
		{
			$this->con = $con;
		}

		function searchUserAjax($username){
			$resultSet = mysqli_query($this->con,"SELECT * FROM users WHERE username LIKE '$username%' AND user_closed = 'no' LIMIT 3");
			$output = "";
			while ($row = mysqli_fetch_array($resultSet))
			{
				$output .="
					<a href='#'>
						<img src='".$row['profile_pic']."' class='img-circle' height='25' width='25'>".$row['username']."
					</a>
					<hr>
				";
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
 					<div class='box'>
						<a href='#'>
							<img src='".$row['profile_pic']."' class='img-circle' height='55' width='55'>
						</a>
						<p>".$row['username']."</p>
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

		function searchContent($content){
			mysqli_query($this->con,"SELECT * FROM posts WHERE text LIKE '%$content%'");
		}
	}
 ?>