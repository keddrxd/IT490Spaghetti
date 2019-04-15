<?php
require ('rabbitFunc.php');

$user = $_POST['username'];
$pass = $_POST['password'];
$response = login($user,$pass);
$response1 = userRecc($user);
if( $response != false)
{
	$sessionData = json_decode($response, true);
	$_SESSION['isLogged'] = true;
	$_SESSION['sessionID'] = $sessionData['sessionID'];
	$_SESSION['username'] = $sessionData['username'];
	$_SESSION['firstName'] = $sessionData['firstName'];
	$_SESSION['lastName'] = $sessionData['lastName'];
	$_SESSION['zip'] = $sessionData['zip'];
	$sessionData1 = json_decode($response1, true);
	$_SESSION['comedy'] = $sessionData1['comedy'];
	$_SESSION['horror'] = $sessionData1['horror'];
	$_SESSION['action'] = $sessionData1['action'];
	$_SESSION['scifi'] = $sessionData1['scifi'];
	$_SESSION['romance'] = $sessionData1['romance'];
	$_SESSION['animation'] = $sessionData1['animation'];
	header("location: mainPage.php");
}
else
{
	$errorMSG = "Login Unsucessful";
	$response1 = error($errorMSG);
	echo "$errorMSG";
	//error($errorMSG);
	header("location: index.php");
}

	
	
