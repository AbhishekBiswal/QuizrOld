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
	
	TODO:
	Unpublished quizzes and published ones. send user to /q/123 and display a button to publish the quiz, only if the guy viewing it is the creator.

	*/
?>

<div class="det-head">
	<h2>Dashboard</h2>
</div>

<div class="u-page-box ten columns">

	<div class="u-page-header">Unpublished Quizzes:</div>
	<ul class="u-page-list">
		<!-- <li><span class="grey">20 Questions</span> <a href="/">First Quiz :P</a></li> -->
	<?php

	/* To load the unpublished quizzes */
	$checkUnpub = $DBH->prepare("SELECT * FROM quizmeta WHERE user=? AND pub=0");
	$checkUnpub->execute(array($curUser));
	while($row = $checkUnpub->fetch())
	{
	?>
	<li><span class="grey two columns"><?php echo $row['questions']; ?> Questions</span> <a href="<?php echo "/q/".$row['id']; ?>"><?php echo $row['title']; ?></a></li>
	<?php
	} // while

	// unpublished quizzes loads. done.

	?>
	</ul>

</div>



<?php
	include('temp/footer.php');
?>