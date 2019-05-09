<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Movie Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

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
<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.html">Rotten Spaghetti</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
	  
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
		  <form action="index.php" >
		  <button name = "logout" style = "height:50px;width:80px"><font size = 4> Logout </font></button>
		  </form>
            <!--<a class="nav-link " href="#" id="navbarDropdownBlog" data-toggle="dropdown" name = "logout" aria-haspopup="true" aria-expanded="false">
              Log Out
            </a>-->
            
            </div>
          </li>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

 <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url(spaghetti.jpg)">
          <div class="carousel-caption d-none d-md-block">
            <h3>Welcome to Rotten Spaghetti</h3>
            <p>The best movie recommender out there!</p>
          </div>
        
        </div>
      </div>

    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <!--<h1 class="my-4">Here is your Movie Profile</h1>-->
    <?php
		session_start();
		//require ('rabbitFunc.php');
		//require 'movieDB.php';
		$user = $_SESSION['username'];
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
		echo "<b><div style ='font:40px Courier;color:#000000'>Hey $user</div></b>";
	  	echo "! Here's your movie profile!";
		echo "<br>";
		$num = 3;
		echo "Based on your choices, here are some upcoming movies we recommend you see:<br><br>";	
		if($comedy !== "")
		{
			//echo "<br><br> Here are some comedy movies you may like:<br>";
			for($i = 0 ; $i < count($_SESSION['comedyArray']) ; $i++)
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
			//echo "<br><br> Here are some horror movies you may like:<br>";
			for($i = 0 ; $i < count($_SESSION['horrorArray']) ; $i++)
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
			//echo "<br>Here are some action movies you may like:<br>";
			for($i = 0 ; $i < count($_SESSION['actionArray']) ; $i++)
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
			//echo "<br>Here are some sci-fi movies you may like:<br>";
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
			//echo "<br>Here are some romance movies that you may like:<br>";
			for($i = 0 ; $i < count($_SESSION['romanceArray']) ; $i++)
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
			//echo "<br>Here are some animation movies you may like:<br>";
			for($i = 0 ; $i < count($_SESSION['animationArray']) ; $i++)
			{
				echo "<br>".$_SESSION['animationArray'][$i];	
				if($_SESSION['animationRd'][$i] !== "")
				{
					echo " and it will be released on: ".$_SESSION['animationRd'][$i];
				}
			}	
		}
		$num2 = 4;
		echo "<br><br><div style ='font:21px Courier;color:#000000'> Your friends are: </div>";
		#echo '<style = "font-color: #ff0000"> Your friends are: </style>';
		#echo "<br><br><br><br>Your friends are:";
		for($i = 1 ; $i < $num2 ; $i++)
		{
			if($_SESSION['getFriends'][$i] !== "")
			{
				echo "<br>".$_SESSION['getFriends'][$i];
				/*echo "<table border=1 cellspacing=0 cellpading=0>  
				<tr> <td><font color=blue>Friends List</td> </tr>    
				<tr> <td><font color=blue>Hello</td> </tr>
				</table>"; */
				//echo " and it will be released on: ".$_SESSION['scifiRd'][$i];
			}
		}
		
	?>
	  <form action = "mainPage.php" method = "POST">
	 <br><br><br>Add a Friend!<br>
		  <input type="text" name="user" placeholder="username" method="POST">
		  <br>
		<!--<input type="submit" value="Submit">-->
		<button name = "friend">Submit</button>
		<!--<button name = "friend" style = "height:50px;width:80px"><font size = 4> Submit </font></button>-->
	  </form>
    </div>
    <!-- /.row -->

    <!-- Portfolio Section -->
  

    <div class="row">
      <center>
      <div class="col-lg-4 col-sm-6 portfolio-item">
	  
        <div class="card h-100">
         <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/23/Fandango_2014.svg/1200px-Fandango_2014.svg.png" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="http://www.fandango.com/Redirect.aspx?wss=link88x31">Buy Tickets</a>
            </h4>
            <p class="card-text">Buy your movie tickets from Fandango.com</p>
          </div>
        </div>
		</center>
      </div>
     
      
      
      
        </div>
      </div>
    </div>
    <!-- /.row -->

    <!-- Features Section -->
    <div class="row">
      <div class="col-lg-6">
        <h2> <center> Find Your Theater </center></h2>
        <p><center> To use the map you can drag the map to whatever city/town you live in and once you right click the map it will refresh and show you movie theaters in that area. Each red marker indicates a movie theater in that area. The radius is 15 miles. </center> </p> 
		
      </div>
      <div class="col-lg-6">
        <div id="map" style="width:600px;height:450px;"></div>
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
				radius:25000,
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
      </div>
    </div>
    <!-- /.row -->

    <hr>

    
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Rotten Spaghetti 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
