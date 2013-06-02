<html>
<head>
<link href="../../bootstrap.min.css" rel="stylesheet">
    <link href="../../default/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="../../css/font-awesome.min.css" rel="stylesheet">
    <link href="../../css/bootswatch.css" rel="stylesheet">
        <link href="../../css/images.css" rel="stylesheet">
</head>
<?php
/**
 * Copyright 2011 Facebook, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may
 * not use this file except in compliance with the License. You may obtain
 * a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */
session_start();
require '../src/facebook.php';

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '350219158397808',
  'secret' => '2231cf66c52a7f3d75d2f60ad374327f',
));

// Get User ID
$user = $facebook->getUser();
// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl();
} else {
  $loginUrl = $facebook->getLoginUrl(array('req_perms' => 'user_status,publish_stream,user_photos'));
}

// This call will always work since we are fetching public data.
$naitik = $facebook->api('/naitik');

?>
<!doctype html>
    <style>
      body {
        font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
      }
      h1 a {
        text-decoration: none;
        color: #3b5998;
      }
      h1 a:hover {
        text-decoration: underline;
      }
    </style>
  <body>

    <?php if ($user): ?>
      <a href="<?php echo $logoutUrl; ?>">Logout</a>
    <?php else: ?>
      <br><br><br><br><br><br><br><br><br><br><br><br><div align="center">
        <a href="<?php echo $loginUrl; ?>"><img src="../../images/facebook-login.png"/></a>
      </div>
    <?php endif ?>


    <?php if ($user): ?>
      <h3>You</h3>
      <img src="https://graph.facebook.com/<?php echo $user; ?>/picture">

      <h3>Your User Object (/me)</h3>
      <pre><?php print_r($user_profile); 
	$_SESSION['username']=$user_profile['username'];
	$username=$user_profile['username'];
	$_SESSION['name']=$user_profile['name'];
	$name=$user_profile['name'];
	$_SESSION['email']=$user_profile['email'];
	$email=$user_profile['email'];
	$_SESSION['logged_in']=true;
	print_r($_SESSION);
	include("../../variables.php");
	$conn=mysql_connect("localhost",$DBUSER,$DBPASS);
	mysql_select_db($DBNAME,$conn);
	$sql="select * from user";
	$r=mysql_query($sql);
	$flag=0;
	while($a=mysql_fetch_array($r))
	{
		if($a['username']==$username)
		{	$flag=1;break;
		}
	}
	if($flag==0)
	{
		$sql="insert into user(type,username,email,name) values('fb','$username','$email','$name')";
		mysql_query($sql);
	}
	// $status = $facebook->api('/me/feed', 'POST', array('message' => 'RHoK'));
        //var_dump($status);
	echo "<META http-equiv='refresh' content='0; URL=../../index.php'>";
	?></pre>
    <?php endif ?>
<?php
?>
  </body>
</html>
