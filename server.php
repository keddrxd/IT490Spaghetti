#!/usr/bin/php
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

include ("account.php");


	$database = mysqli_connect($hostname, $username, $password, $database);

global $database;
if (mysqli_connect_errno())
{
	echo "failed to connect to MySQL: "."\n". mysqli_connect_error();
	exit();
}else	
{
		
	echo "Successfully connected to MYSQL."."\n".PHP_EOL;
}

function login($userN, $pass)
{
	$host = '192.168.1.6';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$data = array();
	$userName = $mysqli->escape_string($userN);
	$password = $mysqli->escape_string($pass);
	$password = hash('sha356', $password);
	
	$query = "select * from users where username = '$userName' and password = '$password'";
	$reply = $mysqli->query($query);
	
	while ($row = $reply->fetch_assoc())
	{
		echo "Passwords match!".PHP.EOL;
	}
	
}

function auth($userN, $session)
{
	$host = '192.168.1.6';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	if($userN==NULL)
	{
		return false;
	}
	if($session==NULL)
	{
		return false;	
	}
	
	$query = "select * from session where username = '$userN'";
	$reply = $mysqli->query($query);
	while($row = $response->fetch_assoc())
	{
		if($row["sessionKey"] == $session)
		{
			echo "Session ID's match!".PHP_EOL;	
		}
				
	}
	
}






/*function authentication($username,$password)
{
	$host = '192.168.1.6';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	$s = "SELECT * from Users where username =\"$username\" && password = \"$password\"";
	$t = mysqli_query($mysqli,$s);
	
	if (mysqli_num_rows($t) == 0)
	{
		echo "Username and password is not correct.".PHP_EOL;
		return false;
	}
	else
	{
		echo "Success.".PHP_EOL;
		return true;
	}
	
	
}*/

function register($firstName, $lastName, $userName, $pass, $email)
{
	$host = '192.168.1.6';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$data = array();
	$firstN = $mysqli->escape_string($firstName);
	$lastN = $mysqli->escape_string($lastName);
	$userN = $mysqli->escape_string($userName);
	$password = $mysqli->escape_string($pass);
	$password = hash('sha256',$pass);
	$email = $mysqli->escape_string($email);
	$query = "select * from users where username = '$userN'";
	$reply = $mysqli->query($query);
	if($response->num_rows == 0)
	{
		$query = "INSERT INTO users values('$firstN', '$lastN', '$userN', '$password', '$email');
		$mysqli->query($query) or die($mysqli->error);
		echo "Account has been created".PHP.EOL;
		echo "Passwords match".PHP.EOL;
		$data['firstName'] = $firstN;
		$data['lastName'] = $lastN;
		$data['username'] = $userN;
		$data['password'] = $password;
		$data['email'] = $email;
		$sessID = createSess($userN);
		$userData['sessionKey' = $sessID;
		
		return json_encode($userData);
		
	}

	
	
}

function createSess($userName)
{
	$host = '192.168.1.6';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$sessionDate = time();
	$sessionKey = hash('sha356', $userName.$sessionDate);
	$query = "insert into session values('$userName','$sessionKey');
	$mysqli->query($query);
	return $sessionKey;

}

function requestProcessor($request)
{
 	 echo "received request".PHP_EOL;
  	var_dump($request);
  	if(isset($request['type']))
  	{
 	 switch ($request['type'])
  	{	
 		case "login":
			return login($request['username'], $request['password']);
			break;
		case "register";
			return register($request['firstName'], $request['lastName'], $request['userName'], $request['$pass'], $request['$email']);
			break;
		case "validate";
			return authentication($request['$userN'], $request['$session']);
			break;
		default:
			echo "try again";
	
}
  }
 
}

$server = new rabbitMQServer("testRabbitMQ.ini","testServer");
echo "testRabbitMQServer BEGIN".PHP_EOL;
$server->process_requests('requestProcessor');
echo "testRabbitMQServer END".PHP_EOL;
exit();
?>
