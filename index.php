<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>AIE Voting System</title>
	
	<?php include "head_tag.php";?>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center">AIE Voting System</h1>
			
		</div>
		
		<div class="row">
			<div class="col-md-4"></div>
			<div id="div-login" class="col-md-4">
				<h4 class="text-center">Enter Required Information:</h4>
				<form action="" method="post">
					<input type="text" class="form-control" id="student_num" name="student_num" placeholder="ID Number Here"  maxlength="8" required autofocus/>
					<br/>
					<input type="text" class="form-control" id="pin" name="pin" placeholder="PIN Here" maxlength="4"/>
					<br/>
					<input type="submit" class="btn btn-primary" value="Continue >>>" onclick=""/>
				</form>
				<div id="err_display">
					<!-- Display the error in query if any -->
					
<!-- START OF PHP SCRIPT -->

<?php

	include "connect.php";
	
	$select_db = mysqli_select_db($conn,$db);
	
	if(isset($_POST['sudent_num'])) {
		$student_num = $_POST['student_num'];
		@$pin = $_POST['pin'];
		//Checking if the student_num is correctly submitted to the script
		//echo $student_num;
	}
	
	//Query Strings
	
	
	function chkstud($stdnum) {
		//echo $stdnum;
	}
	
	function matchpin($p) {
		//echo $p;
	}
	
?>
<!-- END OF PHP SCRIPT -->				
					
					
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	
	<div class="container">
		<div class="jumbotron">
			<p class="text-center">AIE College Tarlac Voting &copy; 2015</p>
		</div>
	</div>
	
<script>
	$(document).ready(function() {
		
	});
</script>
</body>
</html>
