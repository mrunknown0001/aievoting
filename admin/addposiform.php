<?php
	require_once "set.php";
?>

<div id="add_posi_form" class="">

	<!-- Display message here -->
	
<?php
	
	if(isset($_POST['position'])) {
		
		$position = ucfirst($_POST['position']);
		$pid = strtoupper($_POST['pid']);
		
		//check if the position is already in data
		$check_position = "SELECT * FROM position WHERE pname='$position'";
		$result_cp = mysqli_query($conn, $check_position);
		
		if(mysqli_num_rows($result_cp) > 0) {
			
			echo "<div id='msg_info'>Position Already Present</div>";
			
		}
		else {
			
			//add position to record
			$add_p = "INSERT INTO position (pname, pid) VALUES ('$position','$pid')";
			
			if(mysqli_query($conn, $add_p)) {
				
				echo "<div id='msg_success'>$position added to record.</div>";
				
			}
			
		}
	}
	
?>
	
	<h2>Add Position in Election</h2>
	
	<form action="" method="post">
	
		<label for="position">Position Title: <i class='faded'>Type in lowercase</i></label>
		<input class="form-control" type="text" maxlength="30" name="position" id="position" required autofocus/>
		
		<label for="pid">Position ID</label>
		<input class="form-control" type="text" maxlength="15" name="pid" id="pid" required/>
		
		<br/>
		<input class="btn btn-danger" type="reset" value="Clear All"/>
		<br/><br/>
		<input class="btn btn-primary" type="submit" value="Add Position"/>
		
	</form>
	
</div>