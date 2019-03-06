


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
<body>
<form action = "index.php" method = "POST">
<label> 
Username 
<input type = "text" required name= "username"/>
</label>
<label> 
Password 
<input type = "password" required name= "password"/>
</label>
<button name = "login"> Login </button>
</form>

<form action = "index.php" method = "POST">
<label>
Username
</label>
<input type = "text" required name = "username"/>
<label>
First Name
</label>
<input type = "text" required name = "firstName"/>
<label>
Last Name
</label>
<input type = "text" required name = "lastName"/>
<label>
Email
</label>
<input type = "email" required name = "email"/>
<label>
Password
</label>
<input type = "password" required name = "password"/>
<button name = "register"> Register </button>
</form>
</body>
</html>
	
