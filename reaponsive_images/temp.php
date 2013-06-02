<?php
session_start();
require_once('../config.inc.php');
require_once('../functions.inc.php');
require_once('../establish_db_user_connection.php');

//if($connection==1){
//	$username = $mysqli->real_escape_string($_SESSION['username']);
//	}
	



?>
<!DOCTYPE html>

<html lang="en">

<head>
	<link rel="canonical" href="http://osvaldas.info/examples/responsive-jquery-masonry-or-pinterest-style-layout">
	<link rel="icon" href="http://osvaldas.info/theme/img/favicon.ico" />
	<link rel="stylesheet" href="http://osvaldas.info/theme/css/reset.css" />
	<link rel="stylesheet" href="http://osvaldas.info/examples/main.css" />
	<link rel="stylesheet" href="thumbnailviewer.css" />
	<script src="thumbnailviewer.js" type="text/javascript"></script>

		
	<!--[if lt IE 9]>
	<script src="/theme/js/html5.js"></script>
	<script src="/theme/js/ie9.js"></script>
	<![endif]-->
	<style>
		body
		{
			background-color: #545e5d;
			padding: 3.75em 1.875em; /* 60px 30px */
		}
		strong
		{
			font-weight: 700;
		}
		h1
		{
			font-size: 1.625em; /* 26px */
			font-style: italic;
			letter-spacing: -0.1em; /* 1px */
			text-align: center;
			margin-bottom: 1.875em; /* 30px */
		}
			h1,
			h1 a
			{
				color: #fff;
				color: rgba( 255, 255, 255, .5 );
			}
				h1 a:hover
				{
					color: #fff;
				}

		#wrapper
		{
			max-width: 60em; /* 960 px */
			margin: 0 auto;
		}
			#list
			{
				width: 103.125%; /* 990px */
				overflow: hidden;
				margin-left: -1.562%; /* 15px */
				margin-bottom: -1.875em; /* 30px */
			}
				.item
				{
					width: 30.303%; /* 300px */
					background-color: #fff;
					background-color: rgba( 255, 255, 255, .5 );
					float: left;
					margin: 0 1.515% 1.875em; /* 15px 30px */ 
				}

		@media only screen and ( max-width: 40em ) /* 640px */
		{
			.item
			{
				width: 46.876%; /* 305px */
				margin-bottom: 0.938em; /* 15px */
			}
		}

		@media only screen and ( max-width: 20em ) /* 320px */
		{
			#list
			{
				width: 100%;
				margin-left: 0;
			}
				.item
				{
					width: 100%;
					margin-left: 0;
					margin-right: 0;
				}
		}
	</style>
</head>

<body>




<!--
	AD
-->



<p><a href="http://img184.imageshack.us/img184/1159/castleyi6.gif" rel="thumbnail" title="This is beautiful castle for sale!">Castle</a></p>

<p><a href="http://img201.imageshack.us/img201/6923/countryxb6.gif" rel="thumbnail"><img src="thumbnail.gif" style="width: 50px; height: 50px" /></a></p>

<div id="wrapper">
	<div id="list">
		<div class="item" style="height: 12em;"></div>
		<div class="item"><img src="../upload/rachit1365503907image08.jpg" width="200"></div>
		 <div class="item"><img src="../upload/rachit1365504771youtube.jpgi"  width="200"></div>
		 <div class="item"><img src="../upload/rachit1365504789image10.png" width="200"></div>
		 <div class="item"><img src="../upload/rachit1365504801image15.png" width="200"></div>
		 <div class="item"><img src="../upload/rachit1365504817image11.jpg" width="200"></div>
		 <div class="item"><img src="../upload/rachit1365504849image14.png" width="200"></div>
		<div class="item"><img src="../upload/rachit1365504771youtube.jpgi"  width="200"></div>
                 <div class="item"><img src="../upload/rachit1365504789image10.png" width="200"></div>
                 <div class="item"><img src="../upload/rachit1365504801image15.png" width="200"></div>
		<div class="item"><img src="../upload/rachit1365504801image15.png" width="200"></div>
                 <div class="item"><img src="../upload/rachit1365504817image11.jpg" width="200"></div>
                 <div class="item"><img src="../upload/rachit1365504849image14.png" width="200"></div>
		  <?php

        $sql_class='SELECT DISTINCT class FROM pics';
        $result_class = $mysqli->query($sql_class);

        while($row_class = mysqli_fetch_array($result_class, MYSQL_ASSOC))
        {
                echo '<div><font style="color:#000000"> &nbsp;&nbsp;&nbsp;<h2>'.$row_class['class'].'</h2>';

                $current_class = $mysqli->real_escape_string($row_class['class']);
                $sql = "SELECT * FROM pics where class = '".$current_class."'";
                $result = $mysqli->query($sql);

                while($row_inside = mysqli_fetch_array($result, MYSQL_ASSOC))
                {
                        $picid= $row_inside['picid'];
                        $userid= $row_inside['ownerid'];
			echo  '<div class="item">
                              <a href="#" title="'.$userid.'"><img src="../upload/'.$picid.'" alt="Stanley" width="200"/></a>
                        </div>';

                }
                mysqli_free_result($result);
                echo '</font></div>';
        }
        mysqli_free_result($result_class);
  ?>

		
	</div>
</div>

<script src="http://osvaldas.info/theme/js/jquery.js"></script>
<script src="masonry.js"></script>
<script>
	$( function()
	{
	    var columns    = 3,
	        setColumns = function() { columns = $( window ).width() > 640 ? 3 : $( window ).width() > 320 ? 2 : 1; };

	    setColumns();
	    $( window ).resize( setColumns );

	    $( '#list' ).masonry(
	    {
	        itemSelector: '.item'
//	        columnWidth:  function( containerWidth ) { return containerWidth / columns; }
	//	columnWidth:  200	 
   });
	});
</script>


</body>
</html>
