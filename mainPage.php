<!DOCTYPE HTML>
<html>
<head>
</head>

	
	
<?php
session_start();
//require ('rabbitFunc.php');
//require 'movieDB.php';
$comedy = $_SESSION['comedy'];
$horror = $_SESSION['horror'];
$action = $_SESSION['action'];
$scifi = $_SESSION['scifi'];
$romance = $_SESSION['romance'];
$animation = $_SESSION['animation'];
$comedyRd = $_SESSION['comedyRd'];
$horrorRd = $_SESSION['horrorRd'];
$actionRd = $_SESSION['actionRd'];
$scifiRd = $_SESSION['scifiRd'];
$romanceRd = $_SESSION['romanced'];
$animationRd = $_SESSION['animationRd'];
echo "Hello ".$_SESSION['username'];
echo "<br>";
$num = 3;
	
if($comedy !== "")
{
	echo "<br><br> Here are some comedy movies you may like:<br>";
	for($i = 0 ; $i < $num ; $i++)
	{
		if($_SESSION['comedyArray'][$i] !== "")
		{
			echo "<br>".$_SESSION['comedyArray'][$i];
			if($_SESSION['comedyRd'][$i] !=="")
			{
				echo " and it will be released on: ".$_SESSION['comedyRd'][$i];
			}
		}
	}	
}
if($horror !== "")
{
	echo "<br><br> Here are some horror movies you may like:<br>";
	for($i = 0 ; $i < $num ; $i++)
	{
		if($_SESSION['horrorArray'][$i] !== "")
		{
			echo "<br>".$_SESSION['horrorArray'][$i];
			if($_SESSION['horrorRd'][$i] !== "")
			{
				echo " and it will be released on: ".$_SESSION['horrorRd'][$i];
			}
		}
	}	
}
if($action !== "")
{
	echo "<br>Here are some action movies you may like:<br>";
	for($i = 0 ; $i < $num ; $i++)
	{
		echo "<br>".$_SESSION['actionArray'][$i];
		if($_SESSION['actionRd'][$i] !== "")
		{
			echo " and it will be released on: ".$_SESSION['actionRd'][$i];
		}
	}	
}
	
if($scifi !== "")
{
	echo "<br>Here are some sci-fi movies you may like:<br>";
	for($i = 0 ; $i < count($_SESSION['scifiArray']) ; $i++)
	{
		echo "<br>".$_SESSION['scifiArray'][$i];
		if($_SESSION['scifiRd'][$i] !== "")
		{
			echo " and it will be released on: ".$_SESSION['scifiRd'][$i];
		}
	}	
}
	
if($romance !== "")
{
	echo "<br>Here are some romance movies that you may like:<br>";
	for($i = 0 ; $i < $num ; $i++)
	{
		echo "<br>".$_SESSION['romanceArray'][$i];	
		if($_SESSION['romanceRd'][$i] !== "")
		{
			echo " and it will be released on: ".$_SESSION['romanceRd'][$i];
		}
	}	
}
	
if($animation !== "")
{
	echo "<br>Here are some animation movies you may like:<br>";
	for($i = 0 ; $i < $num ; $i++)
	{
		echo "<br>".$_SESSION['animationArray'][$i];	
		if($_SESSION['animationRd'][$i] !== "")
		{
			echo " and it will be released on: ".$_SESSION['animationRd'][$i];
		}
	}	
}
$num2 = 4;
echo "<br>Your friends are:";
for($i = 1 ; $i < $num2 ; $i++)
{
	if($_SESSION['getFriends'][$i] !== "")
	{
		echo "<br>".$_SESSION['getFriends'][$i];
		//echo " and it will be released on: ".$_SESSION['scifiRd'][$i];
	}
}

	
//echo "Here are comedy movies you may like: ".$_SESSION['comedyArray'];
//$user = $_SESSION['username'];
//require ('server.php');
//movieRec($user);
//echo "Hello ".$_SESSION['comedy'];
//echo "<br> Your favorite categories are: <br>";
//echo "$comedy<br>";
//echo "$horror<br>";
//echo "$action<br>";
//echo "$scifi<br>";
//echo "$romance<br>";
//echo "$animation<br>";
/*if($comedy !== "")
{
	echo "$comedy<br>";	
}
if($horror !== "")
{
	echo "$horror<br>";	
}
if($action !== "")
{
	echo "$action<br>";	
}	
if($scifi !== "")
{
	echo "$scifi<br>";	
}		
if($romance !== "")
{
	echo "$romance<br>";	
}
if($animation !== "")
{
	echo "$animation<br>";	
}
*/
	
	
if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
	if( isset($_POST['logout']))
	{
			session_destroy();
		//echo "login successful";
		//require 'loginRequest.php'; #change file name
	}
	if(isset($_POST['register']))
	{
		//require 'registerRequest.php'; #change file name
		//reg()
	}
	if(isset($_POST['first']))
	{
		require 'backend/firstRequest.php'; #change file name
		
	}
	if(isset($_POST['friend']))
	{
		require 'backend/friendsList.php'; #change file name
		/*echo "HELLO THIS IS A TEST";
		$num = 4;
		$friend = array();
		for($i = 0 ; $i < $num ; $i++)
		{
			echo "<br>".$_SESSION['friendsList'][$i];
			//echo " and it will be released on: ".$_SESSION['scifiRd'][$i];
		}	
		for($i = 0; $i < $num; $i++)
		{
			$friend[$i] = $_SESSION['friendsList'][$i];
			
		}
		for($i = 0; $i < $num; $i++)
		{
			echo $friend[$i];	
		}
		//echo "<br>".$_SESSION['friendsList'][1];
		for($i = 0 ; $i < 10 ; $i++)
		{
			if($_SESSION['friendsList'][$i] == $_POST['username'])
			{
				echo "<br>".$_SESSION['friendsList'][$i];
				$person = $_SESSION['friendsList'][$i];
			}
		}*/
	}
	//echo "<br>".$_SESSION['friendsList'][1];
}
	
?>

<body background="spaghetti.jpg">

<head>
<style>
<div id="container">
   <div id="title"></div>
   <div id="logout"> </div>
   <div id="body"></div>
   
   <div id="map"></div>
</div>
#title {
    background-color: clear;
    width: 900px;
    border: clear;	    
    padding: 25px;
    margin: 25px;
}
#logout {
	margin-left: 600px;
    margin-top: -75px;s4e1s
margin-right: 75px;	
    width: 84px;
    height: 40px;   
    font-size:14px;
    font-weight:700;
    background-color: clear;
}
#box {
    background-color: light grey;
    width: 300px;
    border: 5px solid black;	    
    padding: 25px;
    margin: 25px;
}
#body {
	margin-left: 75px;
    margin-top: 125px;
	margin-right: 75px;
    width: 1200px;
    height: 750px;   
    font-size:14px;
    font-weight:700;
    background-color:light gray;
}
#map {
    background-color: clear;
    width: 500px;
    border: clear;	    
    padding: 25px;
	height: 500px;   
	margin-left:75px;
    margin-top: 100px;
	margin-right: 75px;
}
</style>
</head>
<center>
		<div id = "title">
		<h1><font size="20" face = "courier" color = "red">Welcome to Rotten Spaghetti!</font></h1> 
		<marquee 
 
			 direction="right"
			 loop="7"
			 scrollamount="1"
			 scrolldelay="2"
			 behavior="alternate"
			 width="60%"
			 background-color: clear;
			 
			 >
		The best movie recommender out there!
		</marquee>
		</center>
		</div>
	
<?php  

$friend = $_POST['user'];
$hi = "Hello there";
$test = "test";
echo "<table border=1 cellspacing=0 cellpading=0>  
<tr> <td><font color=blue>Friends List</td> </tr>    
<tr> <td><font color=blue>$friend</td> </tr>
</table>";  
//echo $friends;

/*$num = 4;
$friends = array();
$friends[0] = $_POST['user'];
$test = $friends[0];*/
//$friend = $_SESSION['friendsList'][1];
//$friends[] = $_SESSION['friendsList'];
/*for($i = 0 ; $i < $num ; $i++)
{
	$friends[$i] = $_SESSION['friendsList'][$i];
	//echo "<br>".$_SESSION['friendsList'][$i];
}*/
	
	
/*for($i = 0 ; $i < $num ; $i++)
{
	$friends[] = $_SESSION['friendsList'][$i];
	
}*/
?>  
	
	<form action = "mainPage.php" method="POST">
  Add a Friend!<br>
  <input type="text" name="user" placeholder="username" method="POST">
  <br>
<!--<input type="submit" value="Submit">-->
<button name = "friend" style = "height:50px;width:80px"><font size = 4> Submit </font></button>
</form> 


		
	<form action="index.php" >

		<div id = "logout">
		<button name = "logout" style = "height:50px;width:80px"><font size = 4> Logout </font></button>
		</div>
	</form>
		
		<div id = "body">
		<h2><font size="10" face = "courier" color = "black">Hello, User!</font></h2> 
		</div>
		<div id = "box">
			<center>
			<p> Click below to buy tickets from Fandango.com </p> 
		<a href="http://www.fandango.com/Redirect.aspx?wss=link88x31" border="0"><img src="https://images.fandango.com/redesign/areas/registration/img/worry-free-tickets-oj.svg" width="100" height="100" border="0" alt="Find Theater Showtimes" /></a>

		</center>
		</div>
		<div id= "map">
		<center>
		<div id="mapSize" style="width:500px;height:500px;"></div>

			<script>
			var map;
			var infowindow;
			var request;
			var service;
			var markers = [];
			function initMap()
			{
				var center = new google.maps.LatLng(40.7423385, -74.1815296);
				map = new google.maps.Map(document.getElementById('map'),{
				center:center,
				zoom:13
				});
				request = {
					location:center,
					radius:15000,
					//types:['cinema']
					query: 'Movies'
				};
				infowindow = new google.maps.InfoWindow();
				service = new google.maps.places.PlacesService(map);
				service.textSearch(request, callback);
				google.maps.event.addListener(map, 'rightclick', function(event)
				{
						map.setCenter(event.latLng);
						clearResults(markers);
						var requests = {
							location:event.latLng,
							radius:15000,
							query:'Movies'
						};
						service.textSearch(requests, callback);
				})
			}
				function callback(results, status)
				{
					if (status == google.maps.places.PlacesServiceStatus.OK)
					{
							for (var i = 0; i < results.length; i++)
							{
								markers.push(createMarker(results[i]));
							}
					}
				}
				function createMarker(place)
				{
					var placeLoc = place.geometry.location;
					var marker = new google.maps.Marker
					({
						map:map,
						position:place.geometry.location
					});
					google.maps.event.addListener(marker, 'click', function(){
						infowindow.setContent(place.name);
						infowindow.setContent(place.url);
						infowindow.open(map, this);
					});
					return marker;
				}
				function clearResults(markers)
				{
					for (var m in markers)
					{
							markers[m].setMap(null)
					}
					markers = []
				}
			google.maps.event.addDomListener(window, 'load', initMap);
			</script>

			   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCG-Yqq4X1St3Inbo1WpKkzk6TAbHjkYzI&libraries=places&callback=initMap" async defer></script>
			   </center>
		</div>
		
</center>
</body>
</html>
