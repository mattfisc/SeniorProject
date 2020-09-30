<?php

// CONNECT TO DATABASE
//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cs450";

$conn = new mysqli($servername,$dbUsername, $dbPassword,$dbName);


// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


