<?php
session_start();
require_once('../config.inc.php');
require_once('../functions.inc.php');
require_once('establish_db_user_connection2.php');

if($connection==1){
	$username = $mysqli->real_escape_string($_SESSION['username']);
	}


$pic=$_SESSION['image_id_rachit'];
?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head> 

<!--<body bgcolor="#000000" onbeforeunload="terminate('js/temp/readTags94201341254.js');">

<input type="hidden" id="hotspot" value="hotspot">

<script src="../js/jquery.min.js" type="text/javascript"></script>

<font color="#FFFFFF"><b>Total Tags: 8</b></font><br><br>

<img src="tagphoto.jpg"  style="width: 450px; height: 423px;">

<br><br>	

<input type="button" id="cmdSmall" value="Small" onClick="changeTagSize(1);">
<input type="button" id="cmdStandard" value="Standard" onClick="changeTagSize(2);">



<br><br>	

<input type="button" id="cmdSave" value="Save" onClick="savePhoto(1,'js/temp/readTags94201341254.js',save());">

</body>
-->
<?php 
 	$sql_1 = "SELECT * FROM pics where picid='".$pic."'";
        $result_1 = $mysqli->query($sql_1);
        $i=0;
//              print_r($result); echo "</br>";
                while($row_1 = mysqli_fetch_array($result_1, MYSQL_ASSOC))
                {
			if($row_1['local']==1)
			$local=1;
			else
			$local=0;
			echo $local;
                }
?>



<body>
<? echo "<script>alert('".$pic."');</script>"; ?>
<input type="hidden" id="hotspot" value="hotspot">
<img src="<?php 

if($local==1)
echo '../upload/'.$pic;
else
{
 $temp = explode("_", $_FILES["file"]["name"]);
        $extension = end($temp);

 echo $extension;
}


<p>Tags By other users</p>
<?php
  

	$sql = "SELECT * FROM photo_tags where tag_user<>'".$username."' AND tag_pic='".$_SESSION['image_id_rachit']."' ORDER BY upvotes ";
        $result = $mysqli->query($sql);
	$i=0;
//              print_r($result); echo "</br>";
		echo "<div id='donttouchme' ><ul>";
                while($row_inside = mysqli_fetch_array($result, MYSQL_ASSOC))
                {
			if($i==10){
			break;}
                	echo "<li>";      
			echo $row_inside['tagvalue'];
			
			//echo '<img style="" src="upvote.png"/>'.$row_inside['upvotes'].' <img src="downvote.png"/>'.$row_inside['downvotes'];
		//	echo $row_inside['upvotes'];
			echo "  up by ";
			echo $total = $row_inside['upvotes']-$row_inside['downvotes'];
			echo "<a style='text-decoration: none' href='upvote.php?tagid=".$row_inside['tagid']."'>    + ".$row_inside['upvotes'] ."</a>  <a style='text-decoration: none' href='downvote.php?tagid=".$row_inside['tagid']."'>-".$row_inside['downvotes'];
			echo "</a> by ".$row_inside['tag_user'];
			echo "</li>";
			
		}
		echo "</ul></div>";
?>

<br>
<input type="button" id="cmdSmall" value="Small" onClick="changeTagSize(1);">
<input type="button" id="cmdStandard" value="Standard" onClick="changeTagSize(2);">
<br><br>        

<input type="button" id="cmdSave" value="Save" onClick="savePhoto();">

</body>
<script src="tagging.js"></script>
<script src="tagphoto.js"></script>
</html>


