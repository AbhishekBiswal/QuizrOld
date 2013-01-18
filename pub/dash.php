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
	include('db.php');

	/*
	
	TODO:Unpublished quizzes and published ones. send user to /q/123 and display a button to publish the quiz, only if the guy viewing it is the creator.

	*/
?>

<div class="det-head">
	<h2>Dashboard</h2>
</div>

<div class="u-page-box ten columns">

	<div class="u-page-header">Unpublished Quizzes:</div>
	<ul class="u-page-list">
	<?php
		include_once('fn/loadquiz.php');
		loadQuizlist($curUser,$DBH,0);
		quizList($fetch);
	?>
	</ul>

	<div class="u-page-header">Published Quizzes:</div>
	<ul class="u-page-list">
	<?php
		loadQuizlist($curUser,$DBH,1);
		quizList($fetch);
	?>
	</ul>

</div>

<div class="sidebar columns four float-right">
	<h3 class="loudtext">
		Find more quizzes:
	</h3>
	<a class="disp-block btn btn-blue">BROWSE</a>
	<h3 class="loudtext text-center">OR</h3>
	<a class="disp-block btn">SEARCH</a>
</div>



<?php
	include('temp/footer.php');
?>