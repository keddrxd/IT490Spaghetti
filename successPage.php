<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/checkSession.php';
?>
<html>
<h1>Login Page</h1>
<body>
<div id="textResponse">
Successfully logged in!
<a href="logout.php"><button>LOGOUT</button></a>
</div>
</body>
</html>
