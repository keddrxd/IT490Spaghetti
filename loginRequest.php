<?php
require ('rabbitFunc.php');

$user = $_POST['username'];
$pass = $_POST['password'];
$response = login($user,$pass);
if( $response != false)
{
	$sessionData = json_decode($response, true);
	$_SESSION['isLogged'] = true;
	$_SESSION['sessionID'] = $sessionData['sessionID'];
	$_SESSION['username'] = $sessionData['username'];
	$_SESSION['firstName'] = $sessionData['firstName'];
	$_SESSION['lastName'] = $sessionData['lastName'];
	$_SESSION['zip'] = $sessionData['zip'];
	
	header("location: mainPage.php");
}
else
{
	$errorMSG = "Login Unsucessful";
	//$response1 = error($errorMSG);
	echo "$errorMSG";
	//error($errorMSG);
	header("location: index.php");
}

	
	
