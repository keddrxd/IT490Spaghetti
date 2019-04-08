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


function getMovies($comedy, $rd1, $titleComedy, $horror, $rd2, $titleHorror, $action, $rd3, $titleAction, $scifi, $rd4, $titleScifi, $romance, $rd5, $titleRomance, $animation, $rd6, $titleAnimation)
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
	$titleComedy = $mysqli->escape_string($titleComedy);
	$horror = $mysqli->escape_string($horror);
	$rd2 = $mysqli->escape_string($rd2);
	$titleHorror = $mysqli->escape_string($titleHorror);
	$action = $mysqli->escape_string($action);
	$rd3 = $mysqli->escape_string($rd3);
	$titleAction = $mysqli->escape_string($titleAction);
	$scifi = $mysqli->escape_string($scifi);
	$rd4 = $mysqli->escape_string($rd4);
	$titleScifi = $mysqli->escape_string($titleScifi);
	$romance = $mysqli->escape_string($romance);
	$rd5 = $mysqli->escape_string($rd5);
	$titleRomance = $mysqli->escape_string($titleRomance);
	$animation = $mysqli->escape_string($animation);
	$rd6 = $mysqli->escape_string($rd6);
	$titleAnimation = $mysqli->escape_string($titleAnimation);
	
	$query1 = "INSERT INTO comedy ($titleComedy, $rd1)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query1) or die($mysqli->error);
	
	$query2 = "INSERT INTO horror ($titleHorror, $rd2)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query2) or die($mysqli->error);
	
	$query3 = "INSERT INTO action ($titleAction, $rd3)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query3) or die($mysqli->error);
	
	$query4 = "INSERT INTO scifi ($titleScifi, $rd4)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query4) or die($mysqli->error);
	
	$query5 = "INSERT INTO romance ($titleRomance, $rd5)";
	//$reply1 = $mysqli->query($query1);
	$mysqli->query($query5) or die($mysqli->error);
	
	$query6 = "INSERT INTO animation ($titleAnimation, $rd6)";
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
 		case "requestMovies":
			return getMovies($request['comedy'], $request['rd1'], $request['titleComedy'], $request['horror'], $request['rd2'], $request['titleHorror'], $request['action'], $request['rd3'], $request['titleAction'], $request['scifi'], $request['rd4'], $request['titleScifi'], $request['romance'], $request['rd5'], $request['titleRomance'], $request['animation'], $request['rd6'], $request['titleAnimation'] );
		
		default:
			echo "try again";
	
	}
   
}


$server = new rabbitMQServer("movieServer.ini","movieServer");
echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>
