<?php
	session_start();
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		
		include "../connect.php";
		$select_db = mysqli_select_db($conn,$db);
		
		echo "<!DOCTYPE html>
			<html lang='en-US'>
			<head>
				<title>Settings: AIE Voting System</title>";
				
		include "head_tag.php";
				
		echo "	</head>
			<body>
				<div class='container'>
					<div class='jumbotron'>
						<h1>AIE Voting System</h1>";
		echo 			"<b>Welcome!</b> ". "<span class='text-uppercase'><b><u>" . $_SESSION['user'] . "</u></b><br/></span>";		
		echo 			"<a href='logout.php'>Logout</a><br/><br/>"; //Logout function 
		
		echo 			"<a href='set.php' class='btn btn-link'><----Back To Admin Home</a></div>";
		

		echo 	"</div>";
		
		/*******************************************
		DIV RESULT OF ALL THE CANDIDATES AND
		LOAD WITH A DELETE OPTION
		********************************************/
		
		echo "<div class='del_result container'>";
		echo 	"<h1 class='text-danger'>Warning!!! One Click Delete Only.</h1>";
		echo 	"<h2>List of All Candidates:</h2>";
		
		//Load all candidates for the deletion process
		$query_all_cand = "SELECT * FROM candidate";
		$result_qac = mysqli_query($conn, $query_all_cand);
		
		
		
		if(mysqli_num_rows($result_qac) > 0) {
		
			echo "<table class='table'>";
			echo "<tr>";
			echo "<th>Full Name</th>";
			echo "<th>Student Number</th>";
			echo "<th>Position</th>";
			echo "<th>Party List</th>";
			echo "<th>Action</th>";
			echo "</tr>";
			
			echo "<form action='delete.php' method='post'>";
			
			while ($row_qac = mysqli_fetch_array($result_qac)) {
				echo "<tr>";
				echo "<td>" . getname($row_qac['student_num'],$conn) . "</td>";
				echo "<td>" . $row_qac['student_num'] . "</td><td>" . $row_qac['position'] . "</td>";
				echo "<td>" . $row_qac['party'] . "</td>";
				echo "<td><input type='hidden' name='sn' value='" . $row_qac['student_num'] . "'/>";
				echo "<input type='submit' class='btn btn-danger' value='Delete'/></td>";
				
				echo "</tr>";
			}
			
		}
		else {
			echo "<h2 class='text-primary'>No Candidate(s) On Database!</h2>";
			exit();
		}
		
		echo "</form>";
		
		echo "</table>";
		
		echo "</div>";
		/*********************************************
		END OF THE DIV FOR THE DELETION OF CANDIDATE
		*********************************************/
	}
	else {
		header('Location: index.php');
	}
	
	
	/*******************************
	FUNCTION GET STUDENT NAME!!!!!!
	********************************/
	
	function getname($sn, $conn) {
		
		$query = "SELECT * FROM students WHERE student_num='$sn'";
		$result = mysqli_query($conn, $query);
		
		while($row = mysqli_fetch_array($result)) {
			$name = $row['fname'] . " " . $row['lname'];
		}
		
		return $name;
	}
	
?>