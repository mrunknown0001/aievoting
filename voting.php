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
	<!---
		<div class="jumbotron">
			<h1 class="text-center">Voting Form</h1>
		</div>
	--!>	
<?php
	if(isset($_SESSION['student']) && !empty($_SESSION['student'])) {
		//if session is set, assign the value of session student to $student variable
		$student =  $_SESSION['student'];
		
		include "connect.php";
		$select_db = mysqli_select_db($conn,$db);

		//Get the name of the student to display
		$name_query = "SELECT fname, lname FROM students WHERE student_num='$student' LIMIT 1";
		$name_result = mysqli_query($conn, $name_query);
		
		echo "<div class='fixednav'>";
		
		while($row = mysqli_fetch_array($name_result)) {
			echo "<div id='v'><p>Voter:</p></div><b> " . "<span class='vname'>" . $row['fname'] . " " . $row['lname'] . "</span>" . "</b>";
			
		}
		
		echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<a id='cancel' href='destroy.php'><b>Cancel</b></a>";
	
		echo "</div>";
		/******************************************************
		*******************************************************
		LOADING OF ALL CANDIDATES BELOW THIS COMMENT
		*******************************************************
		*******************************************************/
		
		
		echo "<form class='formsubmit' action='submit.php' method='post'>";

		echo "<h2>President</h2>";
		
		//Load Candidates for Prsident ===> Get the code and student number for the result
		onecand('President','president',$conn);
		//End of loading candidate for PResident
		
		echo "<h2>Vice-Presidents</h2>";
		//load cadidates for vice presidents
		onecand('Vice President','vp',$conn);
		//end of loading candidates for vice presidents
		
		echo "<h2>Secretary</h2>";
		//load candidates for secretary
		onecand('Secretary','sec',$conn);
		
		echo "<h2>Treasurer</h2>";
		//load candidates for treasurer
		onecand('Treasurer','treas',$conn);
		
		echo "<h2>Auditor</h2>";
		//load candidates for auditor
		onecand('Auditor','aud',$conn);
		
		echo "<h2>Business Manager</h2>";
		//load candidates for bus mgr
		onecand('Business Manager','busmgr',$conn);
		
		echo "<h2>PRO</h2>";
		//load candidates for PRO
		onecand('PRO','pro',$conn);
		
		echo "<h2>1st Year BOD</h2>";
		//load 1st year rep
		onecand('1st Year BOD','1stbod',$conn);
		
		echo "<h2>2nd Year BOD</h2>";
		//load 2nd year rep
		onecand('2nd Year BOD','2ndbod',$conn);
		
		echo "<br/><input class='btn btn-success' id='vote' type='submit' value='Vote'/>";
		echo "<input class='btn btn-danger' type='reset' id='clear' value='Clear Selection'/>";
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
		?>
			
			<div class="list container"><!-- container for list of candidates-->
				<?php
				if(mysqli_num_rows($p_result) > 0 ) {
					while($row_p = mysqli_fetch_array($p_result)) {
						
						$get_namep = $row_p['student_num'];
						$p_name_query = "SELECT * FROM students WHERE student_num='$get_namep'";
						$p_name_result = mysqli_query($conn, $p_name_query);
							
						//Put radio button here in result for selecting president candidates
						?>
						<?php
						while($row_name_p = mysqli_fetch_array($p_name_result)) {
						?>
							<div class="candlist">
						
						<?php
									echo "<input type='radio' id='" . $row_name_p['student_num'] . "' name='$pname' value='" . $row_name_p['student_num'] . "'/>"; //Radio button set for selecting candidate
	
									echo "<label id='label' for='" . $row_name_p['student_num'] . "'>" . $row_name_p['fname'] . " " . $row_name_p['lname'] .  "</label><br/><img id='pic' src='images/" . $row_name_p['student_num'] . ".jpg'>";
						
						}?>
							</div>		
						<?php
					}
				}
				else {
					echo "No Candidate!";
					
				}
				?>
			</div>
			<?php
		}
		?>
					
		<?php
		
		/***************************************************************
		END OF FUNCTION USE TO SELECT AND LOAD SINGLE CANDIDATE POSITION
		***************************************************************/
	?>
	</div>


</body>
</html>