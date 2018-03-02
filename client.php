
<?php
error_reporting(-1);
ini_set('display_errors', false);

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function login($user,$pass){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "login";
    $request['username'] = $user;
    $request['password'] = $pass;
    $request['message'] = $msg;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function register($email,$user,$pass){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "register";
    $request['email'] = $email;
    $request['username'] = $user;
    $request['password'] = $pass;
    $request['message'] = $msg;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}

function search($uid){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "search";
    $request['uid'] = $uid;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}
function searchLocation($location){
    $client = new rabbitMQClient("testRabbitMQ.ini","testServer");
    if (isset($argv[1]))
    {
      $msg = $argv[1];
    }
    else
    {
      $msg = "test message";
    }



    $request = array();
    $request['type'] = "location";
    $request['location'] = $location;
    $response = $client->send_request($request);
    //$response = $client->publish($request);

    //echo "client received response: ".PHP_EOL;
    //print_r($response);
    return $response;
    echo "\n\n";

    echo $argv[0]." END".PHP_EOL;
}



?>
