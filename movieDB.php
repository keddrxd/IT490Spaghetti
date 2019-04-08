<?php
	session_start();

	$host = '127.0.0.1';
	$user = 'aalap';
	$pw = 'password';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db);

	$comedy = $_SESSION['comedy'];
	$horror = $_SESSION['horror'];
	$action = $_SESSION['action'];
	$scifi = $_SESSION['scifi'];
	$romance = $_SESSION['romance'];
	$animation = $_SESSION['animation'];

	if($comedy == "comedy")
	{
		$query1 = "select * from comedy";
		$reply1 = $mysqli->query($query1);
		echo "Here are some comedy movies you may like:";
		while($row = $reply1->fetch_assoc())
		{
			echo $row;	
		}
	}

	if($horror == "horror")
	{
		$query2 = "select * from horror";
		$reply2 = $mysqli->query($query2);
		echo "Here are some horror movies you may like:";
		while($row = $reply2->fetch_assoc())
		{
			echo $row;	
		}
	}

	if($action == "action")
	{
		$query3 = "select * from action";
		$reply3 = $mysqli->query($query3);
		echo "Here are some action movies you may like:";
		while($row = $reply3->fetch_assoc())
		{
			echo $row;	
		}
	}

	if($scifi == "scifi")
	{
		$query4 = "select * from scifi";
		$reply4 = $mysqli->query($query4);
		echo "Here are some sci-fi movies you may like:";
		while($row = $reply4->fetch_assoc())
		{
			echo $row;	
		}
	}

	if($romance == "romance")
	{
		$query5 = "select * from romance";
		$reply5 = $mysqli->query($query5);
		echo "Here are some romance movies you may like:";
		while($row = $reply5->fetch_assoc())
		{
			echo $row;	
		}
	}

	if($animation == "animation")
	{
		$query6 = "select * from animation";
		$reply6 = $mysqli->query($query6);
		echo "Here are some animation movies you may like:";
		while($row = $reply6->fetch_assoc())
		{
			echo $row;	
		}
	}




?>
