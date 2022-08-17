<?php include 'head.php'; ?>
<div style="padding-left:30%; width:80%;">

	<form align="center" action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
		<table border="1" align="center">
		<h1>INPUT INFORMATION</h1>
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
				<input type="submit" name="viewsem" value="VIEW SEM"></form>
			</td>
		</tr>
		
		<?php 
		if(isset($_POST['viewsem']))
		{
			echo '<form align="center" action="'.$_SERVER['PHP_SELF'].'" method="post">';
			$prgmcode=$_POST['prgmcode'];
			echo '<input type="hidden" name="prgmcode" value="'.$prgmcode.'">';
			echo '<tr>
			<td>
				Semester :
			</td>
			<td>
			<select name="sem">';
			include 'connection.php';
			$q= "select distinct sem from paper where prgmcode='$prgmcode'";
			$result = mysqli_query($conn, $q);
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<option name='sem' value='".$row["sem"]."'>".$row["sem"]."</option>";
			}
			echo '</select><input type="submit" name="viewpaper" value="VIEW PAPER">
			</td>
			</tr>
			</form>';
		}
		?>
		
		<?php 
		if(isset($_POST['viewpaper']))
		{
			echo '<form align="center" action="'.$_SERVER['PHP_SELF'].'" method="post">';
			$prgmcode=$_POST['prgmcode'];
			$sem=$_POST['sem'];
			echo '<input type="hidden" name="prgmcode" value="'.$prgmcode.'">';
			echo '<input type="hidden" name="sem" value="'.$sem.'">';
			
			echo '<tr>
			<td>
				paper :
			</td>
			<td>
			<select name="papcode" >';
			include 'connection.php';
			$q= "select * from paper where prgmcode='$prgmcode' and sem='$sem'";
			$result = mysqli_query($conn, $q);
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<option value='".$row["papcode"]."'>".$row["papcode"]."-".$row["papname"]."</option>";
			}
			echo '</select><input type="submit" name="viewstudent" value="VIEW STUDENT">
			</td>
			</tr>
			</form></table>';
		}
		if(isset($_POST['viewstudent']))
		{
			echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
			$papcode=$_POST['papcode'];
			$prgmcode=$_POST['prgmcode'];
			$sem=$_POST['sem'];
			echo '<table border=2>';
			echo '<tr>';
			echo '<th>Programme Name : '.$prgmcode.'</th>';
			echo '<th>Paper Code : '.$papcode.'</th>';
			echo '<th>Semester : '.$sem.'</th>';
			echo '<th>Year : '.date('Y').'</th>';
			echo '</tr>';
			
			echo '<tr>';
			echo '<th>Sl. No.</th>';
			echo '<th>Roll No.</th>';
			echo '<th>Internal Marks</th>';
			echo '<th>Semester Marks</th>';
			echo '</tr>';
			
			include 'connection.php';
			
			echo '<input type="hidden" name="papcode" value="'.$papcode.'">';
			echo '<input type="hidden" name="session" value="'.date('Y').'">';
			
			$q= "select * from student where prgmcode='$prgmcode' ";
			$result = mysqli_query($conn, $q);
			$i=1;
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo "<tr>";
				echo "<td>$i</td>";
				echo "<td>".$row['rollno']."</td>";
				echo '<input type="hidden" name="rollno[]" value="'.$row['rollno'].'">';
				echo "<td><input type='text' name='intsecmark[]' value='0'></td>";
				echo "<td><input type='text' name='semsecmark[]' value='0'></td>";
				echo "</tr>";
				$i+=1;
			}
			echo '<input type="hidden" name="nostudent" value="'.($i-1).'">';
			echo '<tr><td colspan=4><input type="submit" name="addmark" value="ADD MARKS">
			</td>
			</tr>
			</form>';
		}
		if(isset($_POST['addmark']))
		{
			$papcode=$_POST['papcode'];
			$rollno=$_POST['rollno'];
			$session=$_POST['session'];
			$nostudent=$_POST['nostudent'];
			$intsecmark=$_POST['intsecmark'];
			$semsecmark=$_POST['semsecmark'];
			
			include 'connection.php';
			for($i=0;$i<$nostudent;$i+=1){
				$q="insert into mark(rollno , papcode , session , intsecmark , semsecmark )
				values('$rollno[$i]','$papcode',$session,$intsecmark[$i],$semsecmark[$i] )";
				$run=mysqli_query($conn,$q);
				if($run)	echo "inserted"; else	echo ("error".mysqli_error($conn));
			}
			
		}
		
	?>
</div>
<?php //include 'foot.php'; ?>
