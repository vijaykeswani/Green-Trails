<?php
$frob=$_GET['frob'];
$method="flickr.auth.getToken";
$api_key="4dc4ed74f5296f4cf295e6080d4ce4eb";
$apisec="f7a908b6a8d5cebc";
$unencrypted_api_sig=$apisec."api_key".$api_key."frob".$frob."method".$method;
$api_sig=MD5($unencrypted_api_sig);
//echo $frob;
//echo "<br>".$api_sig;
$url="http://api.flickr.com/services/rest/?method=flickr.auth.getToken&api_key=".$api_key."&frob=".$frob."&format=rest&api_sig=".$api_sig;
echo $url;
?>
