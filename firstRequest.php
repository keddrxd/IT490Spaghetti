<?php
require ('rabbitFunc.php');
$username = $_POST['username'];
$comedy = $_POST['comedy'];
$horror = $_POST['horror'];
$action = $_POST['action'];
$scifi = $_POST['scifi'];
$romance = $_POST['romance'];
$animation = $_POST['animation'];

$response = firstLogin($username, $comedy, $horror, $action, $scifi, $romance, $animation);
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

	header("location: successPage.php");
}
else
{
	$errorMSG = "Email already exists";
	echo "$errorMSG";
	error($errorMSG);
	
	header("location: index.php");
}