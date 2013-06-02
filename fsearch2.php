<?php 
$keyword="rachit";
$api_key="4dc4ed74f5296f4cf295e6080d4ce4eb";
//$userid="85714260%40N02";
$title="indiahikes";
$email=urlencode("tvanicraath@rocketmail.com");



//getuserid
$yql_query_url="http://api.flickr.com/services/rest/?method=flickr.people.findByEmail&api_key=$api_key&find_email=$email&format=rest";
$xml = simplexml_load_file($yql_query_url);
//print_r($xml['user']['id']);
$userid=($xml->user['id'][0]);
//echo $yql_query_url;
	

//get photoset indiahikes
	$yql_query_url="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20flickr.photosets.getList%20where%20title%3D'".$title."'%20and%20user_id%3D'".$userid."'&diagnostics=false&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&format=json"; 
	$session = curl_init($yql_query_url);
//echo $yql_query_url;	
	curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
	
	$json = curl_exec($session);
	
	$flickrObj = json_decode($json);
	
	$indiahikes =  $flickrObj->query->results->photoset->id;

//	echo $indiahikes;

//get all photos 
	$yql_query_url="http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20flickr.photosets.getPhotos%20where%20photoset_id%3D%22$indiahikes%22&diagnostics=false&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&format=json"; 
	 $session = curl_init($yql_query_url);
//echo $yql_query_url;
        curl_setopt($session, CURLOPT_RETURNTRANSFER,true);

        $json = curl_exec($session);
        
        $flickrObj = json_decode($json);
	echo "<br>";
//	echo $flickrObj->query->results->photoset->photo->id;
	foreach($flickrObj->query->results->photoset->photo as $photo)	{
	echo $photo->id;
	$photourl = $source = "http://farm".$photo->farm.".static.flickr.com/".$photo->server."/".$photo->id."_".$photo->secret."_m.jpg";
	echo "<img src=".$photourl.">";
echo "<br>";
}		

unset($_GET);

?>
