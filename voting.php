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
		$student =  $_SESSION['student'];
		
		include "connect.php";
		$select_db = mysqli_select_db($conn,$db);

		//Get the name of the student to display
		$name_query = "SELECT fname, lname FROM students WHERE student_num='$student' LIMIT 1";
		$name_result = mysqli_query($conn, $name_query);
		
		while($row = mysqli_fetch_array($name_result)) {
		
			echo "<b>Voter: <u>" . $row['fname'] . " " . $row['lname'] . "</u></b>";
			
		}
		
		//Start of Form in Voting
		echo "<form action='' method='get'>";
		
		//Load Candidates for Prsident ===> Get the code and student number for the result
		$get_candidate_p = "SELECT * FROM candidate WHERE position='President'";
		$p_result = mysqli_query($conn, $get_candidate_p);
		
		echo "<h1 class='text-center'>President</h1>";
		
		while($row_p = mysqli_fetch_array($p_result)) {
			$get_namep = $row_p['student_num'];
			
			$p_name_query = "SELECT fname, lname FROM students WHERE student_num='$get_namep'";
			$p_name_result = mysqli_query($conn, $p_name_query);
			
			//Put radio button here in result for selecting president candidates
			while($row_name_p = mysqli_fetch_array($p_name_result)) {
				//echo "<input type='radio' name=''/>"; //Radio button set for selecting president
				echo $row_name_p['fname'] . " " . $row_name_p['lname'] . "<br/>";
			}
		}
		
		//end of form in voting
		echo "</form>";
	}
	else {
		header('Location: index.php');
	}

?>
		
	</div>
</body>
</html>