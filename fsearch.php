<?php
 
$yql_base_url = "http://query.yahooapis.com/v1/public/yql";
$keyword="rachit";
$api_key="4dc4ed74f5296f4cf295e6080d4ce4eb";
$userid="85714260@N02";
$title="indiahikes";
//query for searching photo and getting related information to it
$yql_query = "select * from flickr.photos.info where api_key=$api_key and photo_id in (select id from flickr.photos.search where api_key='$api_key'and text='$keyword')";
//$yql_query='select * from flickr.photosets.getList where title="'.$title.'" and user_id="'.$userid.'"';
//generating url
$yql_query_url = $yql_base_url . "?q=" . urlencode($yql_query);
//getting the result output in json format
$yql_query_url .= "&format=json";
echo $yql_query_url; 
$session = curl_init($yql_query_url);
curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
$json = curl_exec($session);
$flickrObj = json_decode($json);
//foreach($flickObj->query->results->photoset as $photoset)	{
//echo $photoset->id;
//echo $photoset->id;
//}
foreach($flickrObj->query->results->photo as $photo) {
 
echo "<br/>";
echo "ID : ".$photo->id;
echo "<br/>";
echo "Title : ".$photo->title;
echo "<br/>";
echo "Description : ".$photo->description;
echo "<br/>";
echo "Uploaded Date : ".$photo->dateuploaded;
echo "<br/>";
echo "Owner : ".$photo->owner->realname;
echo "<br/>";
echo "Photo Taken On : ".$photo->dates->taken;
echo "<br/>";
echo "Link : ".$photo->urls->url->content ;
echo "<br/>";
//generate url for display photos of size medium
$url = $source = "http://farm".$photo->farm.".static.flickr.com/".$photo->server."/".$photo->id."_".$photo->secret."_m.jpg";
 
?>
<img src=<?php echo $url; ?>>
<?php
}
 
 
unset($_GET);


?>
