<?php

$title = $_GET['title'];
$author = $_GET['author'];
$isbn = $_GET['isbn'];
$location = $_GET['location'];


//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// TEST
//$sql = "SELECT * FROM booklisting";
// STRING TEST
$test = "SELECT * FROM `booklisting` WHERE title = '$title' ";

$result = $conn->query($test);
  
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo json_encode($row);
    }
} else {
    echo "0 results";
}

// CLOSE CONNECTION
$conn->close();

// ?>