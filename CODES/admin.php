<html>
<head>

	<title>Admin</title>
	<style>

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 25%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

</style>


</head>

<body>
	<?php
	if(isset($_POST['submit']))
	{
	include 'connection.php';
	$uid=$_POST['uid'];
	$uname=$_POST['uname'];
	
	$pwd=$_POST['pwd'];
	$query="insert into admin(uid,uname,pwd)values('$uid','$uname','$pwd')";
	$run=mysqli_query($conn,$query);
	if($run)
	{
	echo "inserted";
	}
	else
	{
		echo ("error".mysqli_error($conn));
	}
	}
	?>
<div>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<h1><u>Admin</u></h1>
			 <label for="uid">ID:</label>
			
			<input type="text" id="uid" placeholder="Enter ID" name="uid" required>
			<label for="uname">Name:</label>
			<input type="text" id="uname" placeholder="Enter Name" name="uname" required>
			

			<label for="pwd">Password:</label>
			<input type="password" id="pwd" placeholder="Enter Password" name="pwd" required>
			
			<input type="submit" name="submit" value="submit">
	</form>
</div>
</body>
