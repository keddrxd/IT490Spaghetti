<?php
	$host = '25.80.231.148';
	$user = 'aalap';
	$pw = 'password';
	$db = 'usersDB';
	$mysqli = new mysqli($host, $user, $pw, $db); 
	if (mysqli_connect_errno($mysqli))
  	{
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
          exit();
  	}
    function display($username){
		//$s = mysqli_query($mysqli, "SELECT * FROM category WHERE username = $user");
		$s = mysqli_query($mysqli, "Select * from category where category.username = '$username'");
		//$s = mysqli_query($mysqli, "select * from category where username ='".$_SESSION['username']."'");

		while ($row = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
			$username = $row["username"];
			$comedy = $row["comedy"];
			$horror = $row["horror"];
			$action = $row["action"];
			$scifi = $row["scifi"];
			$romance = $row["romance"];
			$animation = $row["animation"];
		}
		echo "<br>Hello $username !<br>";
		echo "Your favorite categories are: <br>";
		if($comedy !== '0'){
			echo "$comedy<br>";	
		}
		if($horror !== '0'){
			echo "$horror<br>";	
		}
		if($action !== '0'){
			echo "$action<br>";	
		}
		if($scifi !== '0'){
			echo "$scifi<br>";	
		}
		if($romance !== '0'){
			echo "$romance<br>";	
		}
		if($animation !== '0'){
			echo "$animation<br>";	
		}
   }
	
?>
