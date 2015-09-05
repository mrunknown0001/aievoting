<?php
	session_start();
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		
		include "../connect.php";
		$select_db = mysqli_select_db($conn,$db);
		
		echo "<!DOCTYPE html>
			<html lang='en-US'>
			<head>
				<title>Settings AIE Voting System</title>";
				
		include "head_tag.php";
				
		echo "	</head>
			<body>
				<div class='container'>
					<div class='jumbotron'>
						<h1>AIE Voting System</h1>";
		echo 			"<b>Welcome!</b> ". "<span class='text-uppercase'><b><u>" . $_SESSION['user'] . "</u></b><br/></span>";		
		echo 			"<a href='logout.php'>Logout</a><br/><br/>"; //Logout function 
		?>
		<div class="selection">
		<?php
		echo 	"<div class='circle first'><a href='addstudform.php' class='btn btn-link'>Add Students</a><br/></div>";
		echo 	"<div class='circle second'><a href='addcandform.php' class='btn btn-link'>Add Candidate</a><br/></div>";
		echo 	"<div class='circle third'><a href='addposiform.php' class='btn btn-link'>Add Position</a><br/></div>";
		echo 	"<div class='circle fourth'><a href='live.php' target='_blank' class='btn btn-link'>Live Result</a><br/></div>"; 
		echo 	"<div class='circle fifth'><a href='viewresult.php' class='btn btn-link'>View Result</a><br/></div>";

		echo 	"<div class='circle six'><a href='deletecand.php' class='btn btn-link'>Delete Candidate</a></di>";
		?>
			
		<?php
		
		
		echo "		</div>";
		
		?>
		</div>
		<?php
	}
	else {
		header('Location: index.php');
	}
?>