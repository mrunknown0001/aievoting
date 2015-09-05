<h2>Initial and Unofficial Result</h2>

<?php

	session_start();
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		
		include_once "../connect.php";
		mysqli_select_db($conn, $db);
		
		loadall($conn);
		
		
		echo "<table class='table'>";
		echo "<tr>";
		echo "<th>Position</th><th>Name</th><th>Vote Count</th>";
		echo "</tr>";
		
		//for president
		loadcount('President',$conn);
		
		
		//for vice president
		loadcount('Vice President',$conn);
		
		
		//for secretary
		loadcount('Secretary',$conn);
		
		
		//for treasurer
		loadcount('Treasurer',$conn);
		
		
		//for auditor
		loadcount('Auditor',$conn);
		
		
		//for business manager
		loadcount('Business Manager',$conn);
		
		
		//for pro
		loadcount('PRO',$conn);
		
		
		//for 1st year bod
		loadcount('1st Year BOD',$conn);
		
		
		//for 2nd year bod
		loadcount('2nd Year BOD',$conn);
		
		
		echo "</table>";
		
	}
	else {
		header('Location: index.php');
	}
	
	
	/*************************
	this part and down is the 
	function part of the script	
	
	*///////////////////////////
	
	
	
	//function to display vote count
	function loadcount($position,$conn) {
		$query_r = "SELECT * FROM result WHERE position='$position' ORDER BY vcount DESC";
		$result_qr = mysqli_query($conn, $query_r);
		
		
		
		while($row = mysqli_fetch_array($result_qr)) {
			$cand_sn = $row['student_num'];
			//load candidates vote count with name
			if($row['position'] === $position) {
				echo "<tr><td>" . $row['position'] . "</td><td>" . callname($cand_sn,$conn) . " - $cand_sn " . "</td><td>";
				
				$c = $row['vcount'];
				$v = voters($conn);
				$percent = (int)$c / (int)$v;
				
				echo "<div class='progress'>";
				//Percentage will count in vote count divided by total voter count
				echo "<div class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width:" . $percent . "%'>";
				echo "<span class='graph_num'>" . $row['vcount'] . "</span>";
				echo "</div>";
				echo "</div>";
				
				
				echo "</td></tr>";
			}
			else {
				//echo 'Error in Case Sensitivity';
			}
			//callname($cand_sn,$conn)
		}
	}
	
	
	//optional
	//function to fetch names of the candidates
	function callname($sn,$conn) {
		
		$query_name = "SELECT fname, lname FROM students WHERE student_num='$sn' LIMIT 1";
		$result_qn = mysqli_query($conn, $query_name);
		
		if ($row_name = mysqli_fetch_array($result_qn)) {
			$name =  $row_name['fname'] . " " . $row_name['lname'];
		}
		else {
			echo "no name fetched!";
		}
		
		return $name; //important in aligning output in a program
	}
	
	
	
	function loadall($conn) {
		/////////////Call all candidates and load to result with a default of 0 vote count
		//Query to load all candidates in the result data
		$call_all_cand = "SELECT  student_num, position, code FROM candidate";
		$result_cac = mysqli_query($conn, $call_all_cand);
		
		
		
			while($row_result_cac = mysqli_fetch_array($result_cac)) {
				//write to all candidates to result table on database
				$cand_sn = $row_result_cac['student_num'];
				$cand_code = $row_result_cac['code'];
				$cand_pos = $row_result_cac['position'];
				$init_vote = 0;
				
				//Check if the candidate is alrady had a record 
				$check = "SELECT student_num FROM result WHERE student_num='$cand_sn'";
				$result_check = mysqli_query($conn, $check);
				
				if(mysqli_num_rows($result_check) > 0) {
					//walang gagawin dito
					//nothing to do here
					
				}
				else {
					$write_cand = "INSERT INTO result (student_num, code, position, vcount) 
						VALUES ('$cand_sn','$cand_code','$cand_pos',$init_vote)";
					mysqli_query($conn,$write_cand);
				}
			}
		/////////////End of load to reasult all
		
	}
	
	function voters($conn) {
		
		$query = "SELECT COUNT(*) FROM students";
		$result = mysqli_query($conn, $query);
		
		return $result;
	}
	

?>