<?php
if(isset($_COOKIE["email"]) || $_SESSION["email"]){
	session_start();
	session_destroy();
	setcookie("email", "", time() - 3600);
	setcookie("mk", "", time() - 3600);
	header("location:index.php");
	
}else{
header("location:index.php");
	
}
?>