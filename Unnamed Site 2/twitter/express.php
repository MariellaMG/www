<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	//$('#desde').html("hola");
	initialize();
});
function initialize(){
	setTimeout(function(){window.location.reload(1);}, 50000);
}

</script>

</head>

<body>


<?php
require_once('twitter-api-php-master/TwitterAPIExchange.php');



$link = mysqli_connect('localhost', 'tinker_admin', '4dm1n', 'tinker_db');



$settings = array(
    'oauth_access_token' => "61675569-iWpS2iL6jOPIjXcRwzUv1Xuf3U7hIQi7jebWCJUtj",
    'oauth_access_token_secret' => "3KQuWL7fRreB0Us8vDqxAWMEjnKQmJjgcHHCMzLxq1mra",
    'consumer_key' => "uwBqgAJSmQrzsU220MusxydwJ",
    'consumer_secret' => "vfJtcRmWxj4QTx7V6B0dPr1U3W4z9cQpKPT4ARWJQYgrGnR5ED"
);

/*
$url = 'https://api.twitter.com/1.1/followers/list.json';
$getfield = '?screen_name=SebastianCesarX';
$requestMethod = 'GET';
*/


	$qt = "SELECT * FROM busqueda_express WHERE extra='0' ";
	echo $qt;
	$resultt = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resultt)){
		$id_busqueda_express=$rowt[0];
		$busqueda=$rowt[1];
		$max_id_str=$rowt[2];
		$next_results=$rowt[5];
		echo "-------------".$busqueda."    ".$max_id_str."------".$id_busqueda_express."------";
	}
	
	$next_results = substr($next_results, 1);
	
	parse_str($next_results);
	
	echo "++++++++++-".$max_id."-++++++++";
	
	
	$qt= "UPDATE `busqueda_express` SET `conteo` = conteo+1 WHERE `busqueda_express`.`id_busqueda_express` = '$id_busqueda_express';";
	$resultt = mysqli_query($link,$qt);
	
	if($max_id==""){
		$max_id=0;
	}


//https://api.twitter.com/1.1/search/tweets.json
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q='.$busqueda;
$getfield .= '&count=100';
//$getfield .= '&result_type=recent';
$getfield .= '&result_type=recent';
$getfield .= '&max_id=$max_id_str';
//$getfield .= '&until=2018-05-01';


$requestMethod = 'GET';


$twitter = new TwitterAPIExchange($settings);
$salida = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
	
	$json= (json_decode($salida));
	
	//echo $json;
	
	//echo print_r($json['search_metadata']);
	
	
	$iter = new RecursiveIteratorIterator( new RecursiveArrayIterator(json_decode($salida,true)), RecursiveIteratorIterator::SELF_FIRST);

	foreach($iter as $key=>$value) { 
	   if(is_array($value))
		 { //echo "$key:\n"; 
		 }
	   else { 
	    //echo "-$key- => $value\n"; 
		 if($key=="text" || $key=="screen_name"){
			 if(strlen($value)>3){
			 	echo $value."\n <br />
";
				
				$value = utf8_decode($value);
				
				$qt="INSERT INTO `express_dato` (`id_express_dato`, `id_busqueda_express`, `dato`, `extra`) VALUES (NULL, '$id_busqueda_express', '$value', '');";
				$resultt = mysqli_query($link,$qt);
			 }
		 }
		 if($key=="next_results"){
			 $next_results=$value;
		 }
		  if($key=="max_id_str"){
			 $max_id_str=$value;
		 }
		 
		}
	}
	
	echo "max_id_str:".$max_id_str;
	
	echo "--------".$next_results."-----------";

	$qt= "UPDATE `busqueda_express` SET `max_id_str` = '$max_id_str' WHERE  `busqueda_express`.`id_busqueda_express` = '$id_busqueda_express'; ";
	$resultt = mysqli_query($link,$qt);
	
	$qt= "UPDATE `busqueda_express` SET `next_results` = '$next_results' WHERE  `busqueda_express`.`id_busqueda_express` = '$id_busqueda_express'; ";
	$resultt = mysqli_query($link,$qt);
	
	

?>
</body>
</html>