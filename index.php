<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>AIE Voting System</title>
	
	<?php include_once "head_tag.php";?>
	
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
					<input type="text" class="form-control text-uppercase" id="student_num" name="student_num" placeholder="ID Number Here"  maxlength="11" required autofocus/>
					<br/>
					<input type="password" class="form-control" id="pin" name="pin" placeholder="PIN Here" maxlength="4"/>
					<br/>
					<input type="submit" class="btn btn-primary" value="Continue >>>" />
				</form>
				<div>
					<!-- Display the error in query if any -->
					
<!-- START OF PHP SCRIPT -->

<?php

	if(isset($_SESSION['student']) && !empty($_SESSION['student'])) {
		header("Location: voting.php");
	}
	else {
		include "connect.php";
		
		$select_db = mysqli_select_db($conn,$db);

		
		if(isset($_POST['student_num'])) {
			$student_num = $_POST['student_num'];
			@$pin = $_POST['pin'];
			//Checking if the student_num is correctly submitted to the script
			//echo $student_num;
			
			//Query String for students valid to vote/Registered Students
			$student_num_query = "SELECT student_num, pin FROM students WHERE student_num='$student_num'";
			$result = mysqli_query($conn, $student_num_query);
			
			//Query String to check if they already voted
			$check_query = "SELECT student_num FROM voted WHERE student_num='$student_num'";
			$check_result = mysqli_query($conn, $check_query);
			
			//Check If you are already voted
			if(mysqli_num_rows($check_result) > 0) {
				echo "<div id='err_display'>You have already voted!</div>";
			}
			else {
				
				//Check if the pin and registered Student NUmber is matched!
				if(mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_array($result)) {
						
						if ($row['pin'] == $pin) {
							echo "Student Number and PIN Matched!";
							$_SESSION['student'] = $student_num;
							header("Location: voting.php");
						}
						else {
							echo "<div id='err_display'>PIN Not Matched!</div>";
						}
					}
				}
				else {
					echo "<div id='err_display'>No Record Found!</div>	";
				}
			
			}

		}
	
	}
	
?>
<!-- END OF PHP SCRIPT -->				

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
<?php
	mysqli_close($conn);
	exit();
?>
