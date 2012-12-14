<?php
	session_start();
	include('fn/loggedin.php');
	if($loggedin == 1)
	{
		header('Location:/dash.php');
		exit();
	}
	$pageName = "Home";
	include('temp/header.php');
	@$key = $_GET['beta_key'];
?>

<div class="det-head"><h2>Welcome To <span class="lblue">Quizr</span></h2></div>
<div class="main homepage">
<div class="u-page-box columns nine content">
	<div class="intro-text">
		<h3>Quizr is a platform for sharing, creating and playing quizzes. Earn points by playing quizzes, and use them to promote your quizzes.</h3>
		<h4>We are currently in beta. Enter you email address below and we'll let you know when we open to public.</h4>
	</div>
</div>
<div class="columns six text-right float-right">
	<div class="beta-reg">Status: Closed Beta</div>
</div>
<br>

<div class="clear"></div>

<div class="beta-email"><center>
	<form class="ajax" action="/ajax/beta.php">
		<p class="submitinfo"></p>
		<input type="text" name="email" placeholder="Email Address"><br>
		<input type="submit" class="btn" value="Submit">
	</form>
</center></div>

<div class="hp-intro">
	<div class="columns nine"><img class="home" src="/assets/hp/play.png"></div>
	<div class="columns six">
		<div class="home-text" style="line-height: 155px;">Play.</div>
	</div>
	<div class="clear"></div><br>

	<div class="columns six">
		<div class="home-text" style="line-height: 403px;">Create.</div>
	</div>
	<div class="columns nine"><img class="home" src="/assets/hp/create.png"></div>
	<div class="clear"></div>
</div>

</div><!--main-->

<!--aks-->

<?php
	include('temp/footer.php');
?>