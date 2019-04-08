#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');
#include ("account.php");
	#$database = mysqli_connect($hostname, $username, $password, $database);
global $database;
if (mysqli_connect_errno())
{
	echo "failed to connect to MySQL: "."\n". mysqli_connect_error();
	exit();
}else	
{
		
	echo "Successfully connected to MYSQL."."\n".PHP_EOL;
}


function getMovies($comedy, $rd1, $horror, $rd2, $action, $rd3, $scifi, $rd4, $romance, $rd5, $animation, $rd6)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db); 
	if (mysqli_connect_errno($mysqli))
  	{
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
  	}
	
	$userData = array();
	$comedy = $mysqli->escape_string($comedy);
	$rd1 = $mysqli->escape_string($rd1);
	$horror = $mysqli->escape_string($horror);
	$rd2 = $mysqli->escape_string($rd2);
	$action = $mysqli->escape_string($action);
	$rd3 = $mysqli->escape_string($rd3);
	$scifi = $mysqli->escape_string($scifi);
	$rd4 = $mysqli->escape_string($rd4);
	$romance = $mysqli->escape_string($romance);
	$rd5 = $mysqli->escape_string($rd5);
	$animation = $mysqli->escape_string($animation);
	$rd6 = $mysqli->escape_string($rd6);
	
	$query1 = "INSERT INTO comedy ($comedy, $rd1)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query1) or die($mysqli->error);
	
	$query2 = "INSERT INTO horror ($horror, $rd2)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query2) or die($mysqli->error);
	
	$query3 = "INSERT INTO action ($action, $rd3)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query3) or die($mysqli->error);
	
	$query4 = "INSERT INTO scifi ($scifi, $rd4)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query4) or die($mysqli->error);
	
	$query5 = "INSERT INTO romance ($romance, $rd5)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query5) or die($mysqli->error);
	
	$query6 = "INSERT INTO animation ($animation, $rd6)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query6) or die($mysqli->error);

}
function requestProcessor($request)
{
 	 echo "received request".PHP_EOL;
  	var_dump($request);
  	if(!isset($request['type']))
  	{
		return "Error: unsupported message type";	
	}
 	switch ($request['type'])
  	{	
 		case "request":
			return getMovies($request['comedy'], $request['rd1'], $request['horror'], $request['rd2'], $request['action'], $request['rd3'], $request['scifi'], $request['rd4'], $request['romance'], $request['rd5'], $request['animation'], $request['rd6'] );
		
		default:
			echo "try again";
	
	}
   
}


$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>
