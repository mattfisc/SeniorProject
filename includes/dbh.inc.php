<?php

// CONNECT TO DATABASE
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
