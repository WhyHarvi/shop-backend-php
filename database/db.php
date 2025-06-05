<?php
// db.php

$host = 'localhost';        // Hostname
$dbname = 'project_store';  //  database name
$username = 'root';         
$password = '';             

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "message" => "Database connection failed: " . $conn->connect_error
    ]));
}

$conn->set_charset("utf8");

?>
