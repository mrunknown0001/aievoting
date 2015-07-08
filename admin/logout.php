<?php
	session_start();
	
	session_destroy();
	
	@mysqli_close($conn);
	
<<<<<<< HEAD
	header('Location: index.php');
=======
	header('Location: ../index.php');
>>>>>>> fbf4390ff6fb0dcec42f1f127806c98a80dc0f63
?>