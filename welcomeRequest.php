<?php
function display()
{
	$host = '25.80.231.148';
	$user = 'admin';
	$pw = 'adminPwd';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);
	$query = "select * from users where username = 'andypoo'";
	$reply = $mysqli->query($query);
	while ($row = $reply->fetch_assoc())
	{
		echo "<br> Your username is: ". row['username'];
		echo "<br> Comedy = ". row['comedy'];
	}
}
?>
