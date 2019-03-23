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
		
</form>
<!--<form action = "moviePage.php" method = "POST"> -->
<center>
		<div>
		<h2> Please Register Below </h2>
		<center>Enter First Name <input type= "text" required name="firstName"/><br><br>
		Enter Last Name <input type="text" required name="lastName"  /><br><br>
		Enter Username <input type="text" required name="username" /><br><br>
		Enter Email <input type="email" required name="email" /><br><br>
		Enter Password <input type="password" required name="password" /><br><br>
		Enter Zip Code <input type = "zip" required name = "zip" /> <br> <br>
		<button type = "submit" formaction = "moviePage.php" method = "POST"> Register </button> 
		</center>
		
		</div>
			
</center>

</form>
</body>
</html>
