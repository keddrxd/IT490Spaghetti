<?php
require ('rabbitFunc.php');

$username = $_SESSION['username'];

$response = friends($username);

if($response != false)
{
	  $sessionData = json_decode($response, true);
    $_SESSION['friendList'] = array();
    $num = 5;
    for($i = 0 ; $i < $num ; $i++)
    {
      $_SESSION['friendsList'][$i] = $sessionData[$i];
    }

}








?>
