<!DOCTYPE html>
<html>
<head>
	<title>FAKIR MOHAN UNIVERSITY ONLINE GRADESHEET SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="homepagestyle.css">
	<?php session_start(); ?>
</head>
<body>
	
		<div  class="header">
			<div class="img">
			<img src="fakir.png" alt="logo" class="logo">
		</div>
		<div class="head" align="middle">
  			<h1>FAKIR MOHAN UNIVERSITY</h1>
  			<h3>ONLINE GRADESHEET SYSTEM</h3>
  		</div>
  		</div>
		

	<div class="menu-bar">
		<ul>
			<li class="active"><a href="index.php">HOME<a></li>
			<li><a href="addprogram.php">ADD PROGRAM<a></li>
			<li><a href="addstudent.php">ADD STUDENT<a></li>
			<li><a href="addmark.php">ADD MARK<a></li>
			<li><a href="viewgs.php">VIEW GRADESHEET<a></li>
			<li><a href="admin.php">ADD ADMIN<a></li>
			<?php 
				if(isset($_SESSION["uid"])){
					echo "<li><a href='#'>".$_SESSION["uname"]."</a></li>";
					echo "<li><a href='logout.php'>LOGOUT</a></li>";
				}
				else	{
					echo "<li><a href='login.php'>LOGIN</a></li>";
				}
			?> 
		</ul>
	</div>
