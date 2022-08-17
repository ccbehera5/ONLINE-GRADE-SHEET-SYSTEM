<!DOCTYPE html>
<html>
<head>
<?php session_start(); ?>

	<title>paper entry</title>
</head>
<body>
	
	

	<?php
	if(isset($_POST['addpaper']))
	{
		include 'connection.php';
		$sem=$_POST['sem'];
		$papcode=$_POST['papcode'];
		$papname=$_POST['papname'];
		$intfm=$_POST['intfm'];
		$semfm=$_POST['semfm'];
		//
		$intpm=$_POST['intpm'];
		$sempm=$_POST['sempm'];
		
		$cp=$_POST['cp'];
		for ($i = 0; $i < $_SESSION['nopap']; $i+=1) {
			$totmark=$intfm[$i]+$semfm[$i];
			//echo "('".$_SESSION['prgmcode']."','".$sem[$i]."','".$papcode[$i]."','".$papname[$i]."',";
			//echo "".$intfm[$i].",".$semfm[$i].",".$totmark.",".$intpm[$i].",".$sempm[$i].",".$cp[$i].");";
			$q="insert into paper(prgmcode,sem,papcode,papname,intfm,semfm,totmark,intpm,sempm,cp)values('".$_SESSION['prgmcode']."','".$sem[$i]."','".$papcode[$i]."','".$papname[$i]."',".$intfm[$i].",".$semfm[$i].",".$totmark.",".$intpm[$i].",".$sempm[$i].",".$cp[$i].");";
			//$q+="('".$_SESSION['prgmcode']."','".$sem[$i]."','".$papcode[$i]."','".$papname[$i]."',";
			//$q+="".$intfm[$i].",".$semfm[$i].",".$totmark.",".$intpm[$i].",".$sempm[$i].",".$cp[$i].");";
			//echo $q;
			if(!mysqli_query($conn, $q))
				die("Error".mysqli_error($conn));
			
		}
	}
	
	
	?>
	
</body>
</html>

</body>
</html>
