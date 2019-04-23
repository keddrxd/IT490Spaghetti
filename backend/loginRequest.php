<?php
/*require ('rabbitFunc.php');

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
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['comedyArray'][$i] = $sessionData1[$i];
	}
	
	$sessionData2 = json_decode($response2, true);
	$_SESSION['horrorArray'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['horrorArray'][$i] = $sessionData2[$i];
	}
	
	$sessionData3 = json_decode($response3, true);
	$_SESSION['actionArray'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['actionArray'][$i] = $sessionData3[$i];
	}
	
	$sessionData4 = json_decode($response4, true);
	$_SESSION['scifiArray'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['scifiArray'][$i] = $sessionData4[$i];
	}
	
	$sessionData5 = json_decode($response5, true);
	$_SESSION['romanceArray'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['romanceArray'][$i] = $sessionData5[$i];
	}
	
	$sessionData6 = json_decode($response6, true);
	$_SESSION['animationArray'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['animationArray'][$i] = $sessionData6[$i];
	}
	
	
	
	
	
	
	header("location: mainPage.php");
}
else
{
	//$date = date("Y-m-d");
	//$today = date("d/m/Y");
	//echo $today;
	$errorMSG = "Login Unsucessful <br>";
	$response7 = error($errorMSG);
	$response8 = comRd($errorMSG);
	echo "$errorMSG";
	//error($errorMSG);
	header("location: index.php");
}

	
	
