<?php
require ('rabbitFunc.php');
$username = $_POST['username'];
$email = $_POST['email'];
$firstN = $_POST['firstName'];
$lastN = $_POST['lastName'];
$pass = $_POST['password'];
$zip = $_POST['zip'];
$response = register($username, $email, $pass, $firstN, $lastN, $zip);

if ($response != false)
{
	$sessionData = json_decode($response, true);
	$_SESSION['isLogged'] = true;
	$_SESSION['username'] = $sessionData['username'];
	$_SESSION['firstName'] = $sessionData['firstName'];
	$_SESSION['lastName'] = $sessionData['lastName'];
	$_SESSION['zip'] = $sessionData['zip'];
	$_SESSION['sessionID'] = $sessionData['sessionID'];
	
	header("location: successPage.php");
}
else
{
	$errorMSG = "Email already exists";
	echo "$errorMSG";
	error($errorMSG);
	
	header("location: index.php");
}
