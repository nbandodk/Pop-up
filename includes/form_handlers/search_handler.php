<?php 
	require '../../config/config.php';
	require '../service/search.php';
	if (isset($_SESSION['id'])) {
		$search_result = new search($con);
		if (isset($_REQUEST['searchRegisteredUserAjax'])) {
			//do the search ajax
			//echo 
		} else {
			//do the regular search
			//$_SESSION['search_result'] = $search_result
			header("Location: ../../search_result.php");
		}
	} else {
		header("Location: ../../register.php");
	}
 ?>