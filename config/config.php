<?php
ob_start(); // turns on output buffering
session_start();

$timezone = date_default_timezone_set("America/Indiana/Indianapolis");

$con = mysqli_connect("localhost", "root", "", "pop-up"); //Connecton var

if(mysqli_connect_errno())
{
	echo "Failed to connect: " . mysqli_connect_errno();
}


?>