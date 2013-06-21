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
		Quizr is here to redefine how you've always thought about online quizzing - answering questions on Facebook pages has always been a pain, hasn't it?
		Quizr is an online platform where you can create quizzes, share them with your friends, and attempt other quizzes yourself. </p>

	<p>Holding an online cryptic hunt?  Interested in opening up a quizzing channel to post regular questions? <br> With timed questions, hints, leaderboards, and a systematic point distribution system, Quizr meets all these needs and more - which is exactly what we mean when we say, <span class="lblue">handcrafted for the modern quizzer</span>. 
	</p>




	<h1>The <span class="lblue">people </span></h1>
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
				<h4>Achal <span class="lblue">Varma</span></h4><h5>Founder, consultant</h5>
			</li>
			<!-- <div class="clear"></div> -->
			<li class="columns seven">
				<h4>Bharat <span class="lblue">Kashyap</span></h4><h5>Founder, UX Designer</h5>
			</li>
			<div class="clear"></div>
			<li class="columns seven">
				<h4>Akshay <span class="lblue">Dadhwal</span></h4><h5>Developer</h5>
			</li>
			<li class="columns seven">
				<h4>Siddharth <span class="lblue">Bhogra</span></h4><h5>Designer</h5>
			</li>
			<div class="clear"></div>
		</ul>
	</p>
	<!-- </div> -->
</div>

<?php
	include('temp/footer.php');
?>
