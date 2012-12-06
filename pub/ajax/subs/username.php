<?php
	
	include_once('db.php');
	include_once('fn/loadquiz.php');
	// todo : add exception for usernames not null
	$userName = $_POST['username'];
	checkUsername($userName,$DBH);

?>