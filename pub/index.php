<?php
	session_start();
	include('fn/loggedin.php');
	$pageName = "Home";
	include('temp/header.php');
?>

<header class="page-head">
	<hgroup>
		<h2>Welcome To Quizr</h2>
		<h3>Quizr is goin' to be the next big thing</h3>
	</hgroup>
</header>

<section class="container">
	<a href="#" class="btn">JOIN</a>
</section>

<?php
	include('temp/footer.php');
?>