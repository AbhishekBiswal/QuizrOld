<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pageName; ?></title>
	<link href="/assets/css/grid.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/edit.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/cssr.css" rel="stylesheet" type="text/css">
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
		<?php
			if($loggedin == 1)
			{
		?>
			<li class="dropit text-right float-right"><a class="dropit" href="#"><?php echo $_SESSION['qu']; ?></a>
				<ul class="dropdown">
					<li><a href="/u/">Profile</a></li>
					<li><a href="/logout.php">Logout</a></li>
				</ul>
			</li>
		<?php		
			}
			else
			{
		?>
			<li class="text-right float-right"><a href="/beta.php">Sign Up For Beta</a></li>
		<?php		
			}
		?>
		</ul>
	</div>

</div>

<header id="header">
<div class="container">
	<div class="header-logo">
		<a href="/"><img src="/assets/img/logo.png"></a>
	</div>
</div><!--container-->
</header>

<div class="container" id="wrap">