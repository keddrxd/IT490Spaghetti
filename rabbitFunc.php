<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
function login($username,$password)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	$request1 = array();
	$request1['type'] = "login";
  $request1['username'] = $username;
	$request1['password'] = $password;
	$response = $client->send_request($request1);
	return $response;
}
function register($username,$email, $pass,$firstN,$lastN, $zip)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	$request2 = array();
	$request2['type']="register";
	$request2['username'] = $username;
	$request2['email'] = $email;
	$request2['password']= $pass;
	$request2['firstName'] = $firstN;
	$request2['lastName'] = $lastN;
	$request2['zip'] = $zip;
	$response = $client->send_request($request2);
	return $response;
}

function validateSession($username,$sessionID)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	$request3= array();
	$request3['type']="validate";
	$request3['username']= $username;
	$request3['sessionID']= $sessionID;
	$response= $client->send_request($request3);
	return $response;
}
function error($errorMSG)
{
	$errorClient = new rabbitMQClient("errorServer.ini","errorServer");
	$request4 = array();
	$errorDate = date_create();
	$request4['type'] ="error"
	$request4['date']=$errorDate;
	$request4['log']=$message;
	$errorClient->send_request($request4);

}


function firstLogin($username, $comedy, $horror, $action, $scifi, $romance, $animation)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	$request5= array();	
	$request5['type']="first";
	$request5['username']= $username;
	$request5['comedy']= $comedy;
	$request5['horror']= $horror;
	$request5['action']= $action;
	$request5['scifi']= $scifi;
	$request5['romance']= $romance;
	$request5['animation']= $animation;
	$response= $client->send_request($request5);
	return $response;

}





