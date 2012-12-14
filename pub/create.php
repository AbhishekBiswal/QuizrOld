<?php
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/');
		exit();
	}

	$pageName = "Create a new Quiz";
	include('temp/header.php');

?>
<header class="page-head">
	<hgroup>
		<h2>Create a New Quiz</h2>
		<h3>Create.Publish.Share.</h3>
	</hgroup>
</header>

<section id="editquiz">
	<div class="quiz">
		<form class="create-quiz-det ajax withhelp" action="/ajax/create/createnew.php">
			<p class="submitinfo"></p>
			<div><input type="text" name="title" placeholder="Title"></div>
			<textarea name="desc" placeholder="Description Here (Optional)"></textarea>
			<button class="btn disp-block" type="submit">CREATE</button>
		</form>
	</div>
</section>

<?php
	include('temp/footer.php');
?>