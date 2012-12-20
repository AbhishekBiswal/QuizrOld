<?php
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/');
		exit();
	}

	include_once('db.php');
	include('fn/loaduser.php');
	loadUName($curUser,$DBH); 
	if(loadUName($curUser,$DBH) != NULL)
	{
		header('Location:/');
		exit();
	}

	$pageName = "Choose a Username";
	include('temp/header.php');
?>

<div class="page-head">
	<h2>Choose a Username</h2>
	<h3>Customize you account : create a unique profile.</h3>
</div>

<div class="main">
<div class="u-page-box columns ten">

<form class="ajax content" action="ajax/subs/username.php">

	<p class="submitinfo disp-block">Choose a Unique Username</p>
	<input type="text" class="disp-block" placeholder="Username" name="username">

	<input type="text" class="disp-block" placeholder="Email Address" name="email">
	
	<input type="submit" class="btn disp-block" value="Save">

</form>

</div>
</div>

<?php
	include('temp/footer.php');
?>