
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<br><br>
    <p class="lead"><h1>Percentage Rewards Earned</h1></p>
    <div class="row">
      <div class="progress well span8">
	<?php 
		session_start();
		include("variables.php");
		$username=$_SESSION['username'];
		$conn=mysql_connect("localhost",$DBUSER,$DBPASS);
		mysql_select_db($DBNAME,$conn);
		$q="select * from user where username='$username'";
		$r=mysql_query($q);
		$a=mysql_fetch_array($r);
		$done=$a['rewards'];
		$notdone=100-$done;
	?>
        <div class="bar bar-success" style="width: <?php echo $done; ?>%;"><?php echo $done; ?></div>
        <div class="bar bar-warning" style="width: <?php echo $notdone; ?>%;"><?php echo $notdone; ?></div>
      </div>
    </div>

~                                                                                                                                                                       
~                                                                                                                                                                       
~              
