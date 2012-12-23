<!DOCTYPE html>
<html>
<!-- v0.1 23/12/12 ab -->
<head>
	<title><?php echo $pageName; ?> / Quizr</title>

	<meta name="description" content="An online quizzing platform to play, create and share quizzes.">
	<meta name="keywords" content="quiz,quizzing,quizr,create,play,tech,share">
	<meta name="robot" content="index,follow">
	<meta name="copyright" content="Copyright © 2012 Quizr. All Rights Reserved.">
	<meta name="language" content="English">

	<link href="/assets/css/grid.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/edit.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/ab.css" rel="stylesheet" type="text/css">
	<script src="/assets/js/jquery.js"></script>
	<script src="/assets/js/main.js"></script>
</head>
<body>

<div id="dashbar">
	<div class="container">
		<ul class="nav columns sixteen">
			<li><a href="/">Home</a></li>
			<li><a href="/browse.php">Browse</a></li>
			<li><a href="/create.php">Create</a></li>
			<li><a href="/leaderboard.php">Leaderboard</a></li>
		<?php
			if($loggedin == 1)
			{
		?>
			<li class="dropit text-right float-right"><a class="dropit" href="#"><?php echo $_SESSION['qu']; ?></a>
				<ul class="dropdown">
					<li><a href="/<?php echo $_SESSION['qu']; ?>/">Profile</a></li>
					<li><a href="/settings/profile.php">Settings</a></li>
					<li><a href="/logout.php">Logout</a></li>
				</ul>
			</li>
		<?php		
			}
			else
			{
		?>
			
		<?php		
			}
		?>
		</ul>
	</div>

</div>

<header id="header">
<div class="container">
	<div class="header-logo">
		<a href="/"><img src="/assets/img/ablogo.png"></a>
	</div>
</div><!--container-->
</header>

<div class="container" id="wrap">