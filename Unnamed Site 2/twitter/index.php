<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Accion TT</title>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function() {
	//$('#desde').html("hola");
	initialize();
});
function initialize(){
	setTimeout(function(){window.location.reload(1);}, 2*60000+1000*(Math.random() *60*5 ));
}

</script>


</head>

<body>
<?php
require 'twitteroauth-master/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;

define('CONSUMER_KEY', 'uwBqgAJSmQrzsU220MusxydwJ'); // add your app consumer key between single quotes
define('CONSUMER_SECRET', 'vfJtcRmWxj4QTx7V6B0dPr1U3W4z9cQpKPT4ARWJQYgrGnR5ED'); // add your app consumer secret key between single quotes
define('OAUTH_CALLBACK', 'http://tinkeringdesigns.com/twitter/callback.php'); // your app callback URL


$link = mysqli_connect('localhost', 'tinker_admin', '4dm1n', 'tinker_db');


$q = "SELECT * FROM accion WHERE activo='1' ORDER BY id_accion DESC LIMIT 1";
$resul = mysqli_query($link,$q);
$tiene_accion=0;
while ($rowt = mysqli_fetch_row($resul)){
	$id_accion = $rowt[0];
	$tipo_accion = $rowt[1];
	$idtt = $rowt[2];
	$tweets = $rowt[3];
	$activo = $rowt[4];
	$id_segmento = $rowt[5];
	$tiene_accion++;
}


if($tiene_accion>0){
	//echo "<h1>TIENE accion</h1>";
}






if (!isset($_SESSION['access_token'])) {
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
	$_SESSION['oauth_token'] = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
	echo "<a href='".$url."' >LINK</a><br />"; 
	//echo $url;
} else {
	$access_token = $_SESSION['access_token'];
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
	$user = $connection->get("account/verify_credentials");
	echo "<h1>".$user->screen_name."</h1>";
	echo "<br />";
	//echo "<a href='post-tweet.php' >LINK</a>"; 
	
	$usuario=$user->screen_name;
	
	
	
	
	$q = "SELECT * FROM accion_cuenta WHERE cuenta='$usuario' AND id_accion='$id_accion' LIMIT 1";
	//echo $q;
	$resul = mysqli_query($link,$q);
	$cc=0;
	while ($rowt = mysqli_fetch_row($resul)){
		$id_accion_cuenta = $rowt[0];
		$cuenta = $rowt[2];
		$cc++;
	}
	if($cc==0){
		////////No se ha realizado la accion todavia
		//echo "<h3>No hay accion todavia</h3>";
		if($tiene_accion>0){
			if($tweets!="" || $id_segmento!=0){
				$q= "SELECT * FROM tweet_aleatorio WHERE texto LIKE '%$tweets%' AND id_segmento='$id_segmento' ORDER BY conteo ASC LIMIT 1";
				$resul = mysqli_query($link,$q);
				while ($rowt = mysqli_fetch_row($resul)){
					$id_tweet_aleatorio = $rowt[0];
					$texto = utf8_encode($rowt[1]);
				}
				$qt = "UPDATE `tweet_aleatorio` SET `conteo` = conteo+1 WHERE `tweet_aleatorio`.`id_tweet_aleatorio` = '$id_tweet_aleatorio';";
				$resul = mysqli_query($link,$qt);
				
				echo "<h2>".$texto."</h2>";
				
				$post = $connection->post('statuses/update', array('status' => $texto));
				print_r($post);
			}
			///////////////

			if($tipo_accion==1){
				$post_rt = $connection->post('statuses/retweet', array('id' => $idtt));
				echo "<h3>RT:$idrt</h3>";
				print_r($post_rt);
				
				$qr = "INSERT INTO `accion_cuenta` (`id_accion_cuenta`, `id_accion`, `cuenta`, `extra`) VALUES (NULL, '$id_accion', '$usuario', '');";
				$resull = mysqli_query($link,$qr);
			}
			if($tipo_accion==2){
				$post_rt = $connection->post('favorites/create', array('id' => $idtt));
				echo "<h3>FAV:$idrt</h3>";
				print_r($post_rt);
				$qr = "INSERT INTO `accion_cuenta` (`id_accion_cuenta`, `id_accion`, `cuenta`, `extra`) VALUES (NULL, '$id_accion', '$usuario', '');";
				$resull = mysqli_query($link,$qr);
			}
		}
	}else{
		////Ya ha realizado la acción, continuar con el tweet aleatorio
		if(rand(0,100)<=30){///solo el 10% de las veces
			$q= "SELECT * FROM tweet_aleatorio WHERE conteo='0' ORDER BY rand() LIMIT 1";
			$resul = mysqli_query($link,$q);
			while ($rowt = mysqli_fetch_row($resul)){
				$id_tweet_aleatorio = $rowt[0];
				$texto = utf8_encode($rowt[1]);
			}
			$qt = "UPDATE `tweet_aleatorio` SET `conteo` = conteo+1 WHERE `tweet_aleatorio`.`id_tweet_aleatorio` = '$id_tweet_aleatorio';";
			$resul = mysqli_query($link,$qt);
			echo "<h2>".$texto."</h2>";
			$post = $connection->post('statuses/update', array('status' => $texto));
			print_r($post);
		}else{
			echo "--solo el 20% de las veces--";
		}
	}
	
	

	//1011239262862348289
	//$idrt="1011239262862348289";
	if($idrt!=""){
		/// statuses/retweet
		/// favorites/create
		//$post_rt = $connection->post('statuses/retweet', array('id' => $idrt));
		
		//echo "<h3>RT:$idrt</h3>";
		//print_r($post_rt);
	}else{
		// posting tweet on user profile
		//$post = $connection->post('statuses/update', array('status' => $texto));
	
		// displaying response of $post object
		//print_r($post);
	}
	
	
}
?>
<br /><br /><br /><br /><br /><br /><br />
<a href="logout.php">LOGOUT</a>
</body>
</html>