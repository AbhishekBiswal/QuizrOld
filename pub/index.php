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

<div class="det-head"><h2>Welcome To Quizr</h2></div>
<div class="main">
<div class="u-page-box columns nine">
	<div class="intro-text"><h3>Quizr is a quizzing platform for smart people to make and play online quizzes.</h3></div>
</div>

<div class="columns six float-right">
	<?php
		if($key == "")
		{
	?>
	<div class="signin-box">
		<a href="/fb/fbauth.php"><img src="/assets/img/icons/facebooksignin.png"></a>
		<a href="/tw/signin.php"><img src="/assets/img/icons/twittersignin.png"></img></a>
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

<?php
	include('temp/footer.php');
?>