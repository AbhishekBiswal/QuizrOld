<link rel="script" type="text/javascript" href="/assets/js/main.js">

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
<div class="main">
<div class="u-page-box columns ten">
	<div class="intro-text">
		<h3>Hi! I am  <span class="lblue">Quizr</span>. Are you also a <span class="lblue">Quizr</span>?</h3>
		<h4>If you're wondering, Quizr is an online portal for inquisitive people to <a href="/create.php">create</a>, <a href="/create.php">share</a> and <a href="/browse.php">attempt</a> quizzes</h4>
	</div>
</div>

<div class="columns four text-right float-right">
	<?php
		if($key == "")
		{
	?>
	<div class="signin-box">
		<p>
			<span class="lblue">Quizr</span> is very social
			<br>
			To know <span class="lblue">Quizr</span>, login with any of the following
			<br>
		</p>
		<div class="login-btns">
			<!-- To replace with icons -->
			<a href="/fb/fbauth.php"><!-- <img src="/assets/img/icons/facebooksignin.png"> --><div class="button">f</div></a>
			<a href="/tw/signin.php"><!-- <img src="/assets/img/icons/twittersignin.png"></img> --><div class="button">t</div></a>
			<!-- Add Google login -->
			<a href="/tw/signin.php"><!-- <img src="/assets/img/icons/twittersignin.png"></img> --><div class="button">G</div></a>
		</div>
		<!-- Add fb like/comment button -->
	</div>
	<?php
		}
		else
		{
			echo "<br><br>Registration Closed - Beta";
		}
	?>
</div>

</div><!--main-->

<script type="text/javascript">
	document.write('</div>');
</script>

<?php
	include('temp/footer.php');
?>