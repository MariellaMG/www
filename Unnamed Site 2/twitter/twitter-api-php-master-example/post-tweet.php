<?php
session_start();
require '../twitteroauth-master/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'uwBqgAJSmQrzsU220MusxydwJ'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'vfJtcRmWxj4QTx7V6B0dPr1U3W4z9cQpKPT4ARWJQYgrGnR5ED'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', 'http://tinkeringdesigns.com/twitter/callback.php'); // your app callback URL

if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	echo "<a href='".$url."' >LINK</a>"; 
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	
	// getting basic user info
	$user = $connection->get("account/verify_credentials");
	
	// printing username on screen
	echo $user->screen_name;

	// posting tweet on user profile
	$post = $connection->post('statuses/update', array('status' => 'Hola gente! Es decir #HelloWorld'));

	// displaying response of $post object
	print_r($post);
}
