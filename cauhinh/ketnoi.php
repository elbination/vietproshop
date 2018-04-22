<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "12345678";
$dbName = "vietproshop";

$dbConnect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if($dbConnect){
	$setLang = mysqli_query($dbConnect,"SET NAMES 'utf8'");
} else {
	die("Connection Failed!".mysqli_connect_error());
}
?>