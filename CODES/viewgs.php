<?php include 'head.php'; ?>
	
<h1 align="center" style="color:green;">View Gradesheet</h1>
<div style="padding-left:20%; width:80%;">
	<form align="center" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table border="0" align="center">
	<tr>
		<td>
			PROGRAM CODE:
		</td>
		<td>
			<select name="prgmcode">
				<?php 
				
				include 'connection.php';
				$q= "select * from program";
				$result = mysqli_query($conn, $q);
				while($row = mysqli_fetch_assoc($result)) 
				{
					echo "<option name='sel' value='".$row["prgmcode"]."'>".$row["prgmcode"]."</option>";
				}
				?>
			
			</select>
			<input type="submit" name="viewsem" value="LOAD DATA">
		</td>
	</form>
	</tr>
		
	<?php 
	if(isset($_POST['viewsem']))
	{
		echo '<form align="center" action="'.$_SERVER['PHP_SELF'].'" method="post">';
		$prgmcode=$_POST['prgmcode'];
		echo '<input type="hidden" name="prgmcode" value="'.$prgmcode.'">';
		
		echo '<tr><td>Select the Admission Session</td>';
		
		echo '<td><select name="session" id="session">
				<option value="2019">2019-20</option>
				<option value="2020">2020-21</option>
				<option value="2021">2021-22</option>
				<option value="2022">2022-23</option>
				<option value="2023">2023-24</option>
				<option value="2024">2024-25</option>
				<option value="2025">2025-26</option>
			</select></td></tr>';
		echo '<tr><td colspan=2 align=center>
			<input type="submit" name="viewstudent" value="VIEW STUDENT">
			</td></tr></form>';
	}
	?>
	
	<?php 
	if(isset($_POST['viewstudent']))
	{
		echo '<form align="center" action="'.$_SERVER['PHP_SELF'].'" method="post">';
		$prgmcode=$_POST['prgmcode'];
		$session=$_POST['session'];
		echo '<input type="hidden" name="prgmcode" value="'.$prgmcode.'">';
		echo '<input type="hidden" name="session" value="'.$session.'">';
		
		include 'connection.php';
		echo '<table border=2>
				<tr>
					<th>Sl. No</th>
					<th>Roll. No</th>
					<th>Name of the Student</th>
					<th>Gender</th>
					<th>Regd. No</th>
					<th>Date of Birth</th>
					<th>View Gradesheet</th>
				</tr>
		';
		$q= "select * from student where prgmcode='$prgmcode' and session='$session'";
		$result = mysqli_query($conn, $q);
		$i=1;	//studname	dob	gender	regdno	rollno	prgmcode
		while($row = mysqli_fetch_assoc($result)) 
		{
			$rollno=$row['rollno'];
			$studname=$row['studname'];
			$gender=$row['gender'];
			$regdno=$row['regdno'];
			$dob=$row['dob'];
			echo "
				<tr>
				<td>$i</td>
				<td>$rollno</td>
				<td>$studname</td>
				<td>$gender</td>
				<td>$regdno</td>
				<td>$dob</td>
				<th><a href='gsheet.php?rollno=$rollno&prgmcode=$prgmcode'>Click to view Gradesheet</a></th>
				</tr>
			";
			
		}
		echo '<input type="submit" name="viewstudent" value="VIEW GRADESHEET">
		</td>
		</tr>
		</form></table>';
	}
	?>
</div>
<?php //include 'foot.php'; ?>
