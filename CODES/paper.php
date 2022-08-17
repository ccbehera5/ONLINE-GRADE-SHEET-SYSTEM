<!DOCTYPE html>
<html>
<head>
<style>
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
input[type=reset] {
  width: 25%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=reset]:hover {
  background-color: #45a049;
}
</style>


<?php session_start(); ?>
<?php
	if(isset($_POST['add']))
	{
	include 'connection.php';
	$prgmcode=$_POST['prgmcode'];
	$prgmname=$_POST['prgmname'];
	$nosem=$_POST['nosem'];
	$nopap=$_POST['nopap'];
	$_SESSION['nopap'] = $nopap;
	$_SESSION['prgmcode'] = $prgmcode;
	
	$query="insert into program(prgmcode,prgmname,nosem,nopap)values('$prgmcode','$prgmname','$nosem','$nopap')";
	$run=mysqli_query($conn,$query);
	if($run)
	{
	echo "inserted";
	}
	else{
		echo ("error".mysqli_error($conn));
	}
	}?>
	<title>paper entry</title>
</head>
<body>
	
	

	<?php
	
	
	
	?>
	<form align="center" action="paperh.php" method="post">
		<table border="1" align="center">
					<h1 align="center" style="color:green;">PAPER ENTRY</h1>
					<tr>
						<td>
							<b>
							SEMESTER
						</td>
						<td>
							<b>
							PAPER CODE
						</td>
						<td>
							<b>
							PAPER NAME
						</td>
						<td>
							<b>
							INTERNAL F.M.
						</td>
						<td>
							<b>
							SEMESTER F.M.
						</td>
						
						<td>
							<b>
							INTERNAL P.M.
						</td>
						<td>
							<b>
							SEMESTER P.M.
						</td>
						<td>
							<b>
							CREDIT POINT
						</td>
					</tr>

	<?php

					

		
	
	for ($i = 0; $i <= $nopap-1; $i+=1) {
		echo '
			<tr>
				
				<td>
					<input type="text" size="15" name="sem[]">
				</td>
				<td>
					<input type="text" size="15" name="papcode[]">
				</td>
				<td>
					<input type="text" size="15" name="papname[]">
				</td>
				<td>
					<input type="text" size="15" name="intfm[]" value="10">
				</td>
				<td>
					<input type="text" size="15" name="semfm[]" value="40">
				</td>
				
				<td>
					<input type="text" size="15" name="intpm[]" value="4">
				</td>
				<td>
					<input type="text" size="15" name="sempm[]" value="16">
				</td>
				<td>
					<input type="text" size="15" name="cp[]" value="10">
				</td>
			</tr>';
			
	}
	

?>
</table>
	<input type="submit" name="addpaper" value="ADD">
	<input type="reset" name="rst" value="RESET">
	</form>
</body>
</html>

</body>
</html>
