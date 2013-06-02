
<?php
echo "hi";
//session_start();

//require_once('config.inc.php');
//require_once('functions.inc.php');
//require_once('establish_db_user_connection.php');
$stage=1;
$cmpurl="URL";
$connection=1;
$i =  strcmp($_POST["httpurl"],$cmpurl);
echo $_FILES["file$stage"]["name"];
if(!$i)	{
if($connection==1){
	$temp = explode(".", $_FILES["file$stage"]["name"]);
	$extension = end($temp);

	$picid = $mysqli->real_escape_string(time()."_".$_SESSION['username'].".".$extension);
	$userid = $mysqli->real_escape_string($_SESSION['username']);
	$time = $mysqli->real_escape_string(date('d M Y H:i:s'));
	
	if(!isset($_POST['category']))
	{
		$category = "undefined";
	}
	else{
		$category = $_POST['category'];
	}


	$class = $mysqli->real_escape_string($category);
	$sql = "INSERT INTO pic_owner (picid, ownerid, time, class) VALUES ('". $picid ."', '". $userid ."', '". $time ."', '". $class ."' ) ";
}

if ($_FILES["file$stage"]["error"] > 0)
  {
//	echo" file$stage_error!";
  echo "Error: " . $_FILES["file$stage"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file$stage"]["name"] . "<br>";
  echo "Type: " . $_FILES["file$stage"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file$stage"]["size"] / 1024) . " kB<br>";
  echo "1withme";
  echo "Stored in: " . $_FILES["file$stage"]["tmp_name"];
  }


$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
$temp = explode(".", $_FILES["file$stage"]["name"]);
$extension = end($temp);
//echo "ect is";
//echo $extension;
//echo "this";
 if ((($_FILES["file$stage"]["type"] == "image/gif")
|| ($_FILES["file$stage"]["type"] == "image/jpeg")
|| ($_FILES["file$stage"]["type"] == "image/jpg")
|| ($_FILES["file$stage"]["type"] == "image/png"))
&& ($_FILES["file$stage"]["size"] < 200000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file$stage"]["error"] > 0)
    {
    echo "Error: " . $_FILES["file$stage"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file$stage"]["name"] . "<br>";
    echo "Type: " . $_FILES["file$stage"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file$stage"]["size"] / 1024) . " kB<br>";
	echo "2withme";
    echo "Stored in: " . $_FILES["file$stage"]["tmp_name"];
    }
  }
else
  {
  echo "Invalid file$stage";
  }

if ((($_FILES["file$stage"]["type"] == "image/gif")
|| ($_FILES["file$stage"]["type"] == "image/jpeg")
|| ($_FILES["file$stage"]["type"] == "image/jpg")
|| ($_FILES["file$stage"]["type"] == "image/png")
|| ($_FILES["file$stage"]["type"] == "image/GIF")
|| ($_FILES["file$stage"]["type"] == "image/JPEG")
|| ($_FILES["file$stage"]["type"] == "image/JPG")
|| ($_FILES["file$stage"]["type"] == "image/PNG"))
&& ($_FILES["file$stage"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file$stage"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file$stage"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file$stage"]["name"] . "<br>";
    echo "Type: " . $_FILES["file$stage"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file$stage"]["size"] / 1024) . " kB<br>";
    echo "Temp file$stage: " . $_FILES["file$stage"]["tmp_name"] . "<br>";

    if (file$stage_exists("upload/" .time()."_".$_SESSION['username'].".".$extension))
      {
      echo $_FILES["file$stage"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file$stage($_FILES["file$stage"]["tmp_name"],
      "upload/". time()."_".$_SESSION['username'].".".$extension);
      //	"upload" . "check");
	echo "Stored in: " . "upload/" . $_FILES["file$stage"]["name"];
	  $result = $mysqli->query($sql);
      }
	  
    }
  }
else
  {
  echo "Invalid file$stage";
  
  }
}
else	{

$url= $_POST["httpurl"];
if($url[0]=='h' && $url[1]=='t' && $url[2]=='t' && $url[3]=='p' && (($url[4]==':' && $url[5]=='/' && $url[6]=='/') || ($url[4]=='s' && $url[5]==':' && $url[6]=='/' && $url[7]=='/'))) {

if($connection==1){
$here = explode(".", $url);
$num = (count($here) - 1);
$extension = $here[$num];


        $picid = $mysqli->real_escape_string(time().":".$url);
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
        $sql = "INSERT INTO pic_owner (picid, ownerid, time, class,local) VALUES ('". $picid ."', '". $userid ."', '". $time ."', '". $class ."', '".$local."' ) ";
	if($result = $mysqli->query($sql)) echo "success";
	else echo "failed! pls try again";
}

}
else echo "invalid url PLs try again...";

}




?>
