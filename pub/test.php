<?php
session_start();
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
 
/*$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);*/
$tweets = $connection->get("https://api.twitter.com/1.1/users/show.json?screen_name=$twitteruser");
 
//print_r($tweets);
echo $tweets->name;
?>