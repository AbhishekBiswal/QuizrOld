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
		//$hasHint = $row['hashint'];
		$hint = $row['hint'];
		$qImage = $row['image'];
		$qPlus = $row['plus'];
		$qid = $row['id'];
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

	<form class="ajax" action="edit-sub.php">
	<p class="submitinfo"></p>
		<input type="hidden" name="id" value="<?php echo $questionid; ?>">
		<input type="text" name="question" placeholder="Question" value="<?php echo $question; ?>"><br>
		<a class="add-image btn btn-small"><?php if($qImage == "") { ?>Add Image<?php } else { ?>Remove Image<?php } ?></a>
		<div class="add-image <?php if($qImage == "") { ?>hide<?php } ?>">
			<p class="disp-block text-info">The URL of the Image to be included in the question:</p>
			<input class="image" type="text" name="q-image" placeholder="Image URL" value="<?php echo $qImage; ?>">
		</div><br><br>
		<textarea name="q-desc" placeholder="Description / More Info" value="<?php echo $qdesc; ?>"></textarea><br>
		<input type="text" class="small" name="answer" placeholder="Answer" value="<?php echo $answer; ?>">
		<input type="hidden" name="q-id" value="<?php echo $qid; ?>">
		<a class="add-hint btn btn-small"><?php if($hint == "") { ?>Add Hint<?php } else { ?>Remove Hint<?php } ?></a>
		<div class="add-hint <?php if($hint == "") { ?>hide<?php } ?>">
			<input class="small" type="text" name="q-hint" placeholder="Hint" value="<?php echo $hint; ?>">
		</div>
		<p class="text-info">Select difficulty for question :
		<select class="difficulty" name="plus">
			<option value="easy" <?php if($qPlus == 4) echo "selected"; ?>>Easy</option>
			<option value="moderate" <?php if($qPlus == 6) echo "selected"; ?>>Moderate</option>
			<option value="hard" <?php if($qPlus == 10) echo "selected"; ?>>Hard</option>
		</select>
		</p>
		<div id="form-buttons">
			<button class="btn" type="submit" name="add-another">Update</button>
		</div>
	</form>

	<!-- <form class="add-quiz-question ajax" action="edit-sub.php">
		<p class="submitinfo"></p>
		<input type="hidden" name="id" value="<?php echo $questionid; ?>">
		<input type="text" name="question" placeholder="Question" value="<?php echo $question; ?>"><br>
		<textarea name="desc" placeholder="Description"><?php echo $qdesc; ?></textarea><br>
		<input type="text" name="answer" placeholder="Answer" value="<?php echo $answer; ?>">
		<div id="form-buttons">
			<button class="btn" type="submit" name="add-another">Update</button>
		</div>
	</form> -->

</div>

<?php
	include('temp/footer.php');
?>