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
<div class="page-head">
		<h2>Create a New Quiz</h2>
		<h3>Create.Publish.Share.</h3>
</div>

<div id="editquiz" class="columns ten content">
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

			<br>
			<p class="text-info">Select a Category:
			<select class="select-cat" name="cat">
				<option value="1">General</option>
				<option value="2">Technology</option>
				<option value="3">Gaming</option>
			</select>
			</p><br>
			</p>
			
			<button class="btn disp-block" type="submit">CREATE</button>
		</form>
	</div>

</div>

<div class="sidebar columns five">
	<div class="hintbox helpbox">
		People can't view/play your quiz immediately after its creation. After adding questions to your quiz, you can make the quiz public, which would allow other users to play your quiz, and get indexed on the browse page.
	</div>
</div>

</section>


<?php
	include('temp/footer.php');
?>