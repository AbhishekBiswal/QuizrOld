<?php

	$server_type_pdo = "local";

	if($server_type_pdo == "local")
	{
		$host = "localhost";
		$dbname = "quizr";
		$seruser = "root";
		$pass = "abhishekbiswal";	
	}
	else
	{
		$host = "aksdadcom.fatcowmysql.com";
		$dbname = "quizr";
		$seruser = "abhishekbiswal";
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