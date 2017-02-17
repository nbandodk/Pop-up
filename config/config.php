<?php 
ob_start(); //turns on output buffering
$timezone  = date_default_timezone_get("America/Chicago");
$con = mysqli_connect("localhost", "root", "",  "pop-up"); // connection variable
if(mysqli_connect_errno())
{
echo "failed to connect" . mysqli_connect_errno();
}
?>