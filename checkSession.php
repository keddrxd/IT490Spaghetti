<?php
require ('rabbitFunc.php');
$userName= $_SESSION['username'];
$sessionID= $_SESSION['sessionID'];
$response = validateSession($userName, $sessionID);
if ($response != false)#auth works
{
	echo "Congrats!";
}
else
{
	sleep(5);
	header("location: ../index.php");
}
