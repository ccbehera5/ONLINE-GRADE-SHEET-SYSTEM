<!DOCTYPE html>
<html>
<head>
	<title>student information</title>
</head>


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

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>




<body>
<?php
	if(isset($_POST['add']))
	{
	include 'connection.php';
	$studname=$_POST['studname'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$regdno=$_POST['regdno'];
	$rollno=$_POST['rollno'];
	$prgmcode=$_POST['prgmcode'];
	$session=$_POST['session'];
	$query="insert into student(studname,dob,gender,regdno,rollno,prgmcode,session)values('$studname','$dob','$gender','$regdno','$rollno','$prgmcode','$session')";
	$run=mysqli_query($conn,$query);
	if($run)
	{
	echo "inserted";
	}
	else{
		echo ("error".mysqli_error($conn));
	}
	}
?>

			<h1 align="center" style="color:green;">ADD NEW STUDENT</h1>
		<div>
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
					
				<label for="studname">STUDENT NAME:</label>
				<input type="text" id="studname" name="studname" placeholder="Name of Student">

				<label for="dob">DOB:</label>
				<input type="date" id="dob" name="dob" placeholder="YYYY-MM-DD"> <br /><br />

				<label for="gender">GENDER:</label>
				<input type="radio" id="gender" name="gender" value="Male" checked>Male
				<input type="radio" id="gender" name="gender" value="Female">Female
				<input type="radio" id="gender" name="gender" value="Other">Other<br /><br />
				

				<label for="regdno">REGD NO.:</label>
				<input type="text" id="regdno" name="regdno" placeholder="Registration Number">

				<label for="rollno">ROLL. NO.:</label>
				<input type="text" id="rollno" name="rollno" placeholder="Roll Number">

				<label for="prgmcode">PROGRAM CODE:</label>
				
				<select name="prgmcode">
					<?php 
					
					include 'connection.php';
					$q= "select distinct prgmcode from program";
					$result = mysqli_query($conn, $q);
					while($row = mysqli_fetch_assoc($result)) 
					{
						echo "<option name='sel' value='".$row["prgmcode"]."'>".$row["prgmcode"]."</option>";
					}
					?>
				
				</select>
				
				
				<label for="session">ACADEMIC SESSION:</label>
				<select name="session" id="session">
					<option value="2019">2019-20</option>
					<option value="2020">2020-21</option>
					<option value="2021">2021-22</option>
					<option value="2022">2022-23</option>
					<option value="2023">2023-24</option>
					<option value="2024">2024-25</option>
					<option value="2025">2025-26</option>
				</select>
				
				<input type="submit" name="add" value="ADD">
					
				<input type="reset" name="rst" value="RESET">
		</form>
	</div>

</body>
</html>