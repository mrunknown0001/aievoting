<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Admin: AIE Voting System</title>
	
	<?php include "head_tag.php"; ?>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
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
		</div>
		
		
	
	</div>

</body>
</html>