<?php

session_start();

require_once('config.inc.php');
require_once('functions.inc.php');
require_once('establish_db_user_connection.php');

	$url=$_POST["url"];
	$checkurl1=substr($url, 0, 22);
	$c1="http://www.youtube.com";
	  $checkurl2=substr($url, 0, 23);
        $c2="https://www/youtube.com";
	
	if((!(strcmp($checkurl1,$c1))) || (!(strcmp($checkurl2,$c2)))) {
	
	$n1=explode("?",$url);
	if($n1[1][0]=='v' && $n1[1][1]=='=') {
		$img2=explode("=",$n1[1]);
		$img=$img2[1];
	}
	else	{
		$n2=explode("&",$n1[1]);
		if($n2[1][0]=='v' && $n2[1][1]=='=') {
			$img2=explode("=",$n2[1]);
			$img=$img2[1];
		}
	
	}
	$img="http://img.youtube.com/vi/".$img."/0.jpg";
	//echo $img;
	
if($connection==1){

        $picid = $mysqli->real_escape_string(time().":".$img);
        $userid = $mysqli->real_escape_string($_SESSION['username']);
        $time = $mysqli->real_escape_string(date('d M Y H:i:s'));
        $local=0;
        if(!isset($_POST['category']))
        {
                $category = "undefined";
        }
        else{
                $category = $_POST['category'];
        }


        $class = $mysqli->real_escape_string($category);
        $sql = "INSERT INTO pics (picid, ownerid, time, class,local) VALUES ('". $picid ."', '". $userid ."', '". $time ."', '". $class ."', '".$local."' ) ";
        if($result = $mysqli->query($sql)) echo "success";
        else echo "failed! pls try again";
}
	}
	else echo "invalid url";

?>


