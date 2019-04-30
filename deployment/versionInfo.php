#!/usr/bin/php

<?php
global $argv;

$serverType = $argv[1];
$packageVersion = $argv[2];

$host = 'localhost';
$user = 'adam';
$pass = 'deployPass';
$db = 'versionControl';

$mysqli = new mysqli($host,$user,$pass,$db);
if ($mysqli->connect_error)
{
	die('Connection Error.');
}

if ($packageVersion == "newest")
{
	$query = "select verName from version ='$serverType' and status = 'pending' order by verName";
	$package = $mysqli->query($query);
	$package = $package->fetch_assoc();
	echo $package['package'];
}
elseif ($packageVersion == "good")
{
	$query = "select verName from version ='$serverType' and status = 'good' order by verName desc limit 1 ";
	$package = $mysqli->query($query);
	$package = $package->fetch_assoc();
	echo $package['package'];
}
elseif ($packageVersion == "rollback")
{
	
	$query = "select verName from version ='$serverType' and status = 'pending' order by verName";
	$package = $mysqli->query($query);
	$package = $package->fetch_assoc();
	echo $package['package'];
}
else
{
	echo "$packageVersion";
}
?>
