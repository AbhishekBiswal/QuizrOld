<?php
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		echo '<script>notify("Please Login To Continue.");</script>';
		exit();
	}

	
?>