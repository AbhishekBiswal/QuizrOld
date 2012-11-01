<?php
	session_start();
	include('fn/loggedin.php');
	echo $loggedin;
	if($loggedin == 0)
	{
		echo "You must be logged in";
		exit();
	}

	$userName = $_POST['username'];

	if((strlen($userName)<3) || (strlen($userName)>30))
	{
		echo "The UserName enetered is invalid";
		exit();
	}
?>