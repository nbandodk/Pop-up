<?php 
$error_array = array(); //errors
if (isset($_SESSION['id'])) {
		
		if(isset($_POST['change_pass_button'])) {
			
			
			

			//Password2
			$password2 = strip_tags($_POST['password2']); //remove html tags
			$password2 = md5($password2);
			$id = $_SESSION['id'];

			$update_query = mysqli_query($con, "UPDATE users SET password='$password2' WHERE id='$id'");
			

			if($update_query) {
				array_push($error_array, "<span style='color:#14C800;'>Password changed successfully!</span><br>");
			}
			else
			{
				array_push($error_array, "<span style='color:#14C800;'>Password could not be changed :(</span><br>");
			}
		}


		
	} 
	else {

		header("Location: register.php");
	}







 ?>