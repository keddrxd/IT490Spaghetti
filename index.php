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
?>
<body background="spaghetti.jpg">
<form action = "index.php" method = "POST">
<head>
<center>

<h1 style="font-size:60px; " >Welcome to Rotten Spaghetti</h1>
<h1 style="font-size:40px; " >Your Personal Movie Recommender</h1>
</center>
<style>
div {
    background-color: silver;
    width: 300px;
    border: 5px solid black;	    
    padding: 25px;
    margin: 25px;
}
</style>
</head>
<center>
		<div>
		<h3> Returning User? Login </h3> 
		<center>Enter Username <input type= "text" required name="username"/><br><br>
		Enter Password <input type="password" required name="password" /><br><br>
		<button name = "login"> Login </button> 
		</center>
		</div>
	</form>
<formaction = "register.php" method = "POST">
<center>
		<div>
		<h3> New User? </h3>
	
		<button name = "register"> Register here </button>
		<!-- <button type = "submit" formaction = "register.php"> Register here </button> -->
		</center>
		
		</div>
			
</center>

</form>
</body>
</html>
