<!DOCTYPE html>
<html>
<head>
	<title>program</title>
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
	<h1 align="center" style="color:green;">PROGRAM ENTRY</h1>
	<div>
		<form action="paper.php" method="POST">
			<label for="prgmcode">PROGRAM CODE:</label>
			<input type="text" id="prgmcode" name="prgmcode" placeholder="PROGRAM CODE">
			<label for="prgmname">PROGRAM NAME:</label>			
			<input type="text" id="prgmname" name="prgmname" placeholder="PROGRAM NAME">
			<label for="nosem">NO.OF SEMESTER:</label>
			<input type="text" id="nosem" name="nosem" placeholder="NO.OF SEMESTER">
			<label for="nopap">NO.OF PAPER:</label>
			<input type="text" id="nopap" name="nopap" placeholder="NO.OF PAPER">
			<label for="fm">FULL MARK:</label>
			<select id="fm" name="fm">			
				<option value="50">50</option>
				<option value="100">100</option>		
			</select>			
			<input type="submit" name="add" value="ADD">
		    <input type="reset" name="rst" value="RESET">
		</form>
	</div>
</body>
</html>