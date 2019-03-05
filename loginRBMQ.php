<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function login($username,$password)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	#$eClient = new rabbitMQClient("testRabbitMQ.ini","errorServer");
	$request1 = array();
	$request1['type'] = "login";
  $request1['username'] = $user;
	$request1['password'] = $pass;
	$response = $client->send_request($request1);
	return $response;
}
function register($username,$email, $pass,$firstN,$lastN)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	#$eClient = new rabbitMQClient("testRabbitMQ.ini","errorServer");
	$request2 = array();
	$request2['type']="register";
	$request2['username'] = $username;
	$request2['email'] = $email;
	$request2['password']= $pass;
	$request2['firstName'] = $firstN;
	$request2['lastName'] = $lastN;
	$response = $client->send_request($request2);
	return $response;
}
function validateSession($username,$sessionID)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	$request4= array();
	$request4['type']="validate";
	$request4['username']= $user;
	$request4['sessionID']= $sessionID;
	$response= $client->send_request($request4);
	return $response;
}
