<?php
	session_start();
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		
<<<<<<< HEAD
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
		
		echo 	"<button class='btn btn-link' onclick='addstud()'>Add Students</button><br/>";
		echo 	"<button class='btn btn-link' onclick=''>Add Candidate</button><br/>";
		
		echo "		</div>";
		
		echo 	"<div id='inputform' class=''></div>";
		
		echo "		</div>
			</body>
			</html>
		";
		
=======
>>>>>>> fbf4390ff6fb0dcec42f1f127806c98a80dc0f63
	}
	else {
		header('Location: index.php');
	}
?>