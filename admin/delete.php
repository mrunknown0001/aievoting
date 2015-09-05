<?php
	session_start();
	
	include "../connect.php";
	$select_db = mysqli_select_db($conn,$db);
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		echo "user is set! " . $_SESSION['user'] . "<br/>";
		
		if (isset($_POST['sn']) && !empty($_POST['sn'])) {
			$sn = $_POST['sn'];
		
			$delete = "DELETE FROM candidate WHERE student_num='$sn'";
			
			if (mysqli_query($conn, $delete)) {
				echo "Candidate Removed From the List!";
				header("Location: deletecand.php");
			}
			else {
				echo "not deleted!";
			}
			
		}
		else {
			echo "No Received SN!";
		}
	}
	else {
		header("Location: index.php");
	}


?>