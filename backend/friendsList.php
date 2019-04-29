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
$response1 = comRecc($username);
$response2 = horRecc($username);
$response3 = actRecc($username);
$response4 = sciRecc($username);
$response5 = romRecc($username);
$response6 = aniRecc($username);
$response7 = comRd($username);
$response8 = horRd($username);
$response9 = actRd($username);
$response10 = sciRd($username);
$response11 = romRd($username);
$response12 = aniRd($username);
$result = array();
$result = $response1;
$arrayLength = count($result);
/*$host = '127.0.0.1';
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
*/
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
	
	$sessionData7 = json_decode($response7, true);
	$_SESSION['comedyRd'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['comedyRd'][$i] = $sessionData7[$i];
	}
	
	$sessionData8 = json_decode($response8, true);
	$_SESSION['horrorRd'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['horrorRd'][$i] = $sessionData8[$i];
	}
	
	$sessionData9 = json_decode($response9, true);
	$_SESSION['actionRd'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['actionRd'][$i] = $sessionData9[$i];
	}
	
	$sessionData10 = json_decode($response10, true);
	$_SESSION['scifiRd'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['scifiRd'][$i] = $sessionData10[$i];
	}
	
	$sessionData11 = json_decode($response11, true);
	$_SESSION['romanceRd'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['romanceRd'][$i] = $sessionData11[$i];
	}
	
	$sessionData12 = json_decode($response12, true);
	$_SESSION['animationRd'] = array();
	for($i = 0 ; $i < $num ; $i++)
	{
		$_SESSION['animationRd'][$i] = $sessionData12[$i];
	}
	
	/*$i = 0;
	foreach($result as $key=>$value)
	{
     		//print "$key holds $value\n";
		$_SESSION['comedyArray'][$i] = $value;
		$i++;
	}*/	
	//$i = 0;
	//foreach ($result as $value)
	//{
		//$_SESSION['comedyArray'][$i] = $value;
		//$i++;
		
	//}
	//$_SESSION['comedyArray'] = $sessionData1['comedyArray'];
	
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
