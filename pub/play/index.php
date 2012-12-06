<?php
	/*Play a Quiz*/
	$qid = $_GET['id'];
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/login.php?continue=/play/?id=' . $qid);
		exit();
	}

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
	// load quizmeta
	while($row = $check->fetch())
	{
		$qQuestions = $row['questions'];
		$qTitle = $row['title'];
		$qDesc = $row['qdesc'];
		$qUser = $row['user'];
	}

	/*Todo - check if user is the current user. dont' allow*/

	$checkPlay = $DBH->prepare("SELECT * FROM played WHERE qid=? AND user=?");
	$checkPlay->execute(array($qid,$curUser));
	if($checkPlay->rowCount() == 0)
	{
		$questionTostart = 1;
		$createRecord = $DBH->prepare("INSERT INTO played(qid,user,playedtill) VALUES(?,?,?)");
		$createRecord->execute(array($qid,$curUser,0));
		$addPlays = $DBH->prepare("UPDATE quizmeta SET plays=plays+1 WHERE id=?");
		$addPlays->execute(array($qid));
	}
	else
	{
		while($row = $checkPlay->fetch())
		{
			$playedTill = $row['playedtill'];
		}
		$questionTostart = $playedTill+1;
		if($questionTostart > $qQuestions)
		{
			header('Location:/q/?id=' . $qid);
			exit();
		}
	}

	$pageName = $qTitle . " - Quizr";
	include('temp/header.php');

?>

<div class="page-head">
	<h2><?php echo $qTitle; ?></h2>
	<h3><?php echo $qDesc; ?></h3>
</div>

<?php
	//load question:
	$load = $DBH->prepare("SELECT * FROM questions WHERE qid=? AND seq=?");
	$load->execute(array($qid,$questionTostart));
	$noquestions = 0;
	if($load->rowCount() == 0)
	{
		$noquestions = 1;
	}
	else
	{
		while($data = $load->fetch())
		{
			$questionID = $data['id'];
			$qQuestion = $data['question'];
			$qDesc = $data['qdesc'];
			$qSeq = $data['seq'];
			$qImage = $data['image'];
		}
	}
?>
<input type="hidden" value="<?php echo $questionID; ?>" class="q">
<div class="content play-quiz">

<?php
	if($noquestions == 1)
	{
		echo '<p class="grayinfo">No Questions are added yet.</p></div>';
		include('temp/footer.php');
		exit();
	}
?>

<div id="quiz-area">

	<div class="question-no">
		<?php echo $qSeq . ' <span>/</span> ' . $qQuestions; ?>
	</div>
	
	<form class="ajax" action="sub.php">
		<p class="submitinfo"></p>
	<div class="quiz-area-in">
		<span class="question"><?php echo $qQuestion; ?></span>
		<?php if($qDesc != NULL) { echo $qDesc; } ?>
		<?php
			if($qImage != NULL)
			{
				echo '<br><img class="q-play-image" src="' . $qImage . '"><br>';
			}
		?>
		<br><br><input type="text" name="ans" placeholder="Answer"><br>
		<input type="hidden" name="q-id" value="<?php echo $questionID; ?>">
		<input type="hidden" name="seq" value="<?php echo $qSeq; ?>">
		<input type="hidden" name="qid" value="<?php echo $qid; ?>">
	</div>
		<input type="submit" class="btn" value="Try">
	</form>

</div>

</div>

<?php
	include('temp/footer.php');
?>