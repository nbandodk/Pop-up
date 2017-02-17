<?php 
require 'config/config.php'; //connect to database 
?>



<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Pop-up!</title>
</head>
<body>
	Hello <?php  echo $_SESSION['username']?>
</body>
</html>