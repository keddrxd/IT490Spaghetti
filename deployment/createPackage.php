#!/usr/bin/php 
<?php

require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

global $argv;

function versionCheck($server)
{
		echo "Checking the package version for".$server.PHP_EOL;
		$client = new rabbitMQClient("testRabbitMQ.ini","deploymentServer");
		$request = array();
		$request['type'] = "versionCheck";
		$request['serverType'] = $server;
		$response = $client->send_request($request);
		$sessionData = json_decode($response,true);
		$currentVersion = $sessionData['versionNumber'];
		$futureVersion = $currentVersion+1;
		echo "New version for ".$server." is ".$futureVersion.PHP_EOL;
		return $futureVersion;
}

function createNewVersion($server)
{
		$client = new rabbitMQClient("testRabbitMQ.ini","deploymentServer");
		$futureVersion = versionCheck($server);
		shell_exec(`bash sendPackage.sh`.$server.' '.$futureVersion);
		$request = array();
		$request['type'] = "newPackage";
		$request['serverType'] = $server;
		$request['versionNumber'] = $futureVersion;
		$request['packageName'] = $machine.'_'.$futureVersion.'.tar';
		$client->send_request($request);
}

$serverType = $argv[1];

echo "Creating new version: ".$serverType.PHP_EOL;
createNewVersion($serverType);
echo "New version created successfully.".PHP_EOL;
?>
