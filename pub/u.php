<?php
	
	session_start();
	include('fn/loggedin.php');
	$curUser = $_SESSION['qp'];

	@$userId = $_GET['id'];
	if(!$userId)
	{
		include('404.php');
		exit();
	}

	include('db.php');
	$checkUser = $DBH->prepare("SELECT * FROM users WHERE id=?");
	$checkUser->execute(array($curUser));
	
	/*Load User Data:*/
	while($userData = $checkUser->fetch())
	{
		$userId = $userData['id'];
		$userfName = $userData['fullname'];
		$userName = $userData['username'];
		$usersName = $userData['fbusername'];
		$useroauthp = $userData['oauthp'];
		$useroauthid = $userData['oauthid'];
	}
	
	$pageName = "$userfName on Quizr";
	include('temp/header.php');

?>

<header class="page-head">
	<hgroup>
		<h2><?php echo $userfName; ?></h2>
		<h3></h3>
	</hgroup>
</header>