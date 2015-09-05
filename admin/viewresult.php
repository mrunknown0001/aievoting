<?php
	session_start();
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		
		include "../connect.php";
		$select_db = mysqli_select_db($conn,$db);
		
		echo "<!DOCTYPE html>
			<html lang='en-US'>
			<head>
				<title>Result AIE Voting System</title>";
				
		include "head_tag.php";
				
		echo "	</head>
			<body>
				<div class='container'>
					<div class='jumbotron'>
						<h1>Result AIE Voting System</h1>";
		echo 			"<b>Welcome!</b> ". "<span class='text-uppercase'><b><u>" . $_SESSION['user'] . "</u></b><br/></span>";		
		echo 			"<a href='logout.php'>Logout</a><br/><br/>"; //Logout function 
		
		echo 			"<br/></br>";
		echo 			"<a href='set.php' class='btn btn-link'><----Back To Admin Home</a></div>";
		

		echo "		</div>";
		
		echo "<div class='container'>";
		
		echo "<hr>";
		
		
		echo "<h2>For President</h2>";
		winner($conn, 'President');
		
		echo "<hr>";
		
		echo "<h2>For Vice President</h2>";
		
		echo "<hr>";
		
		winner($conn, 'Vice President');
		
		
		echo "<hr>";
		
		echo "<h2>For Secretary</h2>";
		winner($conn, 'Secretary');
		
		echo "<h2>For Treasurer</h2>";
		winner($conn, 'Treasurer');
		
		echo "<hr>";
		
		
		echo "<h2>For Auditor</h2>";
		winner($conn, 'Auditor');
		
		echo "<hr>";
		
		
		echo "<h2>For Business Manager</h2>";
		winner($conn, 'Business Manager');
		
		echo "<hr>";
		
		
		echo "<h2>For PRO</h2>";
		winner($conn, 'PRO');
		
		echo "<hr>";
		
		
		echo "<h2>For 1st Year BOD</h2>";
		winner($conn, '1st Year BOD');
		
		echo "<hr>";
		
		
		echo "<h2>For 2nd Year BOD</h2>";
		winner($conn, '2nd Year BOD');
		
		
		echo "</div>";
		
	}
	else {
		header('Location: index.php');
	}
	?>
	

		
	<?php
	/**************************************
	 *FUNCTION LOAD WINNER FOR THE ELECTION
	 **************************************/
	function winner($conn, $position){
		
		
		$query = "SELECT * FROM result WHERE position='$position' ORDER BY vcount DESC";
		$result = mysqli_query($conn, $query);
		
		
		if(mysqli_num_rows($result) > 0) {
			
			while($row = mysqli_fetch_array($result)) {
				
				$cand = $row['student_num'];
				$name = getname($conn, $cand);
				$votecount = $row['vcount'];
				$image = "<img src='../images/" . $cand . ".jpg'/>"; 
				
			?>
				<ul>
						<?php
						
						
						echo "<li class='viewresultimg'>" . $image . "</li>";
						
						
						echo "<li class='viewresultcand'>" . $cand . "</li>";
						
						
						echo "<li class='viewresultcandidates'>" . $name . "</li>";
						
						
						echo "<li class='count'>" . $votecount . "</li>";
						?>
				</ul>

			<?php
			}
		}
		else {
			echo "No result for " . strtoupper($positon) . ".";
		}
	}
	?>
			

	<?php
	/**********************************
	 *FUNCTION TO GET THE NAME OF THE 
	 *CANDIDATE, CALL IN OTHER FUNCTION
	 ********************************/
	function getname($conn, $sn) {
		$get = "SELECT fname, lname FROM students WHERE student_num='$sn' LIMIT 1";
		$result_name = mysqli_query($conn, $get);
		
		while($row_get = mysqli_fetch_array($result_name)) {
			
			$name = $row_get['fname'] . " " . $row_get['lname'];
		}
		
		return $name;
	}
	
	
	/**************************************
	 *FUNCTION TO GET CANDIDATE PARTY LIST
	 **************************************/
	
	function getparty() {
		
	}
?>

