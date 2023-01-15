<?php
//error_reporting(E_ALL);
error_reporting(0);
ob_start();
 session_start();
$expireAfter = 60; //minutes
if($_SESSION["prem"]==""){
// remove all session variables
session_unset();
// destroy the session
session_destroy();
header('Location:Login.php');
}
if(isset($_SESSION['prem'])){
 $secondsInactive = time() - $_SESSION['prem'];
 $expireAfterSeconds = $expireAfter * 60;
 if($secondsInactive >= $expireAfterSeconds){
        session_unset();
        session_destroy();
        header('Location:Login.php');
    }
    else{
     $_SESSION['prem'] = time();
    }
}
?>

     
    