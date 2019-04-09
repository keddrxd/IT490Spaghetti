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


function getMovies($genre, $date, $title)
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
	
	if($genre == "Comedy")
	{
		$query1 = "INSERT INTO comedy ($title, $date)";
		$mysqli->query($query1) or die($mysqli->error);
	}
	
	if($genre == "Horror")
	{
		$query1 = "INSERT INTO horror ($title, $date)";
		$mysqli->query($query1) or die($mysqli->error);
	}
	
	if($genre == "Action")
	{
		$query1 = "INSERT INTO action ($title, $date)";
		$mysqli->query($query1) or die($mysqli->error);
	}
	
	if($genre == "Scifi")
	{
		$query1 = "INSERT INTO scifi ($title, $date)";
		$mysqli->query($query1) or die($mysqli->error);
	}
	
	if($genre == "Romance")
	{
		$query1 = "INSERT INTO romance ($title, $date)";
		$mysqli->query($query1) or die($mysqli->error);
	}
	
	if($genre == "Animation")
	{
		$query1 = "INSERT INTO animation ($title, $date)";
		$mysqli->query($query1) or die($mysqli->error);
	}
	
	
	
	
	//$query1 = "INSERT INTO comedy ($titleComedy, $rd1)";
	//$reply1 = $mysqli->query($query1);
	//$mysqli->query($query1) or die($mysqli->error);
	
	//$query2 = "INSERT INTO horror ($titleHorror, $rd2)";
	//$reply1 = $mysqli->query($query1);
	//$mysqli->query($query2) or die($mysqli->error);
	
	//$query3 = "INSERT INTO action ($titleAction, $rd3)";
	//$reply1 = $mysqli->query($query1);
	//$mysqli->query($query3) or die($mysqli->error);
	
	//$query4 = "INSERT INTO scifi ($titleScifi, $rd4)";
	//$reply1 = $mysqli->query($query1);
	//$mysqli->query($query4) or die($mysqli->error);
	
	//$query5 = "INSERT INTO romance ($titleRomance, $rd5)";
	//$reply1 = $mysqli->query($query1);
	//$mysqli->query($query5) or die($mysqli->error);
	
	//$query6 = "INSERT INTO animation ($titleAnimation, $rd6)";
	//$reply1 = $mysqli->query($query1);
	//$mysqli->query($query6) or die($mysqli->error);

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
			return getMovies($request['genre'], ($request['releasedates'], ($request['title'] );
		
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
