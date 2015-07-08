<?php
	session_start();
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		
	}
	else {
		header('Location: index.php');
	}
?>