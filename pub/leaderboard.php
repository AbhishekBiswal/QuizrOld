<?php
	/* Leaderboard - Sort by points - top 20 users */
	include('fn/loggedin.php');
	include_once('db.php');

	$pageName = "Top 20 Quizzers";
	include('temp/header.php');

	/* Twitter Fetch Image */

	require_once("tw/twitteroauth.php"); //Path to twitteroauth library
 
	$twitteruser = "Abhishek_Biswal";
	$notweets = 30;
	$consumerkey = "kYbSNE8R9ZwTbRCnZozQ";
	$consumersecret = "o5bAseJiUcQ3IsW5SPiXDl6WenPQ8YgYaunl4zLlg";
	$accesstoken = "240286080-d31MBLJYnvir6SnvrLIGXEo4W4H8whDErjjgtCgd";
	$accesstokensecret = "1nOxxLTfwm6f0m5C6ou7omFi1C4XvpPpCvIUf9GHE";
	 
	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
	  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
	  return $connection;
	}
	  
	$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
	 
	//print_r($tweets);

	/* Twitter Fetch Image END */

?>

<div class="det-head">
	<h2>Top 20 Quizzers</h2>
</div>

<div class="content">

		<table class="leaderb">
		<tbody>
			<tr>
				<th width="10%"></th>
				<th width="50%">User</th>
				<th width="40%">Points</th>
			</tr>
<?php
	$top = $DBH->prepare("SELECT * FROM users ORDER BY points DESC LIMIT 20");
	$top->execute();
	while($row = $top->fetch())
	{

		if($row['oauthp'] == "twitter")
		{
			$twitteruser = $row['twusername'];
			$tweets = $connection->get("https://api.twitter.com/1.1/users/show.json?screen_name=$twitteruser");
		}
?>

			<tr>
				<td width="10%"><center>
					<?php if($row['oauthp'] == "facebook") { ?>
					<img src="http://graph.facebook.com/<?php echo $row['fbusername']; ?>/picture">
					<?php } elseif($row['oauthp'] == "twitter") { ?>
					<img src="<?php echo $tweets->profile_image_url; ?>">
					<?php } ?>
				</center></td>
				<td width="50%"><a href="/<?php echo $row['username']; ?>/"><?php echo $row['fullname']; ?></a></td>
				<td width="40%"><?php echo $row['points']; ?></td>
			</tr>

		
<?php
	}
?>
		</tbody>
		</table>

</div><!--content-->

<?php
	include('temp/footer.php');
?>