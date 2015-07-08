<div id="add_student_form" class="">

	<!-- Display for the message result of adding student -->
	<div id="msg_add_stud"></div>
	
	<h2>Add Registered Students</h2>
	<form>
		Student Number:
		<input class="text-uppercase form-control" type="text" maxlength="11" name="stdntnum" id="stdntnum" required/> 
		First Name:
		<input class="text-capitalized form-control" type="text" maxlength="30" name="fname" id="fname" required />
		Last Name:
		<input class="text-capitalized form-control" type="text" maxlength="30" name="lname" id="lname" required/>
		PIN:
		<input class="text-uppercase form-control" type="text" maxlength="4" name="pin" id="pin" required/>
		<br/>
		<input class="btn btn-danger" type="reset" value="Clear All"/>
		<br/><br/>
	</form>
	<button class="btn btn-success" onclick="">Add Student</button> <!-- Add js function to call onclick -->
</div>