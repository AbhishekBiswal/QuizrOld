<?php

	$server_type_pdo = $_SERVER['SERVER'];

	if($server_type_pdo == "local")
	{
		$host = "localhost";
		$dbname = "quizr";
		$seruser = "root";
		$pass = "abhishekbiswal";	

	}
	else
	{
		$host = "localhost";
		$dbname = "quizr";
		$seruser = "quizr";
		$pass = "thestartupkids:P";
	}

	try 
	{  
		# MySQL with PDO_MYSQL 
		global $DBH;
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $seruser, $pass);  
	}  
	catch(PDOException $e)
	{  
		    echo $e->getMessage();  
	}  

?>