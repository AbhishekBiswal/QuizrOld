<?php
	session_start();
	$curUser = $_SESSION['qp'];
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/');
		exit();
	}
	$qid = $_GET['id'];
	if(!$qid)
	{
		header('Location:/create.php');
		exit();
	}

	include('db.php');
	$checkid = $DBH->prepare("SELECT * FROM quizmeta WHERE id=? AND user=?");
	$checkid->execute(array($qid,$curUser));
	if($checkid->rowCount() == 0)
	{
		include('404.php');
		exit();
	}

	while($row = $checkid->fetch())
	{
		$quizTitle = $row['title'];
	}
		
	$pageName = "Add a Question - Quizr";
	include('temp/header.php');
?>

<header class="page-head">
	<hgroup>
		<h2>Add Question:</h2>
		<h3><?php echo $quizTitle; ?></h3>
	</hgroup>
</header>

<div class="content">

	<form class="ajax" action="add-sub.php">
	<p class="submitinfo"></p>
		<input type="text" name="question" placeholder="Question"><br>
		<a class="add-image btn btn-small">Add Image</a>
		<div class="add-image hide">
			<p class="disp-block text-info">The URL of the Image to be included in the question:</p>
			<input class="image" type="text" name="q-image" placeholder="Image URL">
		</div><br><br>
		<textarea name="q-desc" placeholder="Description / More Info"></textarea><br>
		<input type="text" class="small" name="answer" placeholder="Answer">
		<input type="hidden" name="q-id" value="<?php echo $qid; ?>">
		<a class="add-hint btn btn-small">Add Hint</a>
		<div class="add-hint hide">
			<input class="small" type="text" name="q-hint" placeholder="Hint">
			<p class="disp-block text-info">Points to be deducted for viewing the hint.</p>
			<input class="small smaller" type="text" name="q-hint" placeholder="Hint">
		</div>
		<p class="text-info">Points for Correct Answer: <input type="text" class="small inline-small" name="points-correct" value="2"></p>
		<div id="form-buttons">
			<button class="btn" type="submit" name="add-another">Save and Add More</button>
			<button name="done" class="btn">Done</button>
		</div>
	</form>

</div>

<?php
	include('temp/footer.php');
?>