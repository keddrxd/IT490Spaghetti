

<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/checkSession.php';
?>

<!DOCTYPE html>
<html>
<body background = "spaghetti.jpg">
<head>
<center>
<h1>Login Page</h1>
<center>
<style>
div {
    background-color: white;
    width: 300px;
    border: 5px solid black;	    
    padding: 25px;
    margin: 25px;
}

</style>
</head>
<center>
		<div id = "textResponse">
		<h2> Successfully Logged In </h2> 
		<br>
		<a href="logout.php"><button>Sign Out</button></a>
		</center>
		</div>
</center>


</div>
</body>
</html>
