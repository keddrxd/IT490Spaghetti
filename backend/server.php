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
function error($errorMSG)
{
	//$time = time();
	$error = "$errorMSG ". date("M:d:y") . "  " . date("H:i:s") . "\n";
	error_log($error, 3, "/home/andrew/git/IT490Spaghetti/error.log");
	//$errorClient = new rabbitMQClient("errorServer.ini","errorServer");
	//$request4 = array();
	//$errorDate = date_create();
	//$request4['type'] ="error";
	//$request4['date']=$errorDate;
	//$request4['log']=$errorMSG;
	//file_put_contents('error.log',$request4['log'], FILE_APPEND);
	//$errorClient->send_request($request4);
}
function login($userN, $pass)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$userData = array();
	$userPref = array();
	$userName = $mysqli->escape_string($userN);
	$password = $mysqli->escape_string($pass);
	$password = hash('sha256', $password);
	
	$query = "select * from users where username = '$userName' and password = '$password'";
	$reply = $mysqli->query($query);
	
	while ($row = $reply->fetch_assoc())
	{
		echo "checking password now";
		if($row['password'] == $password)
		{
			echo "Passwords match!".PHP_EOL;
			$userData['firstName'] = $row['firstName'];
			$userData['lastName'] = $row['lastName'];
			$userData['username'] = $row['username'];
			$userData['password'] = $row['password'];
			$userData['email'] = $row['email'];
			$userData['zip'] = $row['zip'];
			$sessionID = updateSess($row['username']);
			$userData['sessionKey'] = $sessionID;
			
			$query1 = "select * from category where username = '$userName'";
			$reply1 = $mysqli->query($query1);
			while($row1 = $reply->fetch_assoc())
			{
				$userPref['comedy'] = $row1['comedy'];
				$userPref['horror'] = $row1['horror'];
				$userPref['action'] = $row1['action'];
				$userPref['scifi'] = $row1['scifi'];
				$userPref['romance'] = $row1['romance'];
				$userPref['animation'] = $row1['animation'];
			}	
			
			//movieRec($userN);
			return json_encode($userData);
		}
	}
	//$error = "Passwords don't match\n";
	//echo $error;
	//error($error);
	echo "passswords dont match";
	return false;
	
	
	
}

function getFriends($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$userFriends = array();
	$query = "select * from friends where username = '$username'";
	$reply = $mysqli->query($query);
	while ($row = $reply->fetch_assoc())
	{
		$userFriends['username'] = $row['username'];
		$userFriends['friend1'] = $row['friend1'];
		$userFriends['friend2'] = $row['friend2'];
		$userFriends['friend3'] = $row['friend3'];
		$userFriends['friend4'] = $row['friend4'];
	}
	
	
	return json_encode($userFriends);
	
	
}

function friendsList($username, $add)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	$query = "select username from users";
	$reply = $mysqli->query($query);
	$userData = array();
	$userData1 = array();
	while ($row = $reply->fetch_assoc())
	{
		foreach($row as $key => $value)
		{
			$userData['username'] = $value;
			if($userData['username'] == $username)
			{
				$query2 = "select * from friends where username = '$username'";
				$reply2 = $mysqli->query($query2);
				while ($row2 = $reply2->fetch_assoc())
				{
					$userData1['username'] = $row2['username'];
					$userData1['friend1'] = $row2['friend1'];
					$userData1['friend2'] = $row2['friend2'];
					$userData1['friend3'] = $row2['friend3'];
					$userData1['friend4'] = $row2['friend4'];
				}
				$friend1 = $userData1['friend1'];
				$friend2 = $userData1['friend2'];
				$friend3 = $userData1['friend3'];
				$friend4 = $userData1['friend4'];
				if($userData1['friend1'] == "")
				{
					$query3 = "UPDATE friends set friend1='$add' where username='$username'";
					//$query3 = "INSERT INTO friends values('$username', '$add', '', '', '')";	
					$reply3 = $mysqli->query($query3);
				}
				elseif($userData1['friend2'] == "")
				{
					$query3 = "UPDATE friends set friend2='$add' where username='$username'";
					//$query3 = "INSERT INTO friends values('$username', '$friend1', '$add', '', '')";	
					$reply3 = $mysqli->query($query3);
				}
				elseif($userData1['friend3'] == "")
				{
					$query3 = "UPDATE friends set friend3='$add' where username='$username'";
					//$query3 = "INSERT INTO friends values('$username', '$friend1', '$friend2', '$add', '')";	
					$reply3 = $mysqli->query($query3);
				}
				elseif($userData1['friend4'] == "")
				{
					$query3 = "UPDATE friends set friend4='$add' where username='$username'";
					//$query3 = "INSERT INTO friends values('$username', '$friend1', '$friend2', '$friend3', '$add')";	
					$reply3 = $mysqli->query($query3);
				}
			}
		}
		
				
		
	}
	$userFriends = array();
	$query4 = "select * from friends where username = '$username'";
	$reply4 = $mysqli->query($query4);
	while ($row4 = $reply4->fetch_assoc())
	{
		$userFriends['username'] = $row4['username'];
		$userFriends['friend1'] = $row4['friend1'];
		$userFriends['friend2'] = $row4['friend2'];
		$userFriends['friend3'] = $row4['friend3'];
		$userFriends['friend4'] = $row4['friend4'];
	}
	
	
	return json_encode($userFriends);
	
	
}

function userRec($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	$userData = array();
	while ($row = $reply->fetch_assoc())
	{
		if($row['username'] == $username)
		{
			$userData['comedy'] = $row['comedy'];
			$userData['horror'] = $row['horror'];
			$userData['action'] = $row['action'];
			$userData['scifi'] = $row['scifi'];
			$userData['romance'] = $row['romance'];
			$userData['animation'] = $row['animation'];
		}
	}
	
	return json_encode($userData);
	
}
function comedyRec($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	//$user = $_SESSION['username'];
	//$username = "adamkkk";
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	$comedyArray = array();
	$horrorArray = array();
	$actionArray = array();
	$scifiArray = array();
	$romanceArray = array();
	$animationArray = array();
	//$text = "Aalap sucks";
	//$comedyArray['test'] = $text;
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['username'] == $username)
		{
			
			if($row['comedy'] == "comedy")
			{
				$query1 = "select comedy from comedy";
				$reply1 = $mysqli->query($query1);
				while($row = $reply1->fetch_assoc())
				{
					foreach($row as $key => $value)
					{
						$comedyArray[] = $value;
					}
				}
			}
			if($row['horror'] == "horror")
			{
				$query2 = "select horror from horror";
				$reply2 = $mysqli->query($query2);
				while($row = $reply2->fetch_assoc())
				{
					foreach($row as $key => $value)
					{
						$horrorArray[] = $value;
					}
				}
			}
			if($row['action'] == "action")
			{
				$query3 = "select action from action";
				$reply3 = $mysqli->query($query3);
				while($row = $reply3->fetch_assoc())
				{
					foreach($row as $key => $value)
					{
						$actionArray[] = $value;
					}
				}
			}
			if($row['scifi'] == "scifi")
			{
				$query4 = "select scifi from scifi";
				$reply4 = $mysqli->query($query4);
				while($row = $reply4->fetch_assoc())
				{
					foreach($row as $key => $value)
					{
						$scifiArray[] = $value;
					}
				}
			}
			if($row['romance'] == "romance")
			{
				$query5 = "select romance from romance";
				$reply5 = $mysqli->query($query5);
				while($row = $reply5->fetch_assoc())
				{
					foreach($row as $key => $value)
					{
						$romanceArray[] = $value;
					}
				}	
			}
			if($row['animation'] == "animation")
			{
				$query6 = "select animation from animation";
				$reply6 = $mysqli->query($query6);
				while($row = $reply6->fetch_assoc())
				{
					foreach($row as $key => $value)
					{
						$animationArray[] = $value;
					}
				}
			}
		}
	}
	
	//return json_encode($comedyArray, $horrorArray, $actionArray, $scifiArray, $romanceArray, $animationArray);
	return json_encode($comedyArray);
	
}
function horrorRec($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	//$username = "adamkkk";
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$horrorArray = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['horror'] == "horror")
		{
			$query2 = "select horror from horror";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$horrorArray[] = $value;
				}
			}
			
		}
			
	}
	
	return json_encode($horrorArray);	
	
}
function actionRec($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	//$username = "adamkkk";
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$actionArray = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['action'] == "action")
		{
			$query2 = "select action from action";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$actionArray[] = $value;
				}
			}
			
		}
			
	}
	
	return json_encode($actionArray);	
	
}
function scifiRec($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	//$username = "adamkkk";
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$scifiArray = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['scifi'] == "scifi")
		{
			$query2 = "select scifi from scifi";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$scifiArray[] = $value;
				}
			}
			
		}
			
	}
	
	return json_encode($scifiArray);	
	
}
function romanceRec($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	//$username = "adamkkk";
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$romanceArray = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['romance'] == "romance")
		{
			$query2 = "select romance from romance";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$romanceArray[] = $value;
				}
			}
			
		}
			
	}
	
	return json_encode($romanceArray);	
	
}
function animationRec($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	//$username = "adamkkk";
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$animationArray = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['animation'] == "animation")
		{
			$query2 = "select animation from animation";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$animationArray[] = $value;
				}
			}
			
		}
			
	}
	
	return json_encode($animationArray);	
	
}
function comedyRel($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$comedyRelease = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['comedy'] == "comedy")
		{
			$query2 = "select rd from comedy";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$comedyRelease[] = $value;
				}
			}
			
		}
			
	}
	return json_encode($comedyRelease);
	
	
}
function horrorRel($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$horrorRelease = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['horror'] == "horror")
		{
			$query2 = "select rd from horror";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$horrorRelease[] = $value;
				}
			}
			
		}
			
	}
	
	return json_encode($horrorRelease);	
	
}
function actionRel($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$actionRelease = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['action'] == "action")
		{
			$query2 = "select rd from action";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$actionRelease[] = $value;
				}
			}
			
		}
			
	}
	return json_encode($actionRelease);
	
	
}
function scifiRel($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$scifiRelease = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['scifi'] == "scifi")
		{
			$query2 = "select rd from scifi";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$scifiRelease[] = $value;
				}
			}
			
		}
			
	}
	return json_encode($scifiRelease);
	
	
}
function romanceRel($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$romanceRelease = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['romance'] == "romance")
		{
			$query2 = "select rd from romance";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$romanceRelease[] = $value;
				}
			}
			
		}
			
	}
	return json_encode($romanceRelease);
	
	
}
function animationRel($username)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	
	$animationRelease = array();
	
	while ($row = $reply->fetch_assoc())
	{
		if($row['animation'] == "animation")
		{
			$query2 = "select rd from animation";
			$reply2 = $mysqli->query($query2);
			while($row = $reply2->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$animationRelease[] = $value;
				}
			}
			
		}
			
	}
	return json_encode($animationRelease);
	
	
}
function display()
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
	$s = mysqli_query($mysqli, "SELECT * FROM category WHERE username = 'andypoo'");
	while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
		$user = $row["username"];
		$comedy = $row["comedy"];
		$horror = $row["horror"];
		$action = $row["action"];
		$scifi = $row["scifi"];
		$romance = $row["romance"];
		$animation = $row["animation"];
	}
	echo "Username is: $user<br>";
	echo "Comedy is: $comedy<br>";
}
function auth($userN, $session)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	echo $session.PHP_EOL;
	$query = "select * from session where username = '$userN'";
	$reply = $mysqli->query($query);
	while($row = $reply->fetch_assoc())
	{
		$session = updateSess($row['username']);
		if($row["sessionKey"] != $session)
		{
			echo "Session ID's match!".PHP_EOL;
			$userData['username'] = $userN;
			$userData['sessionID'] = $session;
			return json_encode($userData);
		}
				
	}
	//if($userN==NULL)
	//{
	//	return false;
	//}
	//if($session==NULL)
	//{
	//	return false;	
	//}
	echo "sessionID did not match".PHP_EOL;
	return false;
	
}
function firstLogin($username, $comedy, $horror, $action, $scifi, $romance, $animation)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$userData = array();
	$username = $mysqli->escape_string($username);
	$comedy = $mysqli->escape_string($comedy);
	$horror = $mysqli->escape_string($horror);
	$action = $mysqli->escape_string($action);
	$scifi = $mysqli->escape_string($scifi);
	$romance = $mysqli->escape_string($romance);
	$animation = $mysqli->escape_string($animation);
	$query = "select * from category where username = '$username'";
	$reply = $mysqli->query($query);
	if($reply->num_rows == 0)
	{
		$query = "INSERT INTO category values('$username', '$comedy', '$horror', '$action', '$scifi', '$romance', '$animation')";
		$mysqli->query($query) or die($mysqli->error);
		$userData['username'] = $username;
		$userData['comedy'] = $comedy;
		$userData['horror'] = $horror;
		$userData['action'] = $action;
		$userData['scifi'] = $scifi;
		$userData['romance'] = $romance;
		$userData['animation'] = $animation;
		$query2 = "INSERT INTO friends values('$username', '', '', '', '')";
		$mysqli->query($query2) or die($mysqli->error);
		return json_encode($userData);
						
	}
	
}
function register($firstName, $lastName, $userName, $pass, $email, $zip)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$userData = array();
	$firstN = $mysqli->escape_string($firstName);
	$lastN = $mysqli->escape_string($lastName);
	$userN = $mysqli->escape_string($userName);
	$password = $mysqli->escape_string($pass);
	$password = hash('sha256',$pass);
	$email = $mysqli->escape_string($email);
	$zip = $mysqli->escape_string($zip);
	$query = "select * from users where username = '$userN'";
	$reply = $mysqli->query($query);
	if($reply->num_rows == 0)
	{
		$query = "INSERT INTO users values('$firstN', '$lastN', '$userN', '$password', '$email', '$zip')";
		$mysqli->query($query) or die($mysqli->error);
		//$query1 = "INSERT INTO category values('$userN', '0', '0', '0', '0', '0', '0')";
		//$mysqli->query($query1) or die($mysqli->error);
		echo "Account has been created".PHP_EOL;
		echo "Passwords match".PHP_EOL;
		$userData['firstName'] = $firstN;
		$userData['lastName'] = $lastN;
		$userData['username'] = $userN;
		$userData['password'] = $password;
		$userData['email'] = $email;
		$userData['zip'] = $zip;
		$sessID = createSess($userN);
		$userData['sessionID'] = $sessID;
		
		return json_encode($userData);
		
	}
	
	
}
function createSess($userName)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$sessionDate = time();
	$sessionKey = hash('sha256', $userName.$sessionDate);
	$query = "insert into session values('$userName','$sessionKey')";
	$mysqli->query($query);
	return $sessionKey;
}
function updateSess($userName)
{
	$host = '127.0.0.1';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	
	$sessionDate = time();
	$sessionKey = hash('sha256',$userName.$sessionDate);
	$query = "update session set sessionKey = '$sessionKey' where username = '$userName'";
	$mysqli->query($query);
	return $sessionKey;
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
 		case "login":
			return login($request['username'], $request['password']);
		case "register":
			return register($request['firstName'], $request['lastName'], $request['username'], $request['password'], $request['email'], $request['zip']);
		case "validate":
			return auth($request['username'], $request['sessionID']);
		case "first":
			return firstLogin($request['username'], $request['comedy'], $request['horror'], $request['action'], $request['scifi'], $request['romance'], $request['animation']);
		case "comedy":
			return comedyRec($request['username']);
		case "horror":
			return horrorRec($request['username']);
		case "action":
			return actionRec($request['username']);
		case "scifi":
			return scifiRec($request['username']);
		case "romance":
			return romanceRec($request['username']);
		case "animation":
			return animationRec($request['username']);
		case "comedyRd":
			return comedyRel($request['username']);
		case "horrorRd":
			return horrorRel($request['username']);
		case "actionRd":
			return actionRel($request['username']);
		case "scifiRd":
			return scifiRel($request['username']);
		case "romanceRd":
			return romanceRel($request['username']);
		case "animationRd":
			return animationRel($request['username']);
		case "error":
			return error($request['msg']);
		case "userRec":
			return userRec($request['username']);
		case "friends":
			return friendsList($request['username'], $request['addFriend']);
		case "getFriends":
			return getFriends($request['username']);
		
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
