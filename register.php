<?php
session_start();
require_once('functions.inc.php');

if(isset($_SESSION['logged_in'])  == true) {
	if($_SESSION['logged_in'] == true){
	redirect('index.php');
	}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>Login Page</title>
	
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" type="text/css" href="loginstyle.css" />
</head>

<body>

	<form id="login-form" action="register.inc.php" method="post">
		<fieldset>
		<p> Create Username and Password <hr><br></p>	
			<label for="login">Username</label>
			<input type="text" id="username" name="username"/>
			<div class="clear"></div>
			
			<label for="password">Password</label>
			<input type="password" id="password" name="password"/>
			<div class="clear"></div>
			
			<label for="login">Name</label>
                        <input type="text" id="name" name="name"/>
                        <div class="clear"></div>
			
			<br />
			
			<input type="submit" style="margin: -22px 0 0 357px;" class="button" name="commit" value="Register"/>
			
		</fieldset>
	</form>
	
</body>

</html>
