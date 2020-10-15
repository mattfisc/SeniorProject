<?php

// CONNECT TO DATABASE
//$mysqli = new mysqli("localhost","mattfisc","runlift100%","cs222");
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
