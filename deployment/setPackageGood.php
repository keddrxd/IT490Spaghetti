#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
global $argv;


function setPackageStatusGood($server)
{
	echo "Sending Request to change Package Status from Pending to Good.".PHP_EOL;
	$client = new rabbitMQClient("testRabbitMQ.ini","deploymentServer");
	$request = array();
	$request['type'] = "setStatusGood"; 
	$request['serverType'] = $server;
	$client->send_request($request);
	echo "Request has been sent successfully.".PHP_EOL;

}
$serverType = $argv[1];
setPackageStatusGood($serverType);

?>
