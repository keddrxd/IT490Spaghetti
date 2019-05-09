<!DOCTYPE html>
<html lang="en">

<head>
<?php
session_start();
if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
	if( isset($_POST['login']))
	{
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
}
?>

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
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
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
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Please tell us what you may like:</h1>
	<form action = "moviePage.php" method = "POST">

    
    <!-- Portfolio Section -->

    <div class="row">
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BZDQwMjNiMTQtY2UwYy00NjhiLTk0ZWEtZWM5ZWMzNGFjNTVkXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_.jpg" alt=""></a>
          <br><center><input type="checkbox" name="comedy" value="comedy"></center><br>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
         <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BNDYxNjQyMjAtNTdiOS00NGYwLWFmNTAtNThmYjU5ZGI2YTI1XkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_SY1000_CR0,0,675,1000_AL_.jpg" alt=""></a>
          <br><center><input type="checkbox" name="action" value="action"></center><br>
		 <div class="card-body">
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
         <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BZjMxYzBiNjUtZDliNC00MDAyLTg3N2QtOWNjNmNhZGQzNDg5XkEyXkFqcGdeQXVyNjE2MjQwNjc@._V1_.jpg" alt=""></a>
          <br><center><input type="checkbox" name="animation" value="animation"></center><br>
		  <div class="card-body">
            
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BYTRhNjcwNWQtMGJmMi00NmQyLWE2YzItODVmMTdjNWI0ZDA2XkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_SY999_SX666_AL_.jpg" alt=""></a>
          <br><center><input type="checkbox" name="sci-fi" value="sci-fi"></center><br>
		  <div class="card-body">
         
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
         <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BMDdmZGU3NDQtY2E5My00ZTliLWIzOTUtMTY4ZGI1YjdiNjk3XkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_SY1000_CR0,0,671,1000_AL_.jpg" alt=""></a>
          <br><center><input type="checkbox" name="romance" value="romance"></center><br>
		  <div class="card-body">
            <h4 class="card-title">
              
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
         <img class="card-img-top" src="https://m.media-amazon.com/images/M/MV5BMTYyOTAxMDA0OF5BMl5BanBnXkFtZTcwNzgwNTc1NA@@._V1_SY1000_CR0,0,675,1000_AL_.jpg" alt=""></a>
          <br><center><input type="checkbox" name="horror" value="horror"></center><br>
		  <div class="card-body">
            <h4 class="card-title">
             
          </div>
        </div>
      </div>
	  <button name = "first">Submit</button>
	      <!--<a class="btn btn-lg btn-secondary btn-block" name = "first" href="#">Submit</a>-->
    </div>
    <!-- /.row -->

    

    <hr>

    <!-- Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">
        
      </div>
      <div class="col-md-4">
	  	
		
	<!--<button name = "first" style = "height:50px;width:80px"><font size = 4> Submit </font></button>-->
	     
		
        <!--<a class="btn btn-lg btn-secondary btn-block" name = "first" href="#">Submit</a>-->
		
      </div>
    </div>
	
  </div>
  

  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; 2019 Rotten Spaghetti</p>
	    <p class="m-0 text-center text-white"> Shoutout to themoviedb.org for the rights to their API </p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</form>
</body>

</html>
