<?php 
	require '../../config/config.php';
	require '../service/search.php';

	if (isset($_POST['age'])) {
		//isFriend
		$isFriend = $_POST['isFriend'];

		//username
		$username = strip_tags($_POST['username']);
		$username = str_replace(' ', '', $username); 

		//age
		$age = strip_tags($_POST['age']); //remove html tags
		$age = str_replace(' ', '', $age); //remove spaces

		//gender
		$gender = strip_tags($_POST['gender']);
		$gender = str_replace(' ', '', $gender); 

		//street
		$street = strip_tags($_POST['street']);
		$street = str_replace(' ', '', $street); 

		//city
		$city = strip_tags($_POST['city']);
		$city = str_replace(' ', '', $city); 
		
		//province
		$province = strip_tags($_POST['province']);
		$province = str_replace(' ', '', $province); 
		
		//country
		$country = strip_tags($_POST['country']);
		$country = str_replace(' ', '', $country); 

		$search_result = new search($con,$_SESSION['id']);
		$_SESSION['search_result'] = $search_result->filteredSearch($isFriend, $username, $age, $gender, $street, $city, $province, $country);
		if ($_SESSION['search_result'] == '') {
			$_SESSION['search_result'] = "<p>No Result</p>";
		}
		header("Location: ../../search_result.php");
	}
 ?>