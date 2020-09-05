<?php


// INPUT.. DEFAULT = "" 
$title =$_GET['title'] ?: "empty";
$author = $_GET['author'] ?: "empty";
$isbn = $_GET['isbn'] ?: "empty";
$location = $_GET['location'] ?: "empty";

// SEARCH QUERY STR
$base =  "SELECT * FROM `booklisting` WHERE";
$query_str = $base;

if(strcmp($title, "empty") !== 0){
    $query_str .= " `title` LIKE '". $title . "'";
}
if(strcmp($author, "empty") !== 0){
    if(strcmp($query_str, $base) !== 0)
        $query_str .= " AND";
    $query_str .= " `author` LIKE '". $author . "'";
}
if(strcmp($isbn, "empty") !== 0){
    if(strcmp($query_str, $base) !== 0)
        $query_str .= " AND";
    $query_str .= " `isbn` LIKE '". $isbn . "'";
}
if(strcmp($location, "empty") !== 0){
    if(strcmp($query_str, $base) !== 0)
        $query_str .= " AND";
    $query_str .= " `location` LIKE '". $location . "'";
}

//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// TEST
$sql = "SELECT * FROM `booklisting` WHERE `title` LIKE 'matt' AND `author` LIKE 'fischer'";

// test working
$test = "SELECT * FROM `booklisting` WHERE `title` LIKE '$title'";
//SELECT * FROM `booklisting` WHERE `title` LIKE 'matt'

// QUERY
//$result = $conn->query($query_str);
$result = $conn->query($query_str);

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

?>