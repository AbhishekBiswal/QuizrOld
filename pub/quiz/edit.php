<?php
	session_start();
	$curUser = $_SESSION['qp'];
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/');
		exit();
	}
	$questionid = $_GET['id'];
	if(!$questionid)
	{
		header('Location:/create.php');
		exit();
	}

	include('db.php');
	$checkid = $DBH->prepare("SELECT * FROM questions WHERE id=? AND user=?");
	$checkid->execute(array($questionid,$curUser));
	if($checkid->rowCount() == 0)
	{
		include('404.php');
		exit();
	}

	while($row = $checkid->fetch())
	{
		$questionid = $row['id'];
		$question = $row['question'];
		$qdesc = $row['qdesc'];
		$answer = $row['answer'];
		$hasHint = $row['hashint'];
		$hint = $row['hint'];
	}
		
	$pageName = "Edit a Question - Quizr";
	include('temp/header.php');
?>

<header class="page-head">
	<hgroup>
		<h2>Edit Question:</h2>
	</hgroup>
</header>

<div class="content">

	<form class="add-quiz-question ajax" action="edit-sub.php">
		<p class="submitinfo"></p>
		<input type="hidden" name="id" value="<?php echo $questionid; ?>">
		<input type="text" name="question" placeholder="Question" value="<?php echo $question; ?>"><br>
		<textarea name="desc" placeholder="Description"><?php echo $qdesc; ?></textarea><br>
		<input type="text" name="answer" placeholder="Answer" value="<?php echo $answer; ?>">
		<div id="form-buttons">
			<button class="btn" type="submit" name="add-another">Update</button>
		</div>
	</form>

</div>

<?php
	include('temp/footer.php');
?>