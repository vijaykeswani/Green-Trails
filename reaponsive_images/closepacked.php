<?php
session_start();
require_once('../config.inc.php');
require_once('../functions.inc.php');
require_once('../establish_db_user_connection.php');
$username=$_SESSION['username'];
//if($connection==1){
//      $username = $mysqli->real_escape_string($_SESSION['username']);
//      }
        
?>
<!DOCTYPE html>

<html lang="en">

<head>
        <link rel="canonical" href="http://osvaldas.info/examples/responsive-jquery-masonry-or-pinterest-style-layout">
        <link rel="icon" href="http://osvaldas.info/theme/img/favicon.ico" />
        <link rel="stylesheet" href="http://osvaldas.info/theme/css/reset.css" />
        <link rel="stylesheet" href="http://osvaldas.info/examples/main.css" />
        <!--[if lt IE 9]>
        <script src="/theme/js/html5.js"></script>
        <script src="/theme/js/ie9.js"></script>
        <![endif]-->
        <style>
                body
                {
/*                        background-color: #2d3033;*/
                        background: rgba(42,99,105,0.8) none;
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
			margin-left: 22px;
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
                                        /*background-color: #fff;
                                        background-color: rgba( 255, 255, 255, .5 );*/
                                        float: left;
                                        margin: 0 1.515% 1.875em; /* 15px 30px */
                                }
		.image { position: relative; width: 184px; height: 219px; }
		.hoverimageup { position: absolute; top: 0; left: 0; display: none; }
		.image:hover .hoverimageup { display: block; }
                @media only screen and ( max-width: 40em ) /* 640px */
                {
                        .item
                        {
                                width: 46.876%; /* 305px */
                                margin-bottom: 0.938em;/* 15px */
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





<div id="wrapper">

        <?php

                //$sql_class='SELECT DISTINCT class FROM pics';
                //$result_class = $mysqli->query($sql_class);
		echo '<div><font style="color:#000000"> &nbsp;&nbsp;&nbsp;<h2></h2><div id="list">';
                //while($row_class = mysqli_fetch_array($result_class, MYSQL_ASSOC))
                //{

                        //$current_class = $mysqli->real_escape_string($row_class['class']);
                        //$sql = "SELECT * FROM pics where class = '".$current_class."'";
                        if(isset($_POST['vote']))
                        {
				$id=$_POST['picid'];
                         	$q="select * from votes where username='$username' and picid='$id'";
				$r=$mysqli->query($q);	
				if(!mysqli_num_rows($r))
				{
					$q="insert into votes values('$username', '$id')";
					$mysqli->query($q);
					$q="update pics set votes=votes+1 where picid='$id'";
					$mysqli->query($q);
				}       
                        }
			$sql = "SELECT * from pics ORDER BY picid DESC";
			$result = $mysqli->query($sql);
			while($row_inside = mysqli_fetch_array($result, MYSQL_ASSOC))
                        {
                                $picid= $row_inside['picid'];
                                $userid= $row_inside['ownerid'];
				if($row_inside['local']==1) $src="../upload/".$picid;
                                else {
                                        $here = explode(":", $row_inside['picid']);
                                        $src=$here[3];
                                }
                                echo  '<div class="item">
				<div class="image">
			<a href="_blank"><img src="'.$src.'" alt="Photo" width="250"/></a>
			<form action="closepacked.php" method="post">
			<input type="hidden" name="vote"/>';
			echo "<input type='hidden' name='userid' value='$userid'/>";
			echo "<input type='hidden' name='picid' value='$picid'/>";
			echo '<input type="image" class="hoverimageup" src="../images/upvote.png" alt="Submit Form" />
                               </form></div></div>';

                        }
                        mysqli_free_result($result);
                //}
                //mysqli_free_result($result_class);
		echo '</div></font></div>';
        ?>

</div>

<script src="http://osvaldas.info/theme/js/jquery.js"></script>
<script src="http://osvaldas.info/examples/responsive-jquery-masonry-or-pinterest-style-layout/masonry.js"></script>
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
//              columnWidth:  function( containerWidth ) { return containerWidth / columns; }
        //      columnWidth:  200        
   });
        });
</script>


</body>
</html>
                                                                        
