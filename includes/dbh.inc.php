<?php

// CONNECT TO DATABASE
//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
//localhost: $conn = new mysqli("localhost", "root", "", "cs450");

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cs450";

$conn = new mysqli($servername,$dbUsername, $dbPassword,$dbName);


// CHECK CONNECTION SHOW ERROR
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
