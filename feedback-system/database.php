<?php
//error_reporting(E_ALL^E_DEPRECATED);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback-system";

// Create connection
$cn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($cn->connect_error) {
    die("Connection failed: " . $cn->connect_error);
} 
?>