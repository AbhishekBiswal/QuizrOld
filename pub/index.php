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

<script type="text/javascript">
	document.write('<div id="content">');
</script>

<div class="det-head"><h2>Welcome To <span class="lblue">Quizr</span></h2></div>
<div class="main homepage">
<div class="u-page-box columns nine content">
	<div class="intro-text">
		<h3>Quizr is a platform for sharing, creating and playing quizzes. Earn points by playing quizzes, and use them to promote your quizzes.</h3>
		<h4>We are currently in beta. Enter you email address below and we'll let you know when we open to public.</h4>
	</div>
</div>
<div class="columns six text-right float-right">
	<?php
	if(($key == "dadhujaisakoinahi") || ($key == "NC8C2G")) {
?>

	<div class="home-join"><center>
		<h2>JOIN</h2>
		<a href="/fb/fbauth.php" class="fb-btn">Facebook</a>
		<a href="/tw/twitter_login.php" class="twitter-btn">Twitter</a>
	</center></div>

<?php
	} else {
?>
		<div class="beta-reg">Status: Closed Beta</div>	
<?php } ?>
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

</div><!--main-->

<script type="text/javascript">
	document.write('</div>');
</script>

<?php
	include('temp/footer.php');
?>