<?php
	
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		echo "Please Login to Continue";
		exit();
	}

	include_once('db.php');

?>