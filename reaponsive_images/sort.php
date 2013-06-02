<?php
session_start();
require_once('../config.inc.php');
require_once('../functions.inc.php');
require_once('../establish_db_user_connection.php');

//if($connection==1){
//      $username = $mysqli->real_escape_string($_SESSION['username']);
//      }
?>
<!DOCTYPE html>
<html><head>
    <title>Category Wise View</title>
    
    <link rel="stylesheet" href="js/quicksort.css">
    <!--[if IE 7]><link rel="stylesheet" href="styles/ie7.css" /><![endif]-->    
    <script src="js/jquery-1.js" type="text/javascript"></script>
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
 
  </head>
  <body>
    
    <div id="wrpeopleer">
      <div id="site">

        <ul class="splitter">
		<li>Categories:
		<ul>
			<li class="segment-0 selected-0"><a href="#" data-value="all">Everything</a></li>
			<li class="segment-1"><a href="#" data-value="people">Mountains</a></li>
			<li class="segment-1"><a href="#" data-value="wild-life">Rivers</a></li>
			<li class="segment-1"><a href="#" data-value="objects">Personal</a></li>
			<li class="segment-1"><a href="#" data-value="None">None</a></li>
		</ul>
		</li><br><br>
		<li>Sort by:
		<ul>
			<li class="segment-1 selected-1"><a href="#" data-value="name">Name</a></li>
			<li class="segment-2"><a href="#" data-value="size">Activity</a></li>
		</ul>
		</li>
		</ul>
 
        <div class="demo">
          
	<ul id="list" class="image-grid">

	 <?php

                $sql_class='SELECT DISTINCT class FROM pics';
                $result_class = $mysqli->query($sql_class);
		$id=0;
                while($row_class = mysqli_fetch_array($result_class, MYSQL_ASSOC))
                {
                        //echo '<div><font style="color:#000000"> &nbsp;&nbsp;&nbsp;<h2>'.$row_class['class'].'</h2>';

                        $current_class = $mysqli->real_escape_string($row_class['class']);
                        $sql = "SELECT * FROM pics where class = '".$current_class."'";
                        $result = $mysqli->query($sql);


                        echo '<div id="list">';
                        while($row_inside = mysqli_fetch_array($result, MYSQL_ASSOC))
                        {
                                $picid= $row_inside['picid'];
                                $userid= $row_inside['ownerid'];
				if($row_inside['local']==1) $src="../upload/".$picid;
				else {
					$here = explode(":", $row_inside['picid']);
					$src=$here[3];
				}
                                echo  '<li data-id="'.$id.'" class="'.$row_class['class'].'"><br><img src="'.$src.'" alt="Photo" height="128" width="128"><br>';
//                                      <a href="#" title="'.$userid.'"><img src="../upload/'.$picid.'" alt="Stanley" width="200"/></a>
//                               </div>';
				echo '<strong>'.$row_class['class'].'</strong><span style="display:none">__other_vale=ue</span></li>';
				$id=$id+1;

                        }
                        mysqli_free_result($result);
                }
                mysqli_free_result($result_class);
        ?>

<!--	    <li data-id="id-1" class="wild-life">
              <img src="js/activity-monitor.png" alt="" height="128" width="128">
              <strong>Activity Monitor</strong>
              RM348<span style="display:none">348</span>
            </li>
            <li data-id="id-2" class="people">
              <img src="js/address-book.png" alt="" height="128" width="128">
              <strong>Address Book</strong>
	      	  RM1,904<span style="display:none">1904</span>
            </li>
            <li data-id="id-3" class="people">
              <img src="js/finder.png" alt="" height="128" width="128">
              <strong>Finder</strong>
              RM1,337<span style="display:none">1337</span>
            </li>
            <li data-id="id-4" class="people">
              <img src="js/front-row.png" alt="" height="128" width="128">
              <strong>Front Row</strong>
              RM401<span style="display:none">401</span>
            </li>
            <li data-id="id-5" class="people">
              <img src="js/google-pokemon.png" alt="" height="128" width="128">
              <strong>Google Pokmon</strong>
              RM12,875<span style="display:none">12875</span>
            </li>
            <li data-id="id-6" class="people">
              <img src="js/textedit.png" alt="" height="128" width="128">
              <strong>TextEdit</strong>
              RM1,669<span style="display:none">1669</span>
            </li>
            <li data-id="id-7" class="wild-life">
              <img src="js/ichat.png" alt="" height="128" width="128">
              <strong>iChat</strong>
              RM5,437<span style="display:none">5437</span>
            </li>
            <li data-id="id-8" class="people">
              <img src="js/interface-builder.png" alt="" height="128" width="128">
              <strong>Interface Builder</strong>
              RM2,764<span style="display:none">2764</span>
            </li>
            <li data-id="id-9" class="people">
              <img src="js/ituna.png" alt="" height="128" width="128">
              <strong>iTuna</strong>
              RM17,612<span style="display:none">17612</span>
            </li>
            <li data-id="id-10" class="objects">
              <img src="js/keychain-access.png" alt="" height="128" width="128">
              <strong>Keychain Access</strong>
              RM972<span style="display:none">972</span>
            </li>
            <li data-id="id-11" class="objects">
              <img src="js/network-utility.png" alt="" height="128" width="128">
              <strong>Network objectsity</strong>
              RM245<span style="display:none">245</span>
            </li>
            <li data-id="id-12" class="objects">
              <img src="js/sync.png" alt="" height="128" width="128">
              <strong>Sync</strong>
              RM3,788<span style="display:none">37</span>
            </li>-->
            <!--<li data-id="id-13" class="people">
              <img src="images/quicksort/ical.png" width="128" height="128" alt="" />
              <strong>iCal</strong>
              RM5,273<span style="display:none">5273</span>
            </li>-->            
          </ul>
        </div>
      <!-- <p class="splitter">Powered by <a href="http://www.webnuff.com/" target="_blank">Webnuff.com</a></p>-->
  

</div></div></body></html>
