<?php
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 1)
	{
		header('Location:/');
		exit();
	}

	$pageName = "Login / Register - Quizr";
	include('temp/header.php');
?>

<div class="container main">

	<header class="page-head">
		<hgroup>
			<h2>Login Or Register</h2>
			<h3>You can Login or Register using your existing Facebook or Twitter Account. Blah Blah Blah.</h3>
		</hgroup>
	</header>

<div id="content">

	<a class="fb-btn" href="/fb/fbauth.php">Login using Facebook</a>
	<a class="twitter-btn" href="/fb/fbauth.php">Login using Twitter</a>

</div>

</div>

<?php
	include('temp/footer.php');
?>