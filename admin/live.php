<?php
	session_start();
	
	if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
		
		include "../connect.php";
		$select_db = mysqli_select_db($conn,$db);
		
		echo "<!DOCTYPE html>
			<html lang='en-US'>
			<head>
				<title>Live Result AIE Voting System</title>";
				
		include "head_tag.php";
				
		echo "	</head>
			<body>
				<div class='container'>
					<div class='jumbotron'>
						<h1>Live Result AIE Voting System</h1>";
		echo 			"<b>Welcome!</b> ". "<span class='text-uppercase'><b><u>" . $_SESSION['user'] . "</u></b><br/></span>";		
		echo 			"<a href='logout.php'>Logout</a><br/><br/>"; //Logout function 
		
		echo 			"<br/></br>";
		echo 			"<button class='btn btn-danger' onclick='self.close();'>Close</div>";
		

		echo "		</div>";
		
	}
	else {
		header('Location: index.php');
	}
?>

	<div id='live' class='container'>
		<h2>Loading....</h2>
	</div>

<script>
	//refreshing every second part of the
	//page only @ div #live
	
	var refreshPage = setInterval(
	function ()	{
	$('#live').load('lr.php');
	}, 1000); 
	
	
</script>
	
	<div class='container'>
		<div class='jumbotron'>
			<h3 class='text-center'>&reg; Gawang Gwapo &trade;</h3>
		</div>
	</div>
	
</body>
</html>