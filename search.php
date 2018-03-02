<?php
error_reporting(-1);
ini_set('display_errors', true);

include ('client.php');
$uid = $_GET['uid'];
//$uid = '333d4bb6fcf640e18e93b11b00fe09eb';
$response = search($uid);

header('Content-Type: application/json;charset=utf-8');

//echo json_decode($data);
echo ($response);
?>
