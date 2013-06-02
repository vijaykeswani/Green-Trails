<?php

require_once '../src/facebook.php';
$app_id = "177310529100898";
$app_secret = "1cdbd5374b1c57988fc4b717bbec535d";
$facebook = new Facebook(array(
        'appId' => $app_id,
        'secret' => $app_secret,
        'cookie' => true
));
if(is_null($facebook->getUser()))
{
        header("Location:{$facebook->getLoginUrl(array('req_perms' => 'user_status,publish_stream,user_photos'))}");
        exit;
}

?>
