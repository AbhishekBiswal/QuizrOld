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

<div class="content columns ten">

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
		</div>
		<p class="text-info">Select difficulty for question :
		<select class="difficulty" name="plus">
			<option value="easy">Easy</option>
			<option value="moderate">Moderate</option>
			<option value="hard">Hard</option>
		</select>
		</p>
		<div id="form-buttons">
			<button class="btn" type="submit" name="add-another">Save and Add More</button>
			<button name="done" class="btn">Done</button>
		</div>
	</form>

</div>

<div class="columns five">
<<<<<<< HEAD
	<?php
		include_once('fn/loadquiz.php');
		questionsList();
	?>
=======

	<ul class="edit-ques-list">
	<?php
		include_once('fn/loadquiz.php');
		questionsList($qid,$curUser,$DBH);
	?>
	</ul>

>>>>>>> master
</div>

<?php
	include('temp/footer.php');
?>