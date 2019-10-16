<?php
require_once('twitter-api-php-master/TwitterAPIExchange.php');



$settings = array(
    'oauth_access_token' => "61675569-n4mhhQ6lMytnJJE4mnbHV9xClRq3fAFavTLa0Idve",
    'oauth_access_token_secret' => "MNTB01tUsDJ7wsrc5DdXg5nsx6g4IJkVhPYa8w7umeyad",
    'consumer_key' => "uwBqgAJSmQrzsU220MusxydwJ",
    'consumer_secret' => "vfJtcRmWxj4QTx7V6B0dPr1U3W4z9cQpKPT4ARWJQYgrGnR5ED"
);
/*
$url = 'https://api.twitter.com/1.1/followers/list.json';
$getfield = '?screen_name=SebastianCesarX';
$requestMethod = 'GET';
*/

//https://api.twitter.com/1.1/search/tweets.json
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=@Ale_BarralesM';
$getfield .= '&count=100';
$getfield .= '&result_type=recent';

$requestMethod = 'POST';


$twitter = new TwitterAPIExchange($settings);

$status = $twitter->post(
    "statuses/update", [
        "status" => "Thank you @nedavayruby, now I know how to authenticate users with Twitter because of this tutorial https://goo.gl/N2Znbb"
    ]
);



?>