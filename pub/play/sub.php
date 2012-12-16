<?php
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		echo "Please Login.";
		exit();
	}
	/*Submit answer (/play/sub.php)*/
	/*
	Get:
	quetsion id, answer
	*/
	// vars:
	$quid = $_POST['q-id']; // question ID
	$qseq = $_POST['seq'];
	$quizID = $_POST['qid'];
	$answer = $_POST['ans'];
	if(!$quid)
	{
		echo "An Error occured. Please try again later. (1)";
		exit();
	}
	if(!$answer)
	{
		echo "No Answer?";
		exit();
	}
	include_once('fn/points.php');
	include('db.php');
	$checkquid = $DBH->prepare("SELECT * FROM questions WHERE id=?");
	$checkquid->execute(array($quid));
	if($checkquid->rowCount() == 0)
	{
		echo "Error. Try again later (3)";
		exit();
	}


	while($row = $checkquid->fetch())
	{
		$qAnswer = $row['answer'];
		$qPlus = $row['plus'];
	}
	$correct = 0;
	if($qAnswer == $answer)
	{
		$correct = 1;
		addPoints($curUser,$qPlus,$DBH);
	}

	function answerCorrect($quid,$DBH,$qseq,$quizID,$curUser)
	{
		// if the answer is correct :
		$addtoRecords = $DBH->prepare("UPDATE played SET playedtill=playedtill+1 WHERE qid=? AND user=?");
		$addtoRecords->execute(array($quizID,$curUser)); 
		echo '<script>location.reload();</script>';
		exit();
		//load question:
		$qseq++;
		$load = $DBH->prepare("SELECT * FROM questions WHERE qid=? AND seq=?");
		$load->execute(array($quizID,$qseq));
		$noquestions = 0;
		if($load->rowCount() == 0)
		{
			// redirect to some page.
			echo "Quiz -> End";
		}
		else
		{
			while($data = $load->fetch())
			{
				$questionID = $data['id'];
				$qQuestion = $data['question'];
				$qDesc = $data['qdesc'];
				$qSeq = $data['seq'];
			}
	?>

	<div class="hidden-quiz-area">
		<span class="question"><?php echo $qQuestion; ?></span>
		<?php if($qDesc != NULL) { echo $qDesc; } ?>
		<br><br><input type="text" name="ans" placeholder="Answer"><br>
		<input type="hidden" name="q-id" value="<?php echo $questionID; ?>">
		<input type="hidden" name="seq" value="<?php echo $qSeq; ?>">
		<input type="hidden" name="qid" value="<?php echo $qid; ?>">
	</div>

	<script>
	$(document).ready(function(){
		var quizarea = $(".hidden-quiz-area").html();
		$(".quiz-area-in").html(quizarea);
	});
	</script>

	<?php
		} // else

	}


	if($correct == 1)
	{ 
		echo "Correct!";
		answerCorrect($quid,$DBH,$qseq,$quizID,$curUser);
	}
	else
	{
		echo "Incorrect! Try Again?";
	}
	
?>