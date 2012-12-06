<?php

	session_start();
	include('fn/loggedin.php');

	$pageName = "Browse Quizzes";
	include('temp/header.php');

?>

	<div class="det-head">
		<h2>Browse Quizzes</h2>
	</div>


	<div class="u-page-box columns ten">


		<!-- todo : search-engine and category selection -->
		<div class="browse-quizzes">
		<ul>
		<?php
			include_once('db.php');
			include_once('fn/browse.php');
			$cat = "all";
			browseCat($cat, $DBH);
		?>
		</ul>
		</div>


	</div>

<?php
	include('temp/footer.php');
?>