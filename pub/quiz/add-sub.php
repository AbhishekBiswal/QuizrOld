<?php
/*
Plan: After the user creates a quiz, he is redirected here with GET var "id", which is the quiz id in our db. Now, the script will:
-check the id and if the user is allowed to add questions.
-create an md5 hash key, insert it into the db, and create a session on user's system.
*/
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		
	}
	$qid = $_GET['id'];
	$user = $_SESS

?>