<?php
	require_once "set.php";
?>

<div id="add_cand_form" class="">

	<!-- Display message here -->
<?php
	
	if(isset($_POST['sn'])) {
		
		$sn = strtoupper($_POST['sn']);
		$code = strtoupper($_POST['code']);
		$party = ucfirst($_POST['party']);
		$position = $_POST['position'];
		
		
		//check if the student is registered
		$check_student_exists = "SELECT * FROM students WHERE student_num='$sn'";
		$result_cse = mysqli_query($conn, $check_student_exists);
		
		if(mysqli_num_rows($result_cse) > 0 ) {
			
			//check if the student if already a registered candidate
			$check_reg_cand = "SELECT * FROM candidate WHERE student_num='$sn'";
			$result_crc = mysqli_query($conn, $check_reg_cand);
			
			if(mysqli_num_rows($result_crc) > 0 ) {
				echo "<div id='msg_info'>Sir Pogi! Student is already a candidate!</div>";
			}
			else {
				//register the candidate/student here
				//insert statement for the database
				$insert_cand = "INSERT INTO candidate (student_num, code, party, position) 
						VALUES('$sn','$code','$party','$position')";
				
				if(mysqli_query($conn, $insert_cand)) {
					echo "<div id='msg_success'>Sir Pogi! <b>" . $sn . "</b> is candidate for $position</div>";
				}
			}
		}
		else {
			echo "<div id='msg_info'>Sir Pogi! Not Registered Student. Register First!</div>";
		}
		
	}
?>
	
	
	
	<h2>Register Candidates for Election</h2>
	
	<form action="" method="post">
		
		<label for="sn">Student Number: <i class='faded'>(Registered Student)</i></label>
		<input class="text-uppercase form-control" type="text" maxlength="11" name="sn" id="sn" required autofocus/> 
		
		<label for="code">Code:</label>
		<input class="text-uppercase form-control" type="text" maxlength="10" name="code" id="code" required/>
		
		<label for="party">Party List:</label>
		<input class="text-lowercase form-control" type="text" maxlength="15" name="party" id="party" required/>
		
		<label for="position">Position:</label>
		<select class="form-control" name="position" id="position" required>
			<option value="" default>Select Candidate</option>
			
			<?php
				//Load Availabe Position
				$load_p_query = "SELECT * FROM position";
				$result_pq = mysqli_query($conn, $load_p_query);
				
				while($row = mysqli_fetch_array($result_pq)) {
					
					echo "<option value='" . $row['pname']  . "'>" . $row['pname'] . "</option>";
					
				}
			
			?>
			
		</select>
		<br/>
		<input class="btn btn-danger" type="reset" value="Clear All"/>
		<br/><br/>
		
		<input type="submit" class="btn btn-primary" value="Add Candidate"/>
	
	</form>

</div>
</body>
</html>