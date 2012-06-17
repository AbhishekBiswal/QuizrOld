<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pageName; ?></title>
	<link href="/assets/css/grid.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/edit.css" rel="stylesheet" type="text/css">
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
		<ul class="nav float-right text-right columns three">
		<?php
			if($loggedin == 1)
			{
		?>
			<li><a href="/u/<?php echo $_SESSION['qp']; ?>"><?php echo $_SESSION['qu']; ?></a></li>
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