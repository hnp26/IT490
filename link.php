<?php
ini_set("allow_url_fopen", 1);

$url = "https://api.betterdoctor.com/2016-03-01/doctors?location=NJ&skip=0&limit=10&user_key=d6fb865f0d167679bbe87e722ea09bdc";
//echo $url;

//echo $json;
$data = file_get_contents($url);
//$data = ""
//$data = $more;
header('Content-Type: application/json;charset=utf-8');

//echo json_decode($data);
echo ($data);
//$arr=$data;
//header("Content-type: text/javascript");
//echo json_encode($arr);
 ?>
