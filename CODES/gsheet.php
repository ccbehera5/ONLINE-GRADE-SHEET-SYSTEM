<!DOCTYPE html>
<html>
<head>
	<title>FAKIR MOHAN UNIVERSITY ONLINE MARKSHEET GENERATION SYSTEM</title>
	<link rel="stylesheet" type="text/css" href="homepagestyle.css">
	<?php session_start(); ?>
	<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align:center;
}
th, td {
  padding: 15px;
}
</style>
</head>
<body>
	

<div style="padding-left:5%; padding-right:5%;width:95%;">
<?php 
	if(isset($_GET['rollno']) && isset($_GET['prgmcode']) )
	{
		include 'connection.php';
		
		$prgmcode=$_GET['prgmcode'];
		$rollno=$_GET['rollno'];
		$q0= "select * from student where rollno='$rollno' ";
		$result0 = mysqli_query($conn, $q0);
		$i=1;	//studname	dob	gender	regdno	rollno	prgmcode
		if($row0 = mysqli_fetch_assoc($result0)) 
		{
			$studname=$row0['studname'];
			$gender=$row0['gender'];
			$regdno=$row0['regdno'];
			
			$q1="select prgmname from Program where prgmcode='$prgmcode' ";
			$result1 = mysqli_query($conn, $q1);
			$row1 = mysqli_fetch_assoc($result1);
			$prgmname=$row1['prgmname'];
			
			echo "
			<table border=1>
			<tr>
				<td rowspan=3 colspan=3><img src='fakir.png' alt='Logo' class='logo' ></td>
				<td align=center colspan=9 ><span style='font-size:40px;'>Fakir Mohan University</td>
			</tr>
			<tr>
				<td align=center colspan=9 ><span style='font-size:30px;'>Vyasa Vihar, Balasore, Odisha-756089</td>
			</tr>
			<tr>
				<td align=center colspan=9 ><span style='font-size:40px;'>Gradesheet</td>
			</tr>
			<tr>
				<td colspan=3 ><span style='font-size:15px;'>Name</td>
				<td  colspan=6><span style='font-size:20px;'>$studname</td>
				<td ><span style='font-size:15px;'>Roll No</td>
				<td  colspan=2><span style='font-size:20px;'>$rollno</td>
			</tr>
			<tr>
				<td colspan=3 ><span style='font-size:15px;'>Programme </td>
				<td  colspan=6><span style='font-size:20px;'>$prgmname ($prgmcode) </td>
				
				<td ><span style='font-size:15px;'>Regd. No.</td>
				<td  colspan=2><span style='font-size:20px;'>$regdno</td>
			</tr>
			
			";
			
			echo "
			
			<tr>
				<th rowspan=2>Paper<br>Code</td>
				<th rowspan=2>Paper<br>Name</td>
				<th rowspan=2>Semester</td>
				<th colspan=3>Internal / Mid-Term Exam.</td>
				<th colspan=3>Semester / End-Term Exam.</td>
				<th rowspan=2> Total <br/> Mark </td>
				<th rowspan=2> Credit <br/> Point </td>
				<th rowspan=2 valign='middle'> Remark </td>
			</tr>
			<tr>
				<td>Full Mark</td>
				<td>Pass Mark</td>
				<td>Secured Mark</td>
				<td>Full Mark</td>
				<td>Pass Mark</td>
				<td>Secured Mark</td>
			</tr>
			
			";
			
			$gtm=0; $gsm=0; $gcp=0; $status=0; $i=0;
			$q="select papcode, papname,sem, intfm, semfm, totmark, intpm, sempm, cp from paper where prgmcode='$prgmcode' ";
			$result = mysqli_query($conn, $q);
			while($row = mysqli_fetch_assoc($result)){
				$papcode=$row['papcode'];
				$papname=$row['papname'];
				$sem=$row['sem'];
				$intfm=$row['intfm'];
				$semfm=$row['semfm'];
				$totmark=$row['totmark'];
				$intpm=$row['intpm'];
				$sempm=$row['sempm'];
				$cp=$row['cp'];
				//mark	rollno	papcode	session	intsecmark	semsecmark

				$q2="select max(intsecmark) ism,max(semsecmark) ssm from mark where papcode='$papcode' and rollno='$rollno' ";
				$result2 = mysqli_query($conn, $q2);
				$row2 = mysqli_fetch_assoc($result2);
				$ism=$row2['ism'];
				$ssm=$row2['ssm'];
				
				$tsm=($ism+$ssm);
				
				$creditpoint=($tsm*$cp)/$totmark;
				
				$gtm+=($semfm+$intfm); 
				$gsm+=($ism+$ssm); 
				 
				$gcp+=$creditpoint; 
				$i+=1;
				if(($ism>$intpm)&& ($ssm>$sempm)){
					$status+=1;
					$remark="Pass";
				}
				else	$remark="Fail";
				echo"
				<tr>
					<td >$papcode</td>
					<td >$papname</td>
					<td >$sem</td>
					<td >$intfm</td>
					<td >$intpm</td>
					<td >$ism</td>
					<td >$semfm</td>
					<td >$sempm</td>
					<td >$ssm</td>
					<td >$tsm</td>
					<td >$creditpoint</td>
					<td >$remark</td>
				</tr>
				";
				
			}
			if($i==$status)	$result='Pass';	else $result='Fail';
			$avgcp=($gcp/$i);
			echo"
			<tr>
				<td colspan=2>Result</td>
				<th >$result</th>
				<td colspan=6>Grand Total</td>
				<th >$creditpoint</th>
				<th >$gsm</th>
				<th >$avgcp</th>
			</tr>
			<tr>
				<td colspan=12 align=center>
					<button onclick='window.print();'>Print<button>
					<a href='viewgs.php'><button >Back<button></a>
				</td>
			</tr>
			</table>
			";
			
			
		}
		else
			echo "Invalid Input Given or No Records Found ";
	}
	else
		header("location: index.php");
?>
</div>
<?php //include 'foot.php'; ?>
