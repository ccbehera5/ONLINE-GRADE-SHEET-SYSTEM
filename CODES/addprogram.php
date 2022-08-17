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

</style>


<?php include 'head.php'; ?>
	
	<h1 align="center" style="color:green;">PROGRAM ENTRY</h1>
	<div style="padding-left:30%; width:80%;">
		<form action="paper.php" method="POST">
			<label for="prgmcode">PROGRAM CODE:</label>
			<input type="text" id="prgmcode" name="prgmcode" placeholder="PROGRAM CODE"><br><br>
			<label for="prgmname">PROGRAM NAME:</label>			
			<input type="text" id="prgmname" name="prgmname" placeholder="PROGRAM NAME"><br><br>
			<label for="nosem">NO.OF SEMESTER:</label>
			<input type="text" id="nosem" name="nosem" placeholder="NO.OF SEMESTER"><br><br>
			<label for="nopap">NO.OF PAPER:</label>
			<input type="text" id="nopap" name="nopap" placeholder="NO.OF PAPER"><br><br>
			<label for="fm">FULL MARK:</label>
			<select id="fm" name="fm">			
				<option value="50">50</option>
				<option value="100">100</option>		
			</select><br>	<br>		
			<input type="submit" name="add" value="ADD">
		    <input type="reset" name="rst" value="RESET">
		</form>
	</div>
<?php include 'foot.php'; ?>
