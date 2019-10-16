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
	setTimeout(function(){window.location.reload(1);}, 5000);
}

</script>


</head>

<body>
<?php
require_once('twitter-api-php-master/TwitterAPIExchange.php');


$link = mysqli_connect('localhost', 'tinker_admin', '4dm1n', 'tinker_db');

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


	//supervicion_api
	$qt = "SELECT * FROM revisar WHERE revisada = '1' AND suspendia=0 AND supervicion_api=0 ORDER BY rand() LIMIT 1";
	//echo $qt;
	$resul = mysqli_query($link,$qt);
	while ($rowt = mysqli_fetch_row($resul)){
		$id_revisar = $rowt[0];
		$nombre=$rowt[1];
		$usuario=$rowt[2];
		$pass=$rowt[3];
		$mail=$rowt[4];
		$mail_pass=$rowt[5];
		
		$cuenta=$usuario;
	}
	
	if($usuario!=""){
	
	$qt = "UPDATE `revisar` SET `supervicion_api` = supervicion_api+1 WHERE `revisar`.`id_revisar` = '$id_revisar';";
	$resul = mysqli_query($link,$qt);
	
	
	//https://api.twitter.com/1.1/search/tweets.json

//https://api.twitter.com/1.1/statuses/user_timeline.json
//include_rts


//$usuario="jesusacosta271";

$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name='.$usuario;
$getfield .= '&count=200';
$getfield .= '&exclude_replies=false';
$getfield .= '&include_rts=true';

$requestMethod = 'GET';



echo "<h1>".$usuario."</h1>";

$twitter = new TwitterAPIExchange($settings);
$salida = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
	
	$json= (json_decode($salida));
	
	//echo $json;
	
	//echo print_r($json['search_metadata']);
	
	foreach ($json as $k => $v) {
   		//echo $k, ' : ', $v;
		//echo $k;
		//json_decode($v);
		foreach ($v as $kk => $vv) {
			
			if(is_array($vv)){
				//echo $kk;
			}else{
				//echo $kk, ' : ', $vv;
			}
		}
	}
	
	$conteo=0;
	
	$iter = new RecursiveIteratorIterator( new RecursiveArrayIterator(json_decode($salida,true)), RecursiveIteratorIterator::SELF_FIRST);
	
	foreach($iter as $key=>$value) { 
		
	   if(is_array($value)){ 
	   		//echo "$key:\n";
	   }else{ 
	   		//echo "-$key- => $value\n"; 
			if($key=="text"){
				if(strlen($value)>22){
					echo $value."<br />";
					
					$mini = substr($value,4,50);
					
					
					$qt = "SELECT texto FROM revision WHERE texto LIKE '%$mini%' LIMIT 1";
					//echo $qt;
					$resul = mysqli_query($link,$qt);
					$cc=0;
					while ($rowt = mysqli_fetch_row($resul)){
						//$id_revisar = $rowt[0];
						$cc++;
					}
					
					if($cc==0){
					$qt="INSERT INTO `revision` (`id_revision`, `texto`, `extra`, `posicion`, `id_revisar`) VALUES (NULL, '$value', '', '', '$id_revisar');";
					//echo $qt."<br />";
					$resul = mysqli_query($link,$qt);
					}
					
					$conteo++;
					
					
				}
			}
	   } 
		 
	}
	
	$qt = "UPDATE `revisar` SET `conteo` = $conteo WHERE `revisar`.`id_revisar` = '$id_revisar';";
	echo $qt;
	$resul = mysqli_query($link,$qt);
	
	}

?>
</body>
</html>