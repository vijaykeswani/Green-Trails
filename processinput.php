
<?php

session_start();

require_once('config.inc.php');
require_once('functions.inc.php');
require_once('establish_db_user_connection.php');

//echo "<script>alert('".$_SESSION['lat']."')</script>";

if($_POST['new_category']=='1') {
$_SESSION['time']=time();
}
$mytime=$_SESSION['time'];

$cmpurl="URL";
$i =  strcmp($_POST["httpurl"],$cmpurl);
if(!$i)	{
if($connection==1){
	$temp = explode(".", $_FILES["file"]["name"]);
	$extension = end($temp);

//print_r($_FILES);
	$picid = $mysqli->real_escape_string($mytime."_".$_POST['new_category']."_".$_SESSION['username'].".".$extension);
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
	$sql = "INSERT INTO pics (`picid`, `ownerid`, `time`, `class`,`local`, `lat`, `long`) VALUES ('". $picid ."', '". $userid ."', '". $time ."', '". $class ."','1','".$_SESSION['lat']."', '".$_SESSION['long']."' ) ";
//echo "<script>alert('".$sql."')</script>";
//echo $sql;
}

if ($_FILES["file"]["error"] > 0)
  {
//	echo" file_error!";
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  //echo "Type: " . $_FILES["file"]["type"] . "<br>";
  //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  //echo "1withme";
  //echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }


$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
//echo "ect is";
//echo $extension;
//echo "this";
 if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    //echo "Type: " . $_FILES["file"]["type"] . "<br>";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	//echo "2withme";
    //echo "Stored in: " . $_FILES["file"]["tmp_name"];
    }
  }
else
  {
  echo "Invalid file";
  }

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/GIF")
|| ($_FILES["file"]["type"] == "image/JPEG")
|| ($_FILES["file"]["type"] == "image/JPG")
|| ($_FILES["file"]["type"] == "image/PNG"))
&& ($_FILES["file"]["size"] < 2000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
//    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  //  echo "Type: " . $_FILES["file"]["type"] . "<br>";
   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
   // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("upload/" .$mytime."_".$_POST['new_category']."_".$_SESSION['username'].".".$extension))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/". $mytime."_".$_POST['new_category']."_".$_SESSION['username'].".".$extension);
      //	"upload" . "check");
//	echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	  $result = $mysqli->query($sql);
  				if($_POST['new_category']=='1') header('Location: uploadstep2.php#upload');
		else if($_POST['new_category']=='2') header('Location: uploadstep3.php#upload');
		else header('Location: index.php');
	print_r($_POST);
    }
	  
    }
  }
else
  {
  echo "Invalid file";
  
  }
}
else	{

$url= $_POST["httpurl"];
if($url[0]=='h' && $url[1]=='t' && $url[2]=='t' && $url[3]=='p' && (($url[4]==':' && $url[5]=='/' && $url[6]=='/') || ($url[4]=='s' && $url[5]==':' && $url[6]=='/' && $url[7]=='/'))) {

if($connection==1){
$here = explode(".", $url);
$num = (count($here) - 1);
$extension = $here[$num];


        $picid = $mysqli->real_escape_string($mytime.":".$_POST['new_category'].":".$url);
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
        $sql = "INSERT INTO pics (`picid`, `ownerid`, `time`, `class`, `local`, `lat`, `long`) VALUES ('". $picid ."', '". $userid ."', '". $time ."', '". $class ."', '".$local."', '".$_SESSION['lat']."', '".$_SESSION['long']."' ) ";
	if($result = $mysqli->query($sql)) {
		//echo "success";
				if($_POST['new_category']=='1') header('Location: uploadstep2.php#upload');
		else if($_POST['new_category']=='2') header('Location: uploadstep3.php#upload');
		else header('Location: index.php');
	}
	else echo "failed! pls try again";
}

}
else echo "invalid url PLs try again...";

}



exec("chmod 777 upload/*");
?>
