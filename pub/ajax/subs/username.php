<?php
	session_start();
	include_once('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/');
		exit();
	}
	include_once('db.php');
	include_once('fn/loadquiz.php');

	// todo : add exception for usernames not null
	$userName = $_POST['username'];
	$userMail = $_POST['email'];

	if((strlen($userName)<3) || (strlen($userName)>20))
	{
		echo "Username is invalid";
		exit();
	}

	$checkU = checkEmail($userName,$DBH);
	if($checkU == 1)
	{
		echo "The Username is not available!";
		//echo '<script>$("input[type=submit]").val("Check");</script>';
		exit();
	}

	include_once('validate/do.php');
	$validator = new Validator();
	if($validator->isValid($userMail,'email') == false)
	{
		echo "Invalid Email Address.";
		exit();
	}

	$checkE = checkUsername($userMail,$DBH);
	if($checkE == 1)
	{
		echo "This Email Address is already in use.";
		//echo '<script>$("input[type=submit]").val("Check");</script>';
		exit();
	}
	
	$updUname = $DBH->prepare("UPDATE users SET username=? WHERE id=?");
	$updUname->execute(array($userName,$curUser));
	$_SESSION['qu'] = $userName;
	//header('Location:/' . $userName);
	echo '<script>location.href = "/' . $userName . '/";</script>';

?>