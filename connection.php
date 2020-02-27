<?php
$dbHost = 'localhost';
$dbUser = 'id12733626_sadhana';
$dbPass = 'scalevrtask1';
$dbName = 'id12733626_scalevr1';

$dbConn = mysqli_connect($dbHost, $dbUser, $dbPass) or die ('mysqli connect failed.');
mysqli_select_db($dbConn,$dbName) or die('Cannot select database'. mysqli_error($dbConn));

?>