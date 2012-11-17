<?php
	session_start();
	$pageName = "About Quizr";
	include('fn/loggedin.php');
	include('temp/header.php');
?>

<div class="det-head">
	<h2>About Quizr</h2>
	<h3>A Quizzing platform for smart people to create and play quizzes.</h3>
</div>

<div class="u-page-box ten columns content content-about">

	<h3>About Quizr</h3>
	<p>
		Quizr is an online quizzing platform where you can play quizzes made by other users, or create your own for other people to play. By playing quizzes, you earn points. You can use the points earned to create and promote your own Quizzes.
	</p>

	<h3>The Team Behind Quizr</h3>
	<p>
		<ul class="team">
			<li>
				<h4>Abhishek Biswal</h4><span>co-founder, lead developer</span>
				<p>
					A tech enthusiast, app developer, designer. Currently studying in Delhi Public School, R.K. Puram.
				</p>
			</li>
			<li>
				<h4>Achal Varma</h4><span>co-founder, business head</span>
				<p>
					Designer, Photographer, Currently studying computer science at University of Illinois.
				</p>
			</li>
		</ul>
	</p>
</div>

<?php
	include('temp/footer.php');
?>