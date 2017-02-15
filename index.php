<?php
$con = mysqli_connect("localhost", "root", "", "social");

if(mysqli_connect_errno())
{
	echo "Failed to connect: " . mysqli_connect_errno();
}

$query = mysqli_query($con, "INSERT INTO test VALUES ('1', 'Wenxuan')");

?>
<html>
<head>
<title>Swirlfeed</title>
</head>

<body>
	Hello Wenxuan!!!
</body>
</html>
