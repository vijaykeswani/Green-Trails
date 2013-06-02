<?php
session_start();
require_once('../config.inc.php');
require_once('../functions.inc.php');
require_once('establish_db_user_connection2.php');

if($connection==1){
	$username = $mysqli->real_escape_string($_SESSION['username']);
	}
$tagid= $_GET['tagid'];

$sql="update photo_tags set downvotes = downvotes + 1 where tagid='".$tagid."'";
$result= $mysqli->query($sql);

echo $sql;
header('Location: index.php');

?>
