<?php
require ('loginRBMQ.php');

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
	
	header("location: successPage.php");
}
else
{
	$errorMSG = "Login Unsucessful";
	echo "$errorMSG";
	
	header("location: index.php");
}

	
	