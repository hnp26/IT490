#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
include ('account.php');

function auth($u, $v) {
    ( $db = mysqli_connect ( 'localhost', 'testhost', 'password', 'userLogin' ) );
    if (mysqli_connect_errno())
    {
      echo"Failed to connect to MYSQL<br><br> ". mysqli_connect_error();
      exit();
    }
    echo "Successfully connected to MySQL<br><br>";
    mysqli_select_db($db, 'userLogin' );

    $s = "select * from users where username = '$u' and password = '$v'";
    //echo "The SQL statement is $s";
    ($t = mysqli_query ($db,$s)) or die(mysqli_error());
    $num = mysqli_num_rows($t);

    if ($num == 0){
      return false;
    }else
    {
      print "<br>Authorized";
      return true;
    }
}

function register($e,$u,$v) {
    ( $db = mysqli_connect ( 'localhost', 'testhost', 'password', 'userLogin' ) );
    if (mysqli_connect_errno())
    {
      echo"Failed to connect to MYSQL<br><br> ". mysqli_connect_error();
      exit();
    }
    echo "Successfully connected to MySQL<br><br>";
    mysqli_select_db($db, 'userLogin' );

    $s = "insert into users(email,username,password) values('$e','$u','$v')";
    //echo "The SQL statement is $s";
    ($t = mysqli_query ($db,$s)) or die(mysqli_error());
    print "Registered";
    return true;
}
function search($uid){
  ini_set("allow_url_fopen", 1);
  //$uid = $_GET['uid'];
  $url = "https://api.betterdoctor.com/2016-03-01/doctors/$uid?user_key=d6fb865f0d167679bbe87e722ea09bdc";
  //echo $url;

  //echo $json;
  $data = file_get_contents($url);
  echo $data;
  return $data;
}
function searchLocation($location){
  ini_set("allow_url_fopen", 1);
  //$uid = $_GET['uid'];
  $url = "https://api.betterdoctor.com/2016-03-01/doctors?location=$location&skip=0&limit=10&user_key=d6fb865f0d167679bbe87e722ea09bdc";
  //echo $url;

  //echo $json;
  $data = file_get_contents($url);
  echo $data;
  return $data;
}

function requestProcessor($request)
  {
      echo "received request".PHP_EOL;
      var_dump($request);
      if(!isset($request['type']))
      {
        return "ERROR: unsupported message type";
      }
      switch ($request['type'])
      {
        case "login":
          return auth($request['username'],$request['password']);
        case "validate_session":
          return doValidate($request['sessionId']);
        case "register":
          return register($request['email'],$request['username'],$request['password']);
        case "search":
          return search($request['uid']);
          case "location":
            return searchLocation($request['location']);
      }
      return array("returnCode" => '0', 'message'=>"Server received request and processed");
    }

    $server = new rabbitMQServer("testRabbitMQ.ini","testServer");

    $server->process_requests('requestProcessor');
    exit();

?>
