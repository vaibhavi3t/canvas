<?php

error_reporting();

if (empty($_SESSION['log']['id_no'])) {

require('session/denied.php');

exit;

}

$username =  $_SESSION['log']['id_no'];

if (!$username) { 

require('session/denied.php');

exit;

}

?>

