<?php 
$db_host  = "localhost";
$db_name ="fathers";
$username = "root";
$db_pass = "";

$mysqli = new mysqli($db_host, $username, $db_pass, $db_name);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    exit();
} 
?>