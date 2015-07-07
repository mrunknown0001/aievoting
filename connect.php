<?php
	$server = "127.0.0.1";
	$user = "root";
	$pass = "";
	$db = "voting";
	
	$conn = mysqli_connect($server, $user, $pass);
	
	if(!$conn) {
		die("Error in Connecting DB Server!");
	}
	else {
		//echo "Connected to Database Server!";
	}

	
?>