<?php
require ('rabbitFunc.php');
$username = $_SESSION['username'];
$add = $_POST['user'];

$response = friends($username, $add);
if($response != false)
{
    $sessionData = json_decode($response, true);
    $_SESSION['friendsList'] = array();
    $num = 4;
    for($i = 0 ; $i < $num ; $i++)
    {
            $_SESSION['friendsList'][$i] = $sessionData[$i];
    }
    
    header("location: mainPage.php");
}
?>
