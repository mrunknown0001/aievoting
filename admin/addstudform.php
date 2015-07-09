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
		
		//check if the student number existing in the database
		$check_query = "SELECT * FROM students WHERE student_num='$student_number'";
		$result_check_query = mysqli_query($conn, $check_query);
		
		if(mysqli_num_rows($result_check_query) > 0) {
			echo "<div id='msg_info'>Sir Pogi! Student Number already in the database!</div>";
		}
		else {
			
			//insert the student number in the record
			$add_student_query = "INSERT INTO students (student_num, pin, fname, lname) 
								VALUES ('$student_number','$student_pin','$student_fname','$student_lname')";
		
			if(mysqli_query($conn,$add_student_query)) {
				echo "<div id='msg_success'>Sir Pogi! Student with ID Number <b>" . $student_number . "</b> successfully added!</div>";
			}
			else {
				echo "<div id='err_add_record'>Error in Adding Record!</div>";
			}
		}
		
	}


?>
	
	
	<h2>Add Registered Students</h2>
	<form action="" method="post">
		Student Number:
		<input class="text-uppercase form-control" type="text" maxlength="11" name="stdntnum" id="stdntnum" required autofocus/> 
		First Name:
		<input class="text-lowercase form-control" type="text" maxlength="30" name="fname" id="fname" required />
		Last Name:
		<input class="text-lowercase form-control" type="text" maxlength="30" name="lname" id="lname" required/>
		PIN:
		<input class="form-control" type="text" maxlength="4" name="pin" id="pin" required/>
		<br/>
		<input class="btn btn-danger" type="reset" value="Clear All"/>
		<br/><br/>
		<input class="btn btn-primary" type="submit" value="Add Record"/>
	</form>
</div>
</body>
</html>