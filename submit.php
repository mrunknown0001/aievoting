<?php
	session_start();
	
	include "connect.php";
	mysqli_select_db($conn, $db);
	
	if(isset($_SESSION['student']) && !empty($_SESSION['student'])) {
		
		$voter = $_SESSION['student'];
		$candidate_p = $_POST['president'];
		$candidate_vp = $_POST['vp'];
			
		//this function updates the vote count of the candidate
		//just provide the ff: the candidate student number, the connection string for db server and the voter id number
		
		//for presidential count
		addcount($candidate_p,$conn,$voter);
		
		//for vice president count
		addcount($candidate_vp,$conn,$voter);
		
		
		
	}
	else {
		header('Location: index.php');
	}
	
	
	/**********************************
	START OF FUNCTION FOR THE CANDIDATE
	
	*********************************/
	function addcount($sn,$conn,$voter){
		
		//echo $sn;
		//check if the candidate has a record 
		$check_cand_record = "SELECT * FROM result WHERE student_num='$sn' LIMIT 1";
		$result_ccr = mysqli_query($conn, $check_cand_record);
		
		if(mysqli_num_rows($result_ccr) > 0) {
			
			//add vote count here, update vote count here
			#echo "record need to update";
			
			while($row = mysqli_fetch_array($result_ccr)) {
				$count = $row['vcount'];
			}
			$vc = (int)$count + 1;
			
			$update_vcount = "UPDATE result SET vcount='$vc' WHERE student_num='$sn'";
			
			if(mysqli_query($conn,$update_vcount)) {
				
				//this is to avoid redundant record in voted
				$voter_redundant_check = "SELECT * FROM voted WHERE student_num='$voter'";
				$result_vrc = mysqli_query($conn, $voter_redundant_check);
				
				if(mysqli_num_rows($result_vrc) > 0) {
					//the record is present nothing to do
				}
				else {					
					$voter_add = "INSERT INTO voted (student_num) VALUES ('$voter')";
					mysqli_query($conn,$voter_add);
				}
				unset($_SESSION['student']); 
				//echo "VOUTE COUNT SUCCESSFULLY ADDED!";
				//header('Location: index.php');
			}
			else {
				echo "Error in Updating Vote Count!";
			}
			
		}
		else {
			
			//get all information for the candidate to be inserted in the database
			$get_cand_info = "SELECT * FROM candidate WHERE student_num='$sn' LIMIT 1";
			$result_gci = mysqli_query($conn, $get_cand_info);

			
			while($row_gci = mysqli_fetch_array($result_gci)) {
				
				$c_code = $row_gci['code'];
				$c_pos = $row_gci['position'];
			}	
				$init_vcount = 1;
				
				//add new record in result table
				$add_cand = "INSERT INTO result (student_num, code, position, vcount) 
						VALUES ('$sn','$c_code','$c_pos','$init_vcount')";
				
				
				
				if(mysqli_query($conn,$add_cand)) {
					
					//this is to avoid redundant record in voted
					$voter_redundant_check = "SELECT * FROM voted WHERE student_num='$voter'";
					$result_vrc = mysqli_query($conn, $voter_redundant_check);
					
					if(mysqli_num_rows($result_vrc) > 0) {
						//the record is present nothing to do
					}
					else {					
						$voter_add = "INSERT INTO voted (student_num) VALUES ('$voter')";
						mysqli_query($conn,$voter_add);
					}
					
					unset($_SESSION['student']); 
					//echo "New Vote Counted!";
					//header('Location: index.php');
					
				}
				else {
					echo "Error in Voting!";
				}
				

		}
		
	}
?>
<!DOCTYPE html>
<hhtml lang='en-US'>
<head>
	<title>Submit Vote</title>
	<meta http-equiv="refresh" content="5;url=index.php" />
	<?php include "head_tag.php"; ?>
</head>
<body>
	<div class='container'>
		<div class="jumbotron">
			<h1>Vote Successful! Thank You For Your Cooperation!  <small>--- AIE Tarlac</small></h1>
		</div>
	</div>
<script>


</script>
</body>
</html>