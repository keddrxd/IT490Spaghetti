<!DOCTYPE HTML>
<html>
<head>
</head>

<?php
session_start();
if( $_SERVER['REQUEST_METHOD'] == 'POST')
{
	if( isset($_POST['login']))
	{
		echo "login successful";
		require 'loginRequest.php'; #change file name
	}
	if(isset($_POST['register']))
	{
		require 'registerRequest.php'; #change file name
	}
}
	

$request = new HttpRequest();
$request->setUrl('https://api.themoviedb.org/3/movie/upcoming');
$request->setMethod(HTTP_METH_GET);

$request->setQueryData(array(
  'page' => '1',
  'language' => 'en-US',
  'api_key' => '<<api_key>>f8b954579281e43ef2cd96c216d57cb2'
));

$request->setBody('{}');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}

?>
<body background="spaghetti.jpg">
<form action = "index.php" method = "POST">
<head>
<style>
div {
    background-color: red;
    width: 300px;
    border: 5px solid black;	    
    padding: 25px;
    margin: 25px;
}
</style>
</head>
<center>
		<div>
		<h2> Returning User? Login </h2> 
		<center>Enter Username <input type= "text" required name="username"/><br><br>
		Enter Password <input type="password" required name="password" /><br><br>
		<button name = "login"> Login </button> 
		</center>
		</div>
	</form>
<form action = "index.php" method = "POST">
<center>
		<div>
		<h2> New User? Sign up </h2>
		<center>Enter First Name <input type= "text" required name="firstName"/><br><br>
		Enter Last Name <input type="text" required name="lastName"  /><br><br>
		Enter Username <input type="text" required name="username" /><br><br>
		Enter Email <input type="email" required name="email" /><br><br>
		Enter Password <input type="password" required name="password" /><br><br>
		Enter Zip Code <input type = "zip" required name = "zip" /> <br> <br>
		<button name = "register"> Register </button>
		</center>
		
		</div>
			
</center>

</form>
</body>
</html>
