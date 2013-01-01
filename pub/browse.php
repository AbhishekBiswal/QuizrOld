<?php

	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/');
		exit();
	}

	include_once('fn/browse.php');
	@$cat = $_GET['cat'];
	@$what = $_GET['get']; /* popular, most liked */
	if(!$cat) $cat = 0;
	if(!$what) $what = "popular";

	/*
	What :
	Most Viewed : By Number of views
	Most Liked : By Number of Favourites
	*/

	$pageName = "Browse Quizzes";
	include('temp/header.php');

?>

	<div class="det-head">
		<h2>Browse Quizzes</h2>
		<ul class="head-nav">
			<li><a href="#" class="active">All</a></li>
			<li><a href="#">General</a></li>
			<li><a href="#">Tech</a></li>
			<li><a href="#">Gaming</a></li>
		</ul>
	</div>


	<div class="u-page-box columns ten">

		<h2 class="big-title">All Quizzes</h2>
		<ul class="head-nav">
			<li><a href="#" class="active">Popular</a></li>
			<li><a href="#">Most Liked</a></li>
		</ul>
		<br>

		<!-- todo : search-engine and category selection -->
		<div class="browse-quizzes">
		<ul>
		<?php
			include_once('db.php');
			include_once('fn/browse.php');
			browseCat($cat, $what, $DBH);
		?>
		</ul>
		</div>


	</div>

<?php
	include('temp/footer.php');
?>