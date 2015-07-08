<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Admin: AIE Voting System</title>
	
	<?php include "head_tag.php"; ?>
<<<<<<< HEAD
	
	<style>
		#user, #pass {
			max-width: 300px;
		}
	</style>
	
=======
>>>>>>> fbf4390ff6fb0dcec42f1f127806c98a80dc0f63
</head>
<body>
	<div class="container">
		<div class="jumbotron">
<<<<<<< HEAD
			<h3>Admin Login: AIE Voting System</h3><br/>
			
			<form action="" method="post">
			
				Username: <input class="form-control" type="text" name="user" id="user" required autofocus/>
				
				Password: <input class="form-control" type="password" name="pass" id="pass" required/>
				
				<br/>
				
				<input class="btn btn-primary" type="submit" value="Login"/>
				
			</form>
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
			
=======
			<b>Admin Login: AIE Voting System</b><br/>
			
			<form action="set.php" method="post">
			<table>
				<tr>
					<td>Username:</td><td><input type="text" name="user" id="user" required autofocus/></td>
				</tr>
				<tr>
					<td>Password:</td><td><input type="text" name="pass" id="user" required/></td>
				</tr>
				<tr>
					<td></td><td><input type="submit" value="Login"></td>
				</tr>
			</table>
			</form>
>>>>>>> fbf4390ff6fb0dcec42f1f127806c98a80dc0f63
		</div>
		
		
	
	</div>

</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> fbf4390ff6fb0dcec42f1f127806c98a80dc0f63
