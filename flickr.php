<?php

//$frob=$_GET['frob'];
//echo $frob;
//echo "hi"
$apikey="4dc4ed74f5296f4cf295e6080d4ce4eb";
$apisec="f7a908b6a8d5cebc";
$method = "flickr.auth.getToken";
$sharedsecret=$apisec."api_key".$apikey."perms"."read";
$api_sig=MD5($sharedsecret);
$url="http://flickr.com/services/auth/?api_key=4dc4ed74f5296f4cf295e6080d4ce4eb&perms=read&api_sig=".$api_sig;
echo $url;
?>
