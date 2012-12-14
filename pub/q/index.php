<?php
	session_start();
	include('fn/loggedin.php');
	$qid = $_GET['id'];
	if(!$qid)
	{
		include('404.php');
		exit();
	}

	include('db.php');
	$check = $DBH->prepare("SELECT * FROM quizmeta WHERE id=?");
	$check->execute(array($qid));

	if($check->rowCount() == 0)
	{
		include('404.php');
		exit();
	}

	//load vars:
	while($row = $check->fetch())
	{
		$qid = $row['id'];
		$qTitle = $row['title'];
		$qDesc = $row['qdesc'];
		$qUser = $row['user'];
		$qQuestions = $row['questions'];
		$qPlays = $row['plays'];
		$qPub = $row['pub'];
	}

	$thegod = 0;
	if($curUser == $qUser)
	{
		$thegod = 1;
	}

	include_once('fn/loaduser.php');
	$pageName = $qTitle . " - Quizr";
	include('temp/header.php');
?>

<div class="det-head">
	<h2><?php echo $qTitle; ?><span class="quizby">By <a href="/<?php echo loadUName($qUser,$DBH); ?>/"><?php echo loadUser($qUser,$DBH); ?></a></span></h2>
	<div class="info-boxes">
		<div class="info-box">
			<span class="one"><?php echo $qQuestions; ?></span>
			<span class="two">questions</span>
		</div>
		<div class="info-box">
			<span class="one"><?php echo $qPlays; ?></span>
			<span class="two">plays</span>
		</div>
	</div>
</div>

<div class="content u-page-box ten columns">
	<div>
		<p class="grayinfo"><?php echo $qDesc; ?></p>
	</div>
	<a href="/play/?id=<?php echo $qid; ?>" class="btn">PLAY</a>

	<div>

		<?php

		if($thegod == 1)
		{
		?>
		<div class="u-page-header">Admin Tools:</div>
		<a class="btn" href="/quiz/add.php?id=<?php echo $qid; ?>">Add Questions</a>

		<?php if($qPub == 0) { ?> <a class="btn" href="/quiz/pub.php?id=<?php echo $qid; ?>">Publish</a> <?php } ?>

		<?php
		}

		?>

	</div>

</div>

<?php
	include('temp/footer.php');
?>