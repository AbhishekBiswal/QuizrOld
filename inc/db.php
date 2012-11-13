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
		$host = "mysql-shared-02.phpfog.com";
		$dbname = "beta_scoopd_in";
		$seruser = "Custom App-32140";
		$pass = "chunmunr14612";
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