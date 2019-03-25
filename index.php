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
		require 'loginRequest.php'; #change file name
	}
	if(isset($_POST['register']))
	{
		require 'registerRequest.php'; #change file name
		reg();
		
	}
}
?>
<body background="spaghetti.jpg">
<form action = "index.php" method = "POST">
<head>
<center>
<h1> Welcome to Rotten Spaghetti </h1>
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
		<button name = "register"> Register </button>
		</center>
		
		</div>
			
</center>

</form>
</body>
</html>
