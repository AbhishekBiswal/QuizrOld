<?php
	session_start();
	$curUser = $_SESSION['qp'];
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/');
		exit();
	}
	$qid = $_GET['id'];
	if(!$qid)
	{
		header('Location:/create.php');
		exit();
	}

	include('db.php');
	$checkid = $DBH->prepare("SELECT * FROM quizmeta WHERE id=? AND user=?");
	$checkid->execute(array($qid,$curUser));
	if($checkid->rowCount() == 0)
	{
		include('404.php');
		exit();
	}
		
	$pageName = "Add a Question - Quizr";
	include('temp/header.php');
?>

<header class="page-head">
	<hgroup>
		<h2>Welcome To Quizr</h2>
		<h3>Quizr is goin' to be the next big thing</h3>
	</hgroup>
</header>

<div class="container"></div>

<?php
	include('temp/footer.php');
?>