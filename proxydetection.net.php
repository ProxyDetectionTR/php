<?php

$version	= "v1";
$key 		= "1111-1111-1111-1111-1111"; /* The API key here is for testing purposes, you enter your own API key */
$ipquery	= "8.8.8.8"; /* type the ip address you want to test here */
$delay		= "1";
$tls		= "1";

if($tls == 1){
	$tls	= "https";
} else {
	$tls 	= "http";
}

$url	= $tls."://api.proxydetection.net/?version=".$version."&host=".$_SERVER['SERVER_NAME']."&key=".$key."&ipquery=".$ipquery."&delay=".$delay;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

$json	= json_decode($result);

if($json->status == "succes"){
	echo "proxy detected";
} else {
	echo "no proxy detected";
}
  
?> 