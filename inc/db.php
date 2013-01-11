<?php

	$server_type_pdo = "local";

	if($server_type_pdo == "local")
	{
		$host = "localhost";
		$dbname = "quizr";
		$seruser = "root";
<<<<<<< HEAD
		$pass = "abhishekbiswal";	
=======
		$pass = "bharatkashyap";	
>>>>>>> ad4086c5104cfe849cedcbfc7cedf88948d8f0ee
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