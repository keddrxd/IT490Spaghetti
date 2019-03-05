<?php
session_start();
session_unset();
session_destroy();
?> 


<!DOCTYPE html>
<html>
<head>

	
<p>Succesfully logged out. Click below to log in again.</p>
<a href='../index.php'><button>Login Page</button></a>
</body>
</html>