<?php
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/index.php');
		exit();
	}
	$pageName = "Quizr Dash";
	include('temp/header.php');
?>

<div class="det-head">
	<h2>Dashboard</h2>
</div>

<?php
	include('temp/footer.php');
?>