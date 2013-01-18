<?php
	
	// vars:
	@$term = $_POST['search-term'];

	if(!$term)
	{
		echo "no term";
		exit();
	}

	$term = htmlentities($term);

	include_once('db.php');
	include_once('fn/browse.php');

	// to search : quizzes/users

	// quizzes:
	$quizzes = $DBH->prepare("SELECT * FROM quizmeta WHERE title LIKE ?");
	$quizzes->execute(array("%$term%"));
?>
	<div class="search-quiz">
		<h3 class="search-title">Quizzes:</h3>
<?php
	if($quizzes->rowCount() == 0)
	{
		// nothing.
		echo '<p class="grayinfo">Nothing Found.</p>';
	}
	else
	{
		browseLoad($quizzes);
	}

?>
	</div><!--search-quiz-->
	<br></br>
	<div class="search-users">
		<h3 class="search-title">Users:</h3>


	</div>