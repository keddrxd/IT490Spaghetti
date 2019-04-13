<?php

require ('rabbitFunc.php');
//$username = $_POST['username'];
//$username = "0";
//$username = $_GET['username'];
$username = $_SESSION['username'];






//$username = $_REQUEST['username'];
if(isset($_POST['comedy'])){
    $comedy  = $_POST['comedy'];
}
else{
    $comedy = "";
}

if(isset($_POST['horror'])){
    $horror  = $_POST['horror'];
}
else{
    $horror = "";
}
if(isset($_POST['action'])){
    $action  = $_POST['action'];
}
else{
    $action = "";
}
if(isset($_POST['sci-fi'])){
    $scifi  = $_POST['sci-fi'];
}
else{
    $scifi = "";
}
if(isset($_POST['romance'])){
    $romance  = $_POST['romance'];
}
else{
    $romance = "";
}
if(isset($_POST['animation'])){
    $animation  = $_POST['animation'];
}
else{
    $animation = "";
}
//$comedy = $_POST['comedy'];
//$horror = $_POST['horror'];
//$action = $_POST['action'];
//$scifi = $_POST['scifi'];
//$romance = $_POST['romance'];
//$animation = $_POST['animation'];

$response = firstLogin($username, $comedy, $horror, $action, $scifi, $romance, $animation);

$host = '127.0.0.1';
$user = 'admin';
$pw = 'adminPwd';
$db = 'usersDB';
$mysqli = new mysqli($host, $user, $pw, $db);
$query = "select * from category where username = '$user'";
$reply = $mysqli->query($query);
//$_SESSION['allmarks'] = array();
while ($row = $reply->fetch_assoc())
{
	if($row['username'] == $username)
	{
		if($row['comedy'] == "comedy")
		{
			$query1 = "select comedy from comedy";
			$reply1 = $mysqli->query($query1);
			$comedyArray = array( values );
			while($row = $reply1->fetch_assoc())
			{
				foreach($row as $key => $value)
				{
					$comedyArray[] = $value;
				}
			}
		}
	}
}

if ($response != false)
{
	$sessionData = json_decode($response, true);
	$_SESSION['isLogged'] = true;
	$_SESSION['username'] = $sessionData['username'];
	$_SESSION['comedy'] = $sessionData['comedy'];
	$_SESSION['horror'] = $sessionData['horror'];
	$_SESSION['action'] = $sessionData['action'];
	$_SESSION['scifi'] = $sessionData['scifi'];
	$_SESSION['romance'] = $sessionData['romance'];
	$_SESSION['animation'] = $sessionData['animation'];
	//$_SESSION['comedyArray'] = $comedyArray;

	header("location: mainPage.php");
}

   

//else
//{
//	$errorMSG = "Email already exists";
//	echo "$errorMSG";
//	error($errorMSG);
//	
//	header("location: index.php");
//}

