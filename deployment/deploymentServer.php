#!/usr/bin/php

<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function versionCheck($serverType)
{
		#connection to Database
		$host = 'localhost';
		$user = 'adam';
		$pass = 'deployPass';
		$db = 'versionControl';
		$mysqli = new mysqli($host,$user,$pass,$db);
		if ($mysqli->connect_error)
		{
			die('Connect Error');
		}
		$packageData = array();
		$query = "select verName from version where serverType= '$serverType' order by verName desc limit 1";
		$versionNumber = $mysqli->query($query);
		$versionNumber = $versionNumber->fetch_assoc();
		echo "Current Version Number is ".$versionNumber['verName'];
		$packageData['versionNumber'] = $versionNumber['verName'];
		return json_encode($packageData);
}

function addVersion($serverType,$versionNumber,$packageName)
{
	
	$host = 'localhost';
	$user = 'adam';
	$pass = 'deployPass';
	$db = 'versionControl';
	$mysqli = new mysqli($host,$user,$pass,$db);
	if ($mysqli->connect_error)
		{
			die('Connect Error');
		}
	$date = time();
	echo "Inserting new version into the table";

	$query = "Insert into version values ('$date', '$versionNumber', '$serverType','pending')";
	$mysqli->query($query);	
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
			case "versionCheck":
				return versionCheck($request['serverType']);
			case "newPackage":
				return addVersion($request['serverType'],$request['versionNumber'],$request['packageName']);
			
			
	}
	return array("returnCode"=> '0', 'message'=>"Server received request and processed.");
			
}		

$server = new rabbitMQServer("testRabbitMQ.ini","deploymentServer");
echo "Deployment Server Begin".PHP_EOL;
$server->process_requests('requestProcessor');
echo "Deployment Server Ends".PHP_EOL;
exit();
?>		
