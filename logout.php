<php
session_start();
session_unset();
session_destroy();
?> 


<!DOCTYPE html>
<html>
<body background = "spaghetti.jpg">
<head>
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
		<div>
		<h2> Successfully Signed Out </h2> 
		<br>
		<a href='../logout.php'><button>Login Page</button></a>
		</center>
		</div>
</center>


</div>
</body>
</html>
