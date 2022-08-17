<?php
session_start();
if(isset($_SESSION["uname"]))	{
		echo "Logging Out";
		session_unset();
		session_destroy();
		header("Location: index.php"); 
		exit;
		
	}	
unset($_SESSION["uid"]);
header("location:index.php");
?>