<?php
	session_start();
	
	//session_destroy();
	
	unset($_SESSION['student']); 
	
	mysqli_close($conn);
	
	header("Location: index.php");
?>