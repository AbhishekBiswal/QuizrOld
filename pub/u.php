<?php
	
	$userId = $_GET['id'];

	/* Redirection */
	/*if($userId == "browse")
	{
		include('browse.php');
		exit();
	}*/
	if($userId == "search")
	{
		include('search.php');
		exit();
	}
	elseif($userId == "leaderboard")
	{
		include('leaderboard.php');
		exit();
	}

	session_start();
	include('fn/loggedin.php');

	if(!$userId)
	{
		include('404.php');
		exit();
	}

	include('db.php');
	$checkUser = $DBH->prepare("SELECT * FROM users WHERE username=?");
	$checkUser->execute(array($userId));

	if($checkUser->rowCount() == 0)
	{
		include('404.php');
		exit();
	}
	
	/*Load User Data:*/
	while($userData = $checkUser->fetch())
	{
		$userId = $userData['id'];
		$userfName = $userData['fullname'];
		$userName = $userData['username'];
		$usersName = $userData['fbusername'];
		$useroauthp = $userData['oauthp'];
		$useroauthid = $userData['oauthid'];
		$userBio = $userData['bio'];
		$userPoints = $userData['points'];
		$usertwusername = $userData['twusername'];
	}
	
	$pageName = "$userfName on Quizr";
	include('temp/header.php');

	// load quizzes:
	$loadQ = $DBH->prepare("SELECT * quizmeta WHERE user=?");
	$loadQ->execute(array($userId));
	while($row = $loadQ->fetch())
	{
		$title = $row['title'];
		$questions = $row['questions'];
	}


	/* Twitter Image */
	if($useroauthp == "twitter")
	{
		require_once("tw/twitteroauth.php"); //Path to twitteroauth library
 
	$twitteruser = $usertwusername;
	$notweets = 30;
	$consumerkey = "kYbSNE8R9ZwTbRCnZozQ";
	$consumersecret = "o5bAseJiUcQ3IsW5SPiXDl6WenPQ8YgYaunl4zLlg";
	$accesstoken = "240286080-d31MBLJYnvir6SnvrLIGXEo4W4H8whDErjjgtCgd";
	$accesstokensecret = "1nOxxLTfwm6f0m5C6ou7omFi1C4XvpPpCvIUf9GHE";
	  
	$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
	 
	/*$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);*/
	$tweets = $connection->get("https://api.twitter.com/1.1/users/show.json?screen_name=$twitteruser");
	}
	 
	//print_r($tweets);

	/* Tw Image END */

?>

<div class="det-head">
	<h2>
		<?php if($useroauthp == "facebook") { ?>
		<img src="http://graph.facebook.com/<?php echo $useroauthid; ?>/picture">
		<?php
			} elseif($useroauthp == "twitter") {
		?>
		<img src="<?php echo $tweets->name; ?>">
		<?php } ?>
		<span class="picheight"><?php echo $userfName; ?></span></h2>
	<h3><?php echo $userBio; ?></h3>
	<div class="info-boxes">
		<div class="info-box">
			<span class="one"><?php echo $userPoints; ?></span>
			<span class="two">points</span>
		</div>
	</div>
</div>

<?php include_once('fn/loadquiz.php'); ?>

<div class="u-page-box ten columns">

<div class="u-page-header">Quizzes:</div>
<ul class="u-page-list">
	<!-- <li><span class="grey">20 Questions</span> <a href="/">First Quiz :P</a></li> -->
	<?php
		loadQuizlist($userId,$DBH,1);
		
		quizList($fetch);
	?>
</ul>

<div class="u-page-header">Favourites:</div>
<ul class="u-page-list">
	<?php
		include_once('fn/loadquiz.php');
		function loadFavs($user,$DBH)
		{
			global $fetchfav;
			$fav = $DBH->prepare("SELECT * FROM liked WHERE user=?");
			$fav->execute(array($user));
			if($fav->rowCount() == 0)
			{
				echo '<p class="grayinfo">Nothing Here.</p>';
			}
			else
			{
				while($favdata = $fav->fetch())
				{
					$favqid = $favdata['quizid'];
					$fetchfav = $DBH->prepare("SELECT * FROM quizmeta WHERE id=?");
					$fetchfav->execute(array($favqid));
				}
				quizList($fetchfav);
			}
		}
		loadFavs($userId,$DBH);
	?>
</ul>

</div>

<?php
	include('temp/footer.php');
?>