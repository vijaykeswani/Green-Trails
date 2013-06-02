
<?php

session_start();

require_once('config.inc.php');
require_once('functions.inc.php');
require_once('establish_db_user_connection.php');
$_SESSION['time']=time();
$timemy=$_SESSION['time'];
for($stage=1;$stage<=1;$stage++)	{

$cmpurl="URL";
$i =  strcmp($_POST["httpurl"],$cmpurl);
if(!$i)	{
if($connection==1){
	$newf="file";
	echo $newf;
	$temp = explode(".", $_FILES[$newf]["name"]);
	$extension = end($temp);
print_r($_FILES);	
$picid = $mysqli->real_escape_string($timemy."_1_".$_SESSION['username'].".".$extension);
	$userid = $mysqli->real_escape_string($_SESSION['username']);
	$time = $mysqli->real_escape_string(date($timemy));
	
	if(!isset($_POST['category']))
	{
		$category = "undefined";
	}
	else{
		$category = $_POST['category'];
	}


	$class = $mysqli->real_escape_string($category);
	$sql = "INSERT INTO pic_owner (picid, ownerid, time, class,local) VALUES ('". $picid ."', '". $userid ."', '". $time ."', '". $class ."','1' ) ";
}

if ($_FILES[$newf]["error"] > 0)
  {
//	echo" file_error!";
  echo "Error: " . $_FILES[$newf]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES[$newf]["name"] . "<br>";
  echo "Type: " . $_FILES[$newf]["type"] . "<br>";
  echo "Size: " . ($_FILES[$newf]["size"] / 1024) . " kB<br>";
  echo "1withme";
  echo "Stored in: " . $_FILES[$newf]["tmp_name"];
  }


$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
$temp = explode(".", $_FILES[$newf]["name"]);
$extension = end($temp);
//echo "ect is";
//echo $extension;
//echo "this";
 if ((($_FILES[$newf]["type"] == "image/gif")
|| ($_FILES[$newf]["type"] == "image/jpeg")
|| ($_FILES[$newf]["type"] == "image/jpg")
|| ($_FILES[$newf]["type"] == "image/png"))
&& ($_FILES[$newf]["size"] < 200000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES[$newf]["error"] > 0)
    {
    echo "Error: " . $_FILES[$newf]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES[$newf]["name"] . "<br>";
    echo "Type: " . $_FILES[$newf]["type"] . "<br>";
    echo "Size: " . ($_FILES[$newf]["size"] / 1024) . " kB<br>";
	echo "2withme";
    echo "Stored in: " . $_FILES[$newf]["tmp_name"];
    }
  }
else
  {
  echo "Invalid file";
  }

if ((($_FILES[$newf]["type"] == "image/gif")
|| ($_FILES[$newf]["type"] == "image/jpeg")
|| ($_FILES[$newf]["type"] == "image/jpg")
|| ($_FILES[$newf]["type"] == "image/png")
|| ($_FILES[$newf]["type"] == "image/GIF")
|| ($_FILES[$newf]["type"] == "image/JPEG")
|| ($_FILES[$newf]["type"] == "image/JPG")
|| ($_FILES[$newf]["type"] == "image/PNG"))
&& ($_FILES[$newf]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES[$newf]["error"] > 0)
    {
    echo "Return Code: " . $_FILES[$newf]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES[$newf]["name"] . "<br>";
    echo "Type: " . $_FILES[$newf]["type"] . "<br>";
    echo "Size: " . ($_FILES[$newf]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES[$newf]["tmp_name"] . "<br>";

    if (file_exists("upload/" .$time."_1_".$_SESSION['username'].".".$extension))
      {
      echo $_FILES[$newf]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES[$newf]["tmp_name"],
      "upload/". $time."_1_".$_SESSION['username'].".".$extension);
      //	"upload" . "check");
	echo "Stored in: " . "upload/" . $_FILES[$newf]["name"];
	  $result = $mysqli->query($sql);
      }
	  
    }
  }
else
  {
  echo "Invalid file";
  
  }
}
else	{
$newu="httpurl".$stage;
$url= $_POST[$newu];
if($url[0]=='h' && $url[1]=='t' && $url[2]=='t' && $url[3]=='p' && (($url[4]==':' && $url[5]=='/' && $url[6]=='/') || ($url[4]=='s' && $url[5]==':' && $url[6]=='/' && $url[7]=='/'))) {

if($connection==1){
$here = explode(".", $url);
$num = (count($here) - 1);
$extension = $here[$num];


        $picid = $mysqli->real_escape_string($timemy._1_":".$url);
        $userid = $mysqli->real_escape_string($_SESSION['username']);
        $time = $mysqli->real_escape_string(date($timemy));
	$local=0;
        if(!isset($_POST['category']))
        {
                $category = "undefined";
        }
        else{
                $category = $_POST['category'];
        }


        $class = $mysqli->real_escape_string($category);
        $sql = "INSERT INTO pic_owner (picid, ownerid, time, class,local) VALUES ('". $picid ."', '". $userid ."', '". $time ."', '". $class ."', '".$local."' ) ";
	if($result = $mysqli->query($sql)) echo "success";
	else echo "failed! pls try again";
}

}
else echo "invalid url PLs try again...";

}


}
exec("chmod 777 upload/*");
?>
