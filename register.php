<?php
error_reporting(-1);
ini_set('display_errors', true);

include ('client.php');
$email = $_POST['email'];
$user = $_POST['user'];
$pass = $_POST['password'];

$response = register($email,$user,$pass);
if($response == true)
  {
    echo "Registered";
  }
  else
  {
  echo "Was not able to register";
  }
?>
