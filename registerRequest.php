<?php
require ('loginRBMQ.php');
$username = $_POST['username'];
$email = $_POST['email'];
$firstN = $_POST['firstName'];
$lastN = $_POST['lastName'];
$pass = $_POST['password'];
$response = register($username, $email, $pass, $firstN, $lastN);

if ($response != false)
{
	$sessionData = json_decode($response, true);
	$_SESSION['isLogged'] = true;
	$_SESSION['username'] = $sessionData['username'];
	$_SESSION['firstName'] = $sessionData['firstname'];
	$_SESSION['lastName'] = $sessionData['lastname'];
	$_SESSION['sessionID'] = $sessionData['sessionID'];
	
	header("location: successPage.php");
}
else
{
	$errorMSG = "Email already exists";
	echo "$errorMSG";
	
	
	header("location: index.php");
}
