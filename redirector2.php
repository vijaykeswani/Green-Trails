
<?php
session_start();
require_once('../config.inc.php');
require_once('../functions.inc.php');
require_once('establish_db_user_connection2.php');

if($connection==1){
        $username = $mysqli->real_escape_string($_SESSION['username']);
        }




echo $_GET['imageid'];




	$sql = "SELECT * FROM photo_tags where tag_user='".$username."' ORDER BY upvotes ";
        $result = $mysqli->query($sql);
        $i=0;
//              print_r($result); echo "</br>";
                echo "<div id='donttouchme' ><ul>";
                while($row_inside = mysqli_fetch_array($result, MYSQL_ASSOC))
                {
                       echo " by ".$row_inside['tag_user'];
		}


  $intCount = 0;
 //       var link="catch_form.php";
 //       var PID=1;
//        var index="tag_saved_1.js";
        echo '<form method="post" id="frmSave">';

        for ($i = 0; $i<$totalTags; $i++){
                if ($arrTagValue[$i]!=""){
                        echo '<input type="hidden" name="tagValue'.$intCount.'" value="'.$arrTagValue[i].'">';
                        echo '<input type="hidden" name="tagX'.$intCount.'" value="'.$arrTagX[i].'">';
                        echo '<input type="hidden" name="tagY'.$intCount.'" value="'.$arrTagY[i].'">';
                        echo '<input type="hidden" name="tagSize'.$intCount.'" value="'.$arrTagSize[i].'">';
//                      alert('<input type="hidden" name="tagValue'+intCount+'" value="'+arrTagValue[i]+'">');
  //                      alert('<input type="hidden" name="tagX'+intCount+'" value="'+arrTagX[i]+'">');
    //                    alert('<input type="hidden" name="tagY'+intCount+'" value="'+arrTagY[i]+'">');
      //                  alert('<input type="hidden" name="tagSize'+intCount+'" value="'+arrTagSize[i]+'">');

                        $intCount++;
                }
        }

    //    document.writeln('<input type="hidden" name="PID" value="'+PID+'">');
    //    document.writeln('<input type="hidden" name="jsFile" value="'+index+'">');
        echo '<input type="hidden" name="totalTags" value="'.$intCount.'">';
        echo '</form>';

        echo '<script language="Javascript">';
        echo 'var formArea = document.getElementById("frmSave");';
        echo 'formArea.action="catch_form.php";');
        echo 'formArea.submit();');
        echo '</script>';

?>
