<h2>Initial and Unofficial Result</h2>

<?php

	session_start();
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		
		include_once "../connect.php";
		mysqli_select_db($conn, $db);
		
		
		//query to database in  result table
		$query = "SELECT * FROM result";
		$result_query = mysqli_query($conn, $query);
		
		
		//sample only
		//Load Availabe Position
		$query_r = "SELECT * FROM result";
		$result_qr = mysqli_query($conn, $query_r);
		
		while($row = mysqli_fetch_array($result_qr)) {
			
			echo $row['position'] . ": " . $row['student_num']  . " " . $row['vcount'] . "<br/>";
			
		}
		
	}
	else {
		header('Location: index.php');
	}

?>