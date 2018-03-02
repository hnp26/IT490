<?php
error_reporting(-1);
ini_set('display_errors', true);

include ('client.php');
$location = $_GET['loc'];
//$location='NJ';
$response = searchLocation($location);

header('Content-Type: application/json;charset=utf-8');

//echo json_decode($data);
echo ($response);
?>
