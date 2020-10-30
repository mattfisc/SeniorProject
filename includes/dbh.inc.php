<?php

// CONNECT TO DATABASE
//localhost: $conn = new mysqli("localhost", "root", "", "cs450");

// $servername = "localhost";
// $dbUsername = "mattfisc";
// $dbPassword = "GFr9gPhTnNwEW5N";
// $dbName = "cs450";

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "cs450";

//$conn = mysqli_connect($servername,$dbUsername, $dbPassword,$dbName);
$conn = new mysqli($servername,$dbUsername, $dbPassword,$dbName);

// CHECK CONNECTION SHOW ERROR
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
