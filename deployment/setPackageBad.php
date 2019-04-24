#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
global $argv;


function setPackageStatusBad($server)
{
	echo "Sending Request to change Package Status from Pending to Bad.".PHP_EOL;
	$client = new rabbitMQClient("testRabbitMQ.ini","deploymentServer");
	$request = array();
	$request['type'] = "setStatusBad"; 
	$request['serverType'] = $server;
	$client->send_request($request);
	echo "Request has been sent successfully.".PHP_EOL;

}
$serverType = $argv[1];
setPackageStatusBad($serverType);

?>
