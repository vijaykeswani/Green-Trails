<?php

require_once 'example.php';
// add a status message
$status = $facebook->api('/me/feed', 'POST', array('message' => 'RHoK'));
var_dump($status);

?>
