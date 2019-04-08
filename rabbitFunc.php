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

function requestMovies($comedy, $rd1, $horror, $rd2, $action, $rd3, $scifi, $rd4, $romance, $rd5, $animation, $rd6)
{
	$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
	$request6= array();	
	$request6['type']="requestMovies";
	$request6['comedy']= $comedy;
	$request6['rd1']= $rd1;
	$request6['horror']= $horror;
	$request6['rd2']= $rd2;
	$request6['action']= $action;
	$request6['rd3']= $rd3;
	$request6['scifi']= $scifi;
	$request6['rd4']= $rd4;
	$request6['romance']= $romance;
	$request6['rd5']= $rd5;
	$request6['animation']= $animation;
	$request6['rd6']= $rd6;
	$response= $client->send_request($request6);
	return $response;	
	
}






