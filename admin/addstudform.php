<?php
	require_once "set.php";
?>

<div id="add_student_form" class="">

	<!-- Display for the message result of adding student -->
<?php
	
	if(isset($_POST['stdntnum'])) {
		
		$student_number = strtoupper($_POST['stdntnum']);
		$student_lname = ucfirst($_POST['lname']);
		$student_fname = ucfirst($_POST['fname']);
		$student_pin = $_POST['pin'];
		$student_year = $_POST['year'];
		
		//check if the student number existing in the database
		$check_query = "SELECT * FROM students WHERE student_num='$student_number'";
		$result_check_query = mysqli_query($conn, $check_query);
		
		if(mysqli_num_rows($result_check_query) > 0) {
			echo "<div id='msg_info'>Sir Pogi! Student Number already in the database!</div>";
		}
		else {
			
			//insert the student number in the record
			$add_student_query = "INSERT INTO students (student_num, pin, fname, lname, year) 
								VALUES ('$student_number','$student_pin','$student_fname','$student_lname','$student_year')";
		
			if(mysqli_query($conn,$add_student_query)) {
				echo "<div id='msg_success'>Sir Pogi! Student with ID Number <b>" . $student_number . "</b> successfully added!</div>";
			}
			else {
				echo "<div id='err_add_record'>Error in Adding Record!</div>";
			}
		}
		
	}


?>
	
	
	<h2>Register Students for Election</h2>
	<form action="" method="post">
		<label for="stdntnum">Student Number:</label>
		<input class="text-uppercase form-control" type="text" maxlength="11" name="stdntnum" id="stdntnum" required autofocus/> 
		<label for="fname">First Name:</label>
		<input class="text-lowercase form-control" type="text" maxlength="30" name="fname" id="fname" required />
		<label for="lname">Last Name:</label>
		<input class="text-lowercase form-control" type="text" maxlength="30" name="lname" id="lname" required/>
		<label for="pin">PIN:</label>
		<input class="form-control" type="text" maxlength="4" name="pin" id="pin" required/>
		<label for="year">Year Level:</label>
		<select class="form-control" name="year" id="year" required>
			<option value="" default>Select Year Level</option>
			<option value="First">First Year</option>
			<option value="Second">Second Year</option>
			<option value="Third">Third Year</option>
			<option value="Fourth">Fourth Year</option>
		</select>
		<br/>
		<input class="btn btn-danger" type="reset" value="Clear All"/>
		<br/><br/>
		<input class="btn btn-primary" type="submit" value="Add Record"/>
	</form>
</div>
<script>
</script>
</body>
</html>