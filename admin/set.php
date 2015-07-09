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
		
		echo 	"<button class='btn btn-link' ><a href='addstudform.php'>Add Students</a></button><br/>";
		echo 	"<button class='btn btn-link' ><a href='addcandform.php'>Add Candidate</a></button><br/>";
		
		echo "		</div>";
		
		echo 	"<div id='inputform' class=''></div>";
		
		echo "		</div>";

	}
	else {
		header('Location: index.php');
	}
?>