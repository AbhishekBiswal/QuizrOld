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
			<li><a href="/browse/" <?php if(!$cat) echo 'class="active"'; ?>>All</a></li>
			<li><a href="/browse/" <?php if(checkCat($cat) == "General") echo 'class="active"'; ?>>General</a></li>
			<li><a href="#" <?php if(checkCat($cat) == "Tech") echo 'class="active"'; ?>>Tech</a></li>
			<li><a href="#" <?php if(checkCat($cat) == "Gaming") echo 'class="active"'; ?>>Gaming</a></li>
			<li><a href="#" <?php if(checkCat($cat) == "Sports") echo 'class="active"'; ?>>Sports</a></li>
			<li><a href="#" <?php if(checkCat($cat) == "History") echo 'class="active"'; ?>>History</a></li>
		</ul>
	</div>


	<div class="u-page-box content">

		<h2 class="big-title"><?php echo checkCat($cat); ?> Quizzes</h2>
		<ul class="head-nav">
			<li><a href="/browse/?cat=<?php echo "$cat&get=popular"; ?>" <?php if($what == "popular") echo 'class="active"'; ?>>Popular</a></li>
			<li><a href="/browse/?cat=<?php echo "$cat&get=popular"; ?>" <?php if($what == "mostliked") echo 'class="active"'; ?>>Most Liked</a></li>
		</ul>
		<br>

		<!-- todo : search-engine and category selection -->
		<div class="browse-quizzes">
		<ul>
		<?php
			include_once('db.php');
			//include_once('fn/browse.php');
			browseCat($cat, $what, $DBH);
		?>
		</ul>
		</div>


	</div>

<?php
	include('temp/footer.php');
?>