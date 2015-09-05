<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Admin: AIE Voting System</title>
	
	<?php include "head_tag.php"; ?>
	
	<style>
		#user, #pass {
			max-width: 300px;
		}
	</style>
	

</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h3>Admin Login: AIE Voting System</h3><br/>
			
			<form action="" method="post">
			
				Username: <input class="form-control" type="text" name="user" id="user" required autofocus/>
				
				Password: <input class="form-control" type="password" name="pass" id="pass" required/>
				
				<br/>
				
				<input class="btn btn-primary" type="submit" value="Login"/>
				
			</form>
			<br/>
			<a href='../index.php' class='btn btn-link'><------ Back To Voting</a>
<!-- start of the php script in this page -->
<?php
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		//if the session is set for the admin user
		//This page will be redirected to the set.php script
		header('Location: set.php');
		
	}
	else {
		
		//check if the value in the form is properly submitted to server
		if(isset($_POST['user'])) {
			
			$username = $_POST['user']; //the value in the form username
			$password = $_POST['pass']; //the value is the form password
			
			include "../connect.php";
			
			$select_db = mysqli_select_db($conn, $db);
			
			//Query for all registered user in database
			$user_query = "SELECT * FROM admin WHERE user='$username'";
			$result_user_query = mysqli_query($conn, $user_query);
			
			//if the result has a greater than 0 result
			//the username inputed is present in the database
			if(mysqli_num_rows($result_user_query) > 0) {
				while($row = mysqli_fetch_array($result_user_query)) {
					if($row['pass'] == $password) {
						$_SESSION['user'] = $username;
						header('Location: set.php');
					}
					else {
						echo "<div id='err_display'>Wrong Password!</div>";
					}
				}
			}
			else {
				echo "<div id='err_display'>$username user NOT VALID!</div>";
			}
			
		}
		
	}
?>
<!-- end of the php script in this page-->
		
		</div>
		
		
	
	</div>

</body>

</html>

</html>

