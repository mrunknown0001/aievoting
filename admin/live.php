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
		<?php require_once "lr.php";?>
	</div>

<script>
	
	//refresh page after 5 secods
     var time = new Date().getTime();
     $(document.body).bind("mousemove keypress", function(e) {
         time = new Date().getTime();
     });

     function refresh() {
         if(new Date().getTime() - time >= 5000) 
             window.location.reload(true);
         else 
             setTimeout(refresh, 5000);
     }

     setTimeout(refresh, 5000);
</script>
	
</body>
</html>