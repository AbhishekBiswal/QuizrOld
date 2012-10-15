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
	}

	include('fn/loaduser.php');
	loadUser($qUser,$DBH);
	
	$pageName = $qTitle . " - Quizr";
	include('temp/header.php');
?>

<div class="det-head">
	<h2><?php echo $qTitle; ?><span class="quizby">By <a href="/u/<?php echo $qUser; ?>/"><?php echo $loadfName; ?></a></span></h2>
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

<div class="content">
	<div>
		<p class="grayinfo"><?php echo $qDesc; ?></p>
	</div>
	<a href="/" class="btn">PLAY</a>
</div>

<?php
	include('temp/footer.php');
?>