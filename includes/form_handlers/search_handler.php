<?php 
	require '../../config/config.php';
	require '../service/search.php';
	if (isset($_SESSION['id'])) {
		$search_result = new search($con,$_SESSION['id']);
		if (isset($_REQUEST['searchRegisteredUserAjax'])) {
			//do the search ajax
			echo $search_result->searchUserAjax($_REQUEST['searchedUsername']);
		} else {
			//do the regular search
			if (isset($_POST['searchForm'])) {
				$_SESSION['search_result'] = $search_result->searchUserReg($_POST['searchForm']); 
			}else{
				$_SESSION['search_result'] = $search_result->searchUserReg($_GET['searchValue']); 
			}

			header("Location: ../../search_result.php");
		}
	} else {
		header("Location: ../../register.php");
	}
 ?>