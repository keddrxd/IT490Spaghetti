<?php
require ('rabbitFunc.php');

$user = $_POST['username'];
$pass = $_POST['password'];
$response = login($user,$pass);
$response11 = userRecc($user);
$response1 = comRecc($user);
$response2 = horRecc($user);
$response3 = actRecc($user);
$response4 = sciRecc($user);
$response5 = romRecc($user);
$response6 = aniRecc($user);
$response7 = comRd($user);
$response8 = horRd($user);
$response9 = actRd($user);
$response10 = sciRd($user);
$response13 = romRd($user);
$response12 = aniRd($user);
$response20 = getFriends($user);

if( $response != false)
{
	$sessionData = json_decode($response, true);
	$_SESSION['isLogged'] = true;
	$_SESSION['sessionID'] = $sessionData['sessionID'];
	$_SESSION['username'] = $sessionData['username'];
	$_SESSION['firstName'] = $sessionData['firstName'];
	$_SESSION['lastName'] = $sessionData['lastName'];
	$_SESSION['zip'] = $sessionData['zip'];
	$sessionData11 = json_decode($response11, true);
	$_SESSION['comedy'] = $sessionData11['comedy'];
	$_SESSION['horror'] = $sessionData11['horror'];
	$_SESSION['action'] = $sessionData11['action'];
	$_SESSION['scifi'] = $sessionData11['scifi'];
	$_SESSION['romance'] = $sessionData11['romance'];
	$_SESSION['animation'] = $sessionData11['animation'];
	
	$sessionData1 = json_decode($response1, true);
	$_SESSION['comedyArray'] = array();
	$num = 3;
	for($i = 0 ; $i < count($sessionData1) ; $i++)
	{
		$_SESSION['comedyArray'][$i] = $sessionData1[$i];
	}
	
	$sessionData2 = json_decode($response2, true);
	$_SESSION['horrorArray'] = array();
	for($i = 0 ; $i < count($sessionData2) ; $i++)
	{
		$_SESSION['horrorArray'][$i] = $sessionData2[$i];
	}
	
	$sessionData3 = json_decode($response3, true);
	$_SESSION['actionArray'] = array();
	for($i = 0 ; $i < count($sessionData3) ; $i++)
	{
		$_SESSION['actionArray'][$i] = $sessionData3[$i];
	}
	
	$sessionData4 = json_decode($response4, true);
	$_SESSION['scifiArray'] = array();
	for($i = 0 ; $i < count($sessionData4); $i++)
	{
		$_SESSION['scifiArray'][$i] = $sessionData4[$i];
	}
	
	$sessionData5 = json_decode($response5, true);
	$_SESSION['romanceArray'] = array();
	for($i = 0 ; $i < count($sessionData5) ; $i++)
	{
		$_SESSION['romanceArray'][$i] = $sessionData5[$i];
	}
	
	$sessionData6 = json_decode($response6, true);
	$_SESSION['animationArray'] = array();
	for($i = 0 ; $i < count($sessionData6) ; $i++)
	{
		$_SESSION['animationArray'][$i] = $sessionData6[$i];
	}
	$num2 = 4;
	$sessionData20 = json_decode($response20, true);
	$_SESSION['getFriends'] = array();
	for($i = 0 ; $i < $num2 ; $i++)
	{
		$_SESSION['getFriends'][$i] = $sessionData20[$i];
	}
	
	$sessionData7 = json_decode($response7, true);
	$_SESSION['comedyRd'] = array();
	for($i = 0 ; $i < count($sessionData7) ; $i++)
	{
		$_SESSION['comedyRd'][$i] = $sessionData7[$i];
	}
	
	$sessionData8 = json_decode($response8, true);
	$_SESSION['horrorRd'] = array();
	for($i = 0 ; $i < count($sessionData8) ; $i++)
	{
		$_SESSION['horrorRd'][$i] = $sessionData8[$i];
	}
	
	$sessionData9 = json_decode($response9, true);
	$_SESSION['actionRd'] = array();
	for($i = 0 ; $i < count($sessionData9) ; $i++)
	{
		$_SESSION['actionRd'][$i] = $sessionData9[$i];
	}
	
	$sessionData10 = json_decode($response10, true);
	$_SESSION['scifiRd'] = array();
	for($i = 0 ; $i < count($sessionData10) ; $i++)
	{
		$_SESSION['scifiRd'][$i] = $sessionData10[$i];
	}
	
	$sessionData13 = json_decode($response13, true);
	$_SESSION['romanceRd'] = array();
	for($i = 0 ; $i < count($sessionData13) ; $i++)
	{
		$_SESSION['romanceRd'][$i] = $sessionData13[$i];
	}
	
	$sessionData12 = json_decode($response12, true);
	$_SESSION['animationRd'] = array();
	for($i = 0 ; $i < count($sessionData12) ; $i++)
	{
		$_SESSION['animationRd'][$i] = $sessionData12[$i];
	}
	
	
	
	
	header("location: mainPage.php");
}
else
{
	//$date = date("Y-m-d");
	//$today = date("d/m/Y");
	//echo $today;
	$errorMSG = "Login Unsucessful   ";
	$response7 = error($errorMSG);
	//$response8 = comRd($errorMSG);
	echo "$errorMSG";
	//error($errorMSG);
	header("location: index.php");
}

	
	
