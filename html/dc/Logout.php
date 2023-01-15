<?php
session_start();
// remove all session variables
session_unset();

// destroy the session
session_destroy();
 //include 'functions.php';
 //$conn = new mysqli($servername, $username, $password, $dbname);
  //$sql = "UPDATE settings SET fd3=1 WHERE id=1";
  // $conn->query($sql);
header('Location:Login.php');



?>