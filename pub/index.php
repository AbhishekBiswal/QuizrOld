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

<div class="det-head"><h2>Welcome to <span class="lblue">Quizr</span></h2></div>
<div class="main homepage">
<div class="u-page-box">
	
	<div class="quizr-dict">
		<h2>[<strong>kwiz</strong>-<strong>zer</strong>]</h2>
		<!-- <div class="pron">"qui-zer"</div> -->
		<div class="pron">noun</div>
		<div class="desc">An online quizzing platform that's just handcrafted for the modern quizzer. <br /><a href="http://quizr.me/about/" target="_blank">Here</a>'s how.</div>
	</div>

<br>

<div class="clear"></div>

<div class="video-box">
</div>

	<?php
		if($betaa == 1)
		{
	?>
		
		<div class="login-box">
			<h1>Join In:</h1>
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
<div class="intro-video">
	<div class="columns nine">
		<h1> Watch a video<h1>
<!-- <div class="hp-intro">
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
</div> -->

</div></div><!--main-->

<div class="clear"></div>

<script type="text/javascript">
	document.write('</div>');
</script>

<?php
	include('temp/footer.php');
?>