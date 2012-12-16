<?php
	session_start();
	$pageName = "About Quizr";
	include('fn/loggedin.php');
	include('temp/header.php');
?>

<div class="det-head">
	<h2>About <span class="lblue">Quizr</span></h2>
</div>

<div class="u-page-box content content-about">

	<p>
		<span class="lblue">Quizr</span> is an online quizzing platform where you can play quizzes made by other users, or create your own for other people to play. It is a global platform for quiz enthusiasts to share their love for quizzing. 
	</p>
	<p>
		With <span class="lblue">Quizr</span>, an user can start a quiz by creating a set of questions, choosing from a multitude of question types, like <span class="lblue">Dry Questions</span>, <span class="lblue">A/V Questions</span>, and so on. The user also has the options of setting the marking scheme of questions. Once done, this quiz can be shared with all the users of <span class="lblue">Quizr</span> to attempt.
	</p> 


	<h3>The <span class="lblue">Team</span> Behind <span class="lblue">Quizr</span></h3>
<!-- 	<div class="teambehind fifteen columns"> -->
	<p>
		<ul class="team">
			<li class="columns seven">
				<h4>Abhishek <span class="lblue">Biswal</span></h4><h5>founder, lead developer</h5>
			</li>
			<!-- <div class="clear"></div> -->
			<li class="columns seven">
				<h4>Trijeet <span class="lblue">Mukhopadhyay</span></h4><h5>founder, lead designer</h5>
			</li>
			<div class="clear"></div>

			<li class="columns seven">
				<h4>Achal <span class="lblue">Varma</span></h4><h5>Founder</h5>
			</li>
			<!-- <div class="clear"></div> -->
			<li class="columns seven">
				<h4>Bharat <span class="lblue">Kashyap</span></h4><h5>Founder</h5>
			</li>
			<div class="clear"></div>
			<li class="columns seven">
				<h4>Akshay <span class="lblue">Dadhwal</span></h4><h5>Technical Officer</h5>
			</li>
			<div class="clear"></div>
		</ul>
	</p>
	<!-- </div> -->
</div>

<?php
	include('temp/footer.php');
?>