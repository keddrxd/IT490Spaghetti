<!DOCTYPE html>
<html>
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
}
?>
<title>First Timers</title>

<style>
		input[type = 'checkbox']
		{
		-webkid-appearance: none;
		width: 30px;
		height:30px;
		background: white;
		border-radius:5px;
		border:2px solid #555;
		
		}
		
         div.comedy
		 { 
         padding : 1%; 
         color: white; 
		 float: left;
         background-color: light gray; 
		 height: 400px;
         width: 300px; 
         border: white; 
         } 
		 div.animation
		 { 
         padding : 1%; 
         color: white; 
		 float: left;
         background-color: light gray; 
		 height: 400px;
         width: 300px; 
         border: white; 
         } 
		 div.horror
		 { 
         padding : 1%; 
         color: white; 
		 float: left;
         background-color: light gray; 
		 height: 400px;
         width: 300px; 
         border: white; 
         } 
		 div.action
		 { 
         padding : 1%; 
         color: white; 
		 float: left;
         background-color: light gray; 
		 height: 400px;
         width: 300px; 
         border: white; 
         } 
		 div.sci-fi
		 { 
         padding : 1%; 
         color: white; 
		 float; left;
         background-color: light gray; 
		 height: 400px;
         width: 300px; 
         border: white; 
         } 
		 div.romance
		 { 
         padding : 1%; 
         color: white; 
		 float: left;
         background-color: light gray; 
		 height: 400px;
         width: 300px; 
         border: white; 
         } 
		 #submit {
		 margin-left: 1250px;
		 margin-top: -85px;s4e1s
		 width: 84px;
		 height: 40px;   
		 font-size:14px;
		 font-weight:700;
		 background-color: clear;
}
		 

</style>
</head>

<body background = "spaghetti.jpg">
<center>
<h1 style="font-size:60px;" >Welcome!</h1>
<h2 style = "font-size: 35px; ">Tell us what you may like </h2>
</center>
<center>
<div class="comedy">
<img src="dumber.jpg" alt="dumber" style="width:250px;height:350px;">
<br><input type="checkbox" name="comedy" value="comedy"><br>
</center>
</div>
<center>
<div class="animation">
<img src="nemo.jpg" alt="nemo" style="width:250px;height:350px;">
<br><input type="checkbox" name="animation" value="animation"><br>
</div>
</center>
<center>
<div class="horror">
<img src="insidious.jpg" alt="insidious" style="width:250px;height:350px;">
<br><input type="checkbox" name="horror" value="horror"><br>
</div>
</center>
<center>
<div class="action">
<img src="avengers.jpg" alt="avengers" style="width:250px;height:350px;">
<br><input type="checkbox" name="action" value="action"><br>
</div>
</center>
<center>
<div class="sci-fi">
<img src="starwars.jpg" alt="starwars" style="width:250px;height:350px;">
<br><input type="checkbox" name="sci-fi" value="sci-fi"><br>
</div>
</center>

<center>
<div class="romance">
<img src="titanic.jpg" alt="titanic" style="width:250px;height:350px;">
<br><input type="checkbox" name="romance" value="romance"><br>
</div>
</center>


<div id = "submit">
		<button name = "submit" style = "height:50px;width:80px"><font size = 4> Submit </font></button>
		</div>
<center>




</center>
</center>

</body>
</html>
