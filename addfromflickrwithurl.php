<?php
$stage=$_GET['stage'];
$url=$_GET['q'];

echo $url;

//stage->new_category
//url->httpurl


$url = 'processinput.php';
$fields = array(
						'new_category' => $stage,
						'httpurl' => $url,
				);

//url-ify the data for the POST

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

echo "closed... hopefully :P";
$stage=$stage+1;
if($stage<4) echo "<script>window.location='addfromflicker.php?stage=".$stage."';</script>";
else echo "<script>window.location='index.php'</script>";
?>
