<?php 
$con = mysqli_connect("localhost", "root", "",  "pop-up"); // connection variable
if(mysqli_connect_errno())
{
echo "failed to connect" . mysqli_connect_errno();
}

$query= mysqli_query($con, "INSERT INTO test values ('1', 'Nikil'), (2, 'Bunty')");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title> Pop-up</title>
</head>
<body>
Hello Nikil
</body>
</html>