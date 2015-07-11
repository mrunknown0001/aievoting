<h2>Initial and Unofficial Result</h2>

<?php

	session_start();
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		
		include_once "../connect.php";
		mysqli_select_db($conn, $db);
		
		
		//for president
		loadcount('President',$conn);
		
		echo "<br/>";
		
		//for vice president
		loadcount('Vice President',$conn);
		
	}
	else {
		header('Location: index.php');
	}
	
	function loadcount($position,$conn) {
		$query_r = "SELECT * FROM result WHERE position='$position'";
		$result_qr = mysqli_query($conn, $query_r);
		
		
		while($row = mysqli_fetch_array($result_qr)) {
			
			
			if($row['position'] === $position) {
				echo $row['position'] . ": " . $row['student_num']  . " " . $row['vcount'] . "<br/>";
			}
			else {
				//echo 'Error in Case Sensitivity';
			}
			
		}
	}

?>