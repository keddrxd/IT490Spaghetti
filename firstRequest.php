<?php

require ('rabbitFunc.php');
//$username = $_POST['username'];
$username = "0";

if(isset($_POST['comedy'])){
    $comedy  = $_POST['active'];
}
else{
    $comedy = "0";
}

if(isset($_POST['horror'])){
    $horror  = $_POST['horror'];
}
else{
    $horror = "0";
}
if(isset($_POST['action'])){
    $action  = $_POST['action'];
}
else{
    $action = "0";
}
if(isset($_POST['sci-fi'])){
    $scifi  = $_POST['sci-fi'];
}
else{
    $scifi = "0";
}
if(isset($_POST['romance'])){
    $romance  = $_POST['romance'];
}
else{
    $romance = "0";
}
if(isset($_POST['animation'])){
    $animation  = $_POST['animation'];
}
else{
    $animation = "0";
}
//$comedy = $_POST['comedy'];
//$horror = $_POST['horror'];
//$action = $_POST['action'];
//$scifi = $_POST['scifi'];
//$romance = $_POST['romance'];
//$animation = $_POST['animation'];

$response = firstLogin($username, $comedy, $horror, $action, $scifi, $romance, $animation);
//if ($response != false)
//{
	$sessionData = json_decode($response, true);
	$_SESSION['isLogged'] = true;
	$_SESSION['username'] = $sessionData['username'];
	$_SESSION['comedy'] = $sessionData['comedy'];
	$_SESSION['horror'] = $sessionData['horror'];
	$_SESSION['action'] = $sessionData['action'];
	$_SESSION['scifi'] = $sessionData['scifi'];
	$_SESSION['romance'] = $sessionData['romance'];
	$_SESSION['animation'] = $sessionData['animation'];

	header("location: mainPage.php");
//}
//else
//{
//	$errorMSG = "Email already exists";
//	echo "$errorMSG";
//	error($errorMSG);
//	
//	header("location: index.php");
//}

