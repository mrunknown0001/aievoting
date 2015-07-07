<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>AIE Voting Page</title>
	
	<?php include "head_tag.php"; ?>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1 class="text-center">Voting Form</h1>
		</div>
		
<?php
	if(isset($_SESSION['student']) && !empty($_SESSION['student'])) {
		//if session is set
		echo "Voter: " . $_SESSION['student'];
	}
	else {
		header('Location: index.php');
	}

?>
		
	</div>
</body>
</html>