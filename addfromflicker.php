<?php 
$api_key="4dc4ed74f5296f4cf295e6080d4ce4eb";
//$userid="85714260%40N02";
$title="indiahikes";
$email=urlencode("tvanicraath@rocketmail.com");

$yql_query_url="http://api.flickr.com/services/rest/?method=flickr.people.findByEmail&api_key=$api_key&find_email=$email&format=rest";
$xml = simplexml_load_file($yql_query_url);
$userid=($xml->user['id'][0]);
//echo $userid;

//getuserid
//$yql_query_url="http://api.flickr.com/services/rest/?method=flickr.people.findByEmail&api_key=$api_key&find_email=$email&format=rest";
//echo $yql_query_url;
//$xml = simplexml_load_file($yql_query_url);
//print_r($xml['user']['id']);
//$userid=($xml->user['id'][0]);
//echo $userid;
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
//	echo $flickrObj->query->results->photoset->photo->id;

?>

<?php
//print_r($flickrObj);
//session_start();
//require_once('../config.inc.php');
//require_once('../functions.inc.php');
//require_once('../establish_db_user_connection.php');

//if($connection==1){
//      $username = $mysqli->real_escape_string($_SESSION['username']);
//      }
        
?>
<!DOCTYPE html>

<html lang="en">

<head>
        <link rel="canonical" href="http://osvaldas.info/examples/responsive-jquery-masonry-or-pinterest-style-layout">
        <link rel="icon" href="http://osvaldas.info/theme/img/favicon.ico" />
        <link rel="stylesheet" href="http://osvaldas.info/theme/css/reset.css" />
        <link rel="stylesheet" href="http://osvaldas.info/examples/main.css" />
        <style>
                body
                {
                        background: rgba(42,99,105,0.8) none;
			padding: 3.75em 1.875em; /* 60px 30px */
                }
                strong
                {
                        font-weight: 700;
                }


                h1
                {
                        font-size: 1.625em; /* 26px */
                        font-style: italic;
                        letter-spacing: -0.1em; /* 1px */
                        text-align: center;
                        margin-bottom: 1.875em; /* 30px */
                }
                        h1,
                        h1 a
                        {
                                color: #fff;
                                color: rgba( 255, 255, 255, .5 );
                        }
                                h1 a:hover
                                {
                                        color: #fff;
                                }

                #wrapper
                {
                        max-width: 60em; /* 960 px */
                        margin: 0 auto;
			margin-left: 22px;
                }
                        #list
                        {
                                width: 103.125%; /* 990px */
                                overflow: hidden;
                                margin-left: -1.562%; /* 15px */
                               margin-bottom: -1.875em; /* 30px */
                        }
                                .item
                                {
                                        width: 30.303%; /* 300px */
                                        float: left;
                                        margin: 0 1.515% 1.875em; /* 15px 30px */
                                }

                @media only screen and ( max-width: 40em ) /* 640px */
                {
                        .item
                        {
                                width: 46.876%; /* 305px */
                                margin-bottom: 0.938em;/* 15px */
                        }
                }

                @media only screen and ( max-width: 20em ) /* 320px */
                {
                        #list
                        {
                                width: 100%;
                                margin-left: 0;
                        }
                                .item
                                {
                                        width: 100%;
                                        margin-left: 0;
                                        margin-right: 0;
                                }
                }
        </style>
</head>

<body>


<h1>
<?php
if($_GET['stage']==1) echo "before";
else if ($_GET['stage']==2) echo "during";
else echo "after";
?>
</h1>






<div id="wrapper">

        <?php

		echo '<div><font style="color:#000000"> &nbsp;&nbsp;&nbsp;<h2></h2><div id="list">';

foreach($flickrObj->query->results->photoset->photo as $photo)

{
//      echo $photo->id;
        $photourl = $source = "http://farm".$photo->farm.".static.flickr.com/".$photo->server."/".$photo->id."_".$photo->secret."_m.jpg";
//      echo "<img src=".$photourl.">";
//echo "<br>";


				$stage=$_GET['stage'];
                                echo  '<div class="item">
                                      <a href="addfromflickrwithurl.php?stage='.$stage.'&q='.$photourl.'"><img src="'.$photourl.'" alt="Photo" width="250"/></a>
                               </div>';

                        }
		echo '</div></font></div>';
        ?>

</div>

<script src="http://osvaldas.info/theme/js/jquery.js"></script>
<script src="http://osvaldas.info/examples/responsive-jquery-masonry-or-pinterest-style-layout/masonry.js"></script>
<script>
        $( function()
        {
            var columns    = 3,
                setColumns = function() { columns = $( window ).width() > 640 ? 3 : $( window ).width() > 320 ? 2 : 1; };

            setColumns();
            $( window ).resize( setColumns );

            $( '#list' ).masonry(
            {
                itemSelector: '.item'
   });
        });
</script>


</body>
</html>
                                                                        



<?

/*
	foreach($flickrObj->query->results->photoset->photo as $photo)	

{
//	echo $photo->id;
	$photourl = $source = "http://farm".$photo->farm.".static.flickr.com/".$photo->server."/".$photo->id."_".$photo->secret."_m.jpg";
//	echo "<img src=".$photourl.">";
//echo "<br>";



}		

unset($_GET);
*/
?>
