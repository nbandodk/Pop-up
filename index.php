<?php 
$con = mysqli_connect("localhost", "root", "", "social"); //Connecton var

if(mysqli_connect_errno())
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

$query = mysqli_query($con, "INSERT INTO test VALUES ('1', 'Reece')");

?>



<!DOCTYPE html>
<html>
<head>
	<title>Pop-up</title>
</head>
<body>
	Hello Noob
</body>
</html>