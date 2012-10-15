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
		<ul class="nav columns four">
			<li><a href="/">Home</a></li>
			<li><a href="/browse.php">Browse</a></li>
			<li><a href="/create.php">Create</a></li>
		</ul>
		<ul class="nav float-right text-center columns three">
		<?php
			if($loggedin == 1)
			{
		?>
			<li class="dropit"><a class="dropit" href="#"><?php echo $_SESSION['qu']; ?></a>
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
			<li><a href="/login.php">Login</a></li>
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