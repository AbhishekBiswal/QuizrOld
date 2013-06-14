<?php
	function loggedin()
	{
		global $loggedin;
		global $curUser;
		$loggedin = 0;
		if(isset($_SESSION['qp']))
		{
			$loggedin = 1;
			$curUser = $_SESSION['qp'];
		}
		if($loggedin == 1)
		{
			if((!isset($_SESSION['qu'])) || ($_SESSION['qu'] == NULL))
			{
				header('Location:/username.php');
				exit();
			}
		}
	}
	loggedin();

	function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
	  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
	  return $connection;
	}
?>