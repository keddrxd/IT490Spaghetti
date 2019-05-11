<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Rotten Spaghetti</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/modern-business.css" rel="stylesheet">

</head>
<?php
session_start();
if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
	if( isset($_POST['login']))
	{
		require 'backend/loginRequest.php';
	}
	if(isset($_POST['register']))
	{
		require 'backend/registerRequest.php';
		reg();
		
	}
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
         
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item active" style="background-image: url(spaghetti.jpg)">
          <div class="carousel-caption d-none d-md-block">
		  <h3 style = "color: navy"> <font size = "200">Rotten Spaghetti </font></h3>
		  <p style = "color: blue">The best movie recommender out there!</p>
          </div>
        
        </div>
      </div>
     
    </div>
  </header>

  
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>

          <div class="card-body">
            <h5 class="card-title text-center">Returning User? Sign in</h5>
              <div class="form-label-group">
				<form action = "index.php" method = "POST">

                <input type="text" required name="username" class="form-control" placeholder="Username" required autofocus> <br>
              
              </div>

             

              <div class="form-label-group">
                <input type="password" required name="password" class="form-control" placeholder="Password" required> <br>
                
              </div>
              
              

              <!--<button name = "login">Sign in</button>-->
		<button class="btn btn-lg btn-primary btn-block text-uppercase" name = "login" type="submit">Sign in</button>
             
              <hr class="my-4">
             
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    <div class="container">
    <div class="row">
      <div class="col-lg-10 col-xl-9 mx-auto">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">New User? Sign up</h5>
              <div class="form-label-group">
			  	<form action = "index.php" method = "POST">

                <input type="text" required name="firstName" class="form-control" placeholder="First Name" required autofocus>
                <br>
              </div>
				<div class="form-label-group">
                <input type="text" required name="lastName" class="form-control" placeholder="Last Name" required autofocus>
            <br>
              </div>
              <div class="form-label-group">
                <input type="email" required name="email" class="form-control" placeholder="Email address" required>
               <br>
              </div>
              
              

              <div class="form-label-group">
                <input type="text" required name="username" class="form-control" placeholder="Username" required>
                <br>
              </div>
              
              <div class="form-label-group">
                <input type="password" required name="password" class="form-control" placeholder="Password" required>
               <br>
              </div>

              <!--<button name = "register">Register</button>-->
		<button class="btn btn-lg btn-primary btn-block text-uppercase" name = "register" type="submit">Register</button>
              
              <hr class="my-4">
             
            </form>
			
          </div>
        </div>
      </div>
    </div>
  </div>
    
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; 2019 Rotten Spaghetti</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
