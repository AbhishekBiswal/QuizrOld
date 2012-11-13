<?php
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 0)
	{
		header('Location:/login');
		exit();
	}

	$pageName = "Create a new Quiz";
	include('temp/header.php');

?>
<header class="page-head">
	<hgroup>
		<h2>Create a New Quiz</h2>
		<h3>Create a new Quiz, publish it and share it with your friends!</h3>
	</hgroup>
</header>

<section id="editquiz">
	<div class="quiz">
		<form class="create-quiz-det ajax withhelp" action="/ajax/create/createnew.php">
			<p class="submitinfo"></p>
			<div><input type="text" name="title" placeholder="Title"><span class="helpinline">Title Here</span></div>
			<textarea name="desc" placeholder="Description Here (Optional)"></textarea>
			<button class="btn" type="submit">CREATE</button>
		</form>
	</div>
</section>

<?php
	include('temp/footer.php');
?>