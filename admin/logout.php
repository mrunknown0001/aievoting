<?php
	session_start();
	
	unset($_SESSION['user']);
	
	@mysqli_close($conn);
	
	
	header('Location: index.php');
	

?>