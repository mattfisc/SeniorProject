<?php

// CONNECT TO DATABASE
//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
//$mysqli = new mysqli("localhost","mattfisc","runlift100%","cs222");

// $servername = "localhost";
// $dbUsername = "mattfisc";
// $dbPassword = "GFr9gPhTnNwEW5N";
// $dbName = "cs450";

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cs450";

$conn = new mysqli($servername,$dbUsername, $dbPassword,$dbName);


// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


