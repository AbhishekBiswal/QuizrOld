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

	<form class="add-quiz-question">
		<input type="text" name="question" placeholder="Question"><br>
		<div id="options">
		<input type="text" class="small" name="option1" placeholder="Option 1"><br>
		<input type="text" class="small" name="option2" placeholder="Option 2"><br>
		<input type="text" class="small" name="option3" placeholder="Option 3 (Optional)"><br>
		<input type="text" class="small" name="option4" placeholder="Option 4 (Optional)"><br>
		</div>
		<div id="form-buttons">
			<button class="btn" type="submit" name="add-another">Save and Add More</button>
			<button name="done" class="btn">Done</button>
		</div>
	</form>

</div>

<?php
	include('temp/footer.php');
?>