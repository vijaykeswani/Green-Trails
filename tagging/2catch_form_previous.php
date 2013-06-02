<?php

//$picid = $_POST['PID'];
$picid = "tagphoto.jpg";
$myfile = .$picid.".js";

if (!file_exists($myfile)) {
touch($myfile);
}
$totalTags = $_POST['totalTags'];
echo $totalTags;
echo $myfile;

$fh = fopen($myFile, 'w') or die("can't open file");

$stringData = "<?php hieader('Content-type: text/javascript'); ?>
";
fwrite($fh, $stringData);


$stringData = "var arrTagValue = new Array();
var arrTagX = new Array();
var arrTagY = new Array();
var arrTagSize = new Array();
var arrTagLock = new Array();
var totalTags = ".$_POST['totalTags'].";
";
fwrite($fh, $stringData);


for($i=0; $i<$totalTags; $i++)
{

$a="tagX".$i;
$b="tagY".$i;
$c="tagSize".$i;
$d="tagValue".$i;


$stringData='arrTagValue['.$i.'] = "'.$_POST[$d].'";
arrTagX['.$i.'] = '.$_POST[$a].';
arrTagY['.$i.'] = '.$_POST[$b].';
arrTagSize['.$i.'] = '.$_POST[$c].';
arrTagLock['.$i.'] = false;
';
fwrite($fh, $stringData);
echo $stringData;
}

$stringData='var newscripthead=document.createElement("script");
newscripthead.type="text/javascript";
newscripthead.src='.$picid.';
document.getElementsByTagName("head")[0].appendChild(newscripthead);
';


fwrite($fh, $stringData);

fclose($fh);
echo "fuck";

//header('Location: index.php');
?>
