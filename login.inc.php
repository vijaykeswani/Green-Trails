<?php



session_start();
require_once('config.inc.php');
require_once('functions.inc.php');


if(isset($_SESSION['logged_in'])  == true) {
	if($_SESSION['logged_in'] == true){
	redirect('index.php');
	}
	else 
	{
		redirect('login.php');
	}
} else{
	
	if ((!isset($_POST['username'])) || (!isset($_POST['password']))) {
			redirect('login.php');
	}
		

	$mysqli = new mysqli(DB_HOSTNAME_USER, DB_USERNAME_USER, DB_PASSWORD_USER, DB_DATABASE_USER);

	if (mysqli_connect_errno()) {
			printf("Unable to connect to database: %s",mysqli_connect_error);
		exit();
	}

	$username = $mysqli->real_escape_string($_POST['username']);
	$password = $mysqli->real_escape_string($_POST['password']);
	
	$sql = "SELECT * FROM users WHERE username = '". $username . "' AND password = '" . MD5($password) . "'";

	$result = $mysqli->query($sql);


	if(is_object($result) && $result->num_rows == 1) {
		$row=$result->fetch_object();
		$_SESSION['logged_in'] = true;
		$_SESSION['username'] = $username;
		if(isset($_POST['remember_me'])){
			redirect('cook.php');
		}
		else{
			redirect('index.php');
		}
	
	} else  {

			redirect('login.php');
		
	}
	
}

?>

<html>
<body>
hello

</body>
</html>
