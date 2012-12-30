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
	$betaa = 0;
	if(($key == "dadhujaisakoinahi") || ($key == "NC8C2G"))
	{
		$betaa = 1;
	}
?>

<script type="text/javascript">
	document.write('<div id="content">');
</script>

<div class="det-head"><h2>Welcome To <span class="lblue">Quizr</span></h2></div>
<div class="main homepage">
<div class="u-page-box content">
	
	<div class="quizr-dict">
		<h2>"quiz-zer"</h2>
		<!-- <div class="pron">"qui-zer"</div> -->
		<div class="pron">noun</div>
		<div class="desc">An online quizzing platform that takes the Google out of online quizzing - handcrafted for the modern quizzer.</div>
	</div>

<br>

<div class="clear"></div>

	<?php
		if($betaa == 1)
		{
	?>
		<div class="login-box">
			<h2>Join In:</h2>
			<div class="columns eight">
				<a href="/fb/fbauth.php" class="login-btn login-fb float-right">Facebook</a>
			</div>
			<div class="columns eight">
				<a href="/tw/twitter_login.php" class="login-btn login-twitter float-left">Twitter</a>
			</div>
		</div>
		<div class="clear"></div>
	<?php
		}
		else
		{

	?>
		<div class="beta-email"><center>
			<form class="ajax" action="/ajax/beta.php">
				<p class="submitinfo"></p>
				<input type="text" name="email" placeholder="Email Address"><br>
				<input type="submit" class="btn btn-blue" value="Request Invite">
			</form>
		</center></div>
	<?php
		}
	?>

<div class="hp-intro">
	<div class="columns nine"><img class="home" src="/assets/hp/play.png" ></div>
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

</div></div><!--main-->

<div class="clear"></div>

<script type="text/javascript">
	document.write('</div>');
</script>

<?php
	include('temp/footer.php');
?>