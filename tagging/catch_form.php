<?php

session_start();
require_once('../config.inc.php');
require_once('../functions.inc.php');
require_once('establish_db_user_connection2.php');

$pic=$_POST['imageid'];

$temp = explode(".",$pic);
//$myfile = $temp[0].".js";
$myfile = "a.txt";
//echo $myfile;
//if (!file_exists($myfile)) {
//unlink($myFile);//}
 

//touch($myfile);
//}




if($connection==1){
	$username = $mysqli->real_escape_string($_SESSION['username']);
	}
?>

<?php



$total= $_POST['totalTags'];



$sql="DELETE FROM photo_tags WHERE tag_pic='".$_SESSION['image_id_rachit']."' && tag_user='".$username."'";

$result = $mysqli->query($sql);

for($i=0; $i<$total; $i++ )
{
$input1="tagValue".$i;
$input2="tagX".$i;
$input3="tagY".$i;
$input4="tagSize".$i;


echo $tagvalue=$_POST[$input1];
echo $tagx=$_POST[$input2];
echo $tagy=$_POST[$input3];
echo $tag_pic=$_SESSION['image_id_rachit'];
echo $tag_user=$username;
echo "</br>"; 	
	
         	
	
	 $sql = "SELECT * FROM photo_tags where tag_pic = '".$tag_pic."'";
         $result = $mysqli->query($sql);
//		print_r($result); echo "</br>"; 
           //     while($row_inside = mysqli_fetch_array($result, MYSQL_ASSOC))
             //   {
               //         if(($tagvalue == $row_inside['tagvalue'])
		//	&& ($tagx == $row_inside['tagx'])
		//	&& ($tagy == $row_inside['tagy'])
		//	&& ($tag_pic == $row_inside['tag_pic'])  	
		//	&& ($tag_user == $row_inside['tag_user'])){}
		//	else{
				$sql2 = "INSERT INTO photo_tags (tagvalue,tagx, tagy, tag_pic, tag_user) VALUES ('". $tagvalue ."', '". $tagx ."', '". $tagy ."', '". $tag_pic ."','".$tag_user."' ) ";
				//echo $sql2;
				$result2 = $mysqli->query($sql2);

		//	}
                //}
		mysqli_free_result($result2);

}

$myFile = "tagphoto.js";
$fh = fopen($myFile, 'w') or die("can't open file");



//$fh = fopen($myFile, 'w') or die("can't open file");


$stringData = "var arrTagValue = new Array();
var arrTagX = new Array();
var arrTagY = new Array();
var arrTagSize = new Array();
var arrTagLock = new Array();
var totalTags = ".$_POST['totalTags'].";
";
fwrite($fh, $stringData);


for($i=0; $i<$total; $i++)
{

$a="tagX".$i;
$b="tagY".$i;
$c="tagSize".$i;
$d="tagValue".$i;


$stringData='arrTagValue['.$i.'] = "'.$_POST[$d].'";
arrTagX['.$i.'] = '.$_POST[$a].';
arrTagY['.$i.'] = '.$_POST[$b].';
arrTagSize['.$i.'] = '.$_POST[$c].';
arrTagLock['.$i.'] = false;
';
fwrite($fh, $stringData);
//echo $stringData;
}

$stringData='var newscripthead=document.createElement("script");
newscripthead.type="text/javascript";
newscripthead.src=imagetag;
document.getElementsByTagName("head")[0].appendChild(newscripthead);
';


fwrite($fh, $stringData);

fclose($fh);

header('Location: index.php');


?>
