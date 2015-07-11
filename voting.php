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
		//if session is set, assign the value of session student to $student variable
		$student =  $_SESSION['student'];
		
		include "connect.php";
		$select_db = mysqli_select_db($conn,$db);

		//Get the name of the student to display
		$name_query = "SELECT fname, lname FROM students WHERE student_num='$student' LIMIT 1";
		$name_result = mysqli_query($conn, $name_query);
		
		while($row = mysqli_fetch_array($name_result)) {
		
			echo "<b>Voter: <u>" . $row['fname'] . " " . $row['lname'] . "</u></b>";
			
		}
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a href='destroy.php'><b>Cancel</b></a>";
		
		/******************************************************
		*******************************************************
		LOADING OF ALL CANDIDATES BELOW THIS COMMENT
		*******************************************************
		*******************************************************/
		
		
		echo "<form action='submit.php' method='post'>";

		echo "<h2>Candidates for President</h2>";
		
		//Load Candidates for Prsident ===> Get the code and student number for the result
		onecand('President','president',$conn);
		//End of loading candidate for PResident
		
		echo "<h2>Candidates for Vice Presidents</h2>";
		//load cadidates for vice presidents
		onecand('Vice President','vp',$conn);
		//end of loading candidates for vice presidents
		
		echo "<br/><input class='btn btn-success' type='submit' value='Vote'/>";
		
		echo "</form>";
		
	}
	else {
		header('Location: index.php');
	}
	
	
	/*******************************************************
	FUNCTION FOR ONLY ONE CONDIDATE POSITION -- Radio Button
	********************************************************/
	
	function onecand($position,$pname,$conn) {
		$get_candidate_p = "SELECT * FROM candidate WHERE position='$position'";
		$p_result = mysqli_query($conn, $get_candidate_p);

		while($row_p = mysqli_fetch_array($p_result)) {
			
			$get_namep = $row_p['student_num'];
			$p_name_query = "SELECT * FROM students WHERE student_num='$get_namep'";
			$p_name_result = mysqli_query($conn, $p_name_query);
				
			//Put radio button here in result for selecting president candidates
			while($row_name_p = mysqli_fetch_array($p_name_result)) {
				
				echo "<input type='radio' name='$pname' value='" . $row_name_p['student_num'] . "'/>"; //Radio button set for selecting candidate

				echo "<span class='text-uppercase'><b><u> " . $row_name_p['fname'] . " " . $row_name_p['lname'] . "</u> - " . $row_p['party'] . "</b></span><br/>";

			}
		}
	}
	
	/***************************************************************
	END OF FUNCTION USE TO SELECT AND LOAD SINGLE CANDIDATE POSITION
	***************************************************************/
?>
	
	</div>
</body>
</html>