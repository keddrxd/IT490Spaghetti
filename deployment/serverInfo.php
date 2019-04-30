#!/usr/bin/php
<?php
global $argv;

$serverType = $argv[1];
$packageVersion = $argv[2];
$tierLevel = $argv[3];

$host = 'localhost';
$user = 'adam';
$pass = 'deployPass';
$db = 'versionControl';

$mysqli = new mysqli($host,$user,$pass,$db);
if ($mysqli->connect_error)
{
	die('Connection Error.');
}

if ($tierLevel == "ipAddress")
{
	$query = "select * from machineIP where serverName = '$serverType' and tierType = '$tierLevel'";
	$package = $mysqli->query($query);
	$package = $package->fetch_assoc();
	echo $package['ipAddress'];
}
if ($tierLevel == "serverName")
{
	$query = "select * from machineIP where serverName = '$serverType' and tierType = '$tierLevel'";
	$package = $mysqli->query($query);
	$package = $package->fetch_assoc();
	echo $package['serverName'];
}

?>
