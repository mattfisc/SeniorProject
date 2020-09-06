<?php


// SET INPUT
if(isset($_GET['title']))
    $title =$_GET['title'];
if(isset($_GET['author']))
    $author = $_GET['author'];
if(isset($_GET['isbn']))
    $isbn = $_GET['isbn'];
if(isset($_GET['location']))
    $location = $_GET['location'];

// SEARCH QUERY STR
$base =  "SELECT * FROM `booklisting` WHERE";
$query_str = $base;

$operator = " OR";
if(isset($_GET['title']))
    $query_str .= " `title` LIKE '". $title . "'";

if(isset($_GET['author'])){
    if(strcmp($query_str, $base) !== 0)
        $query_str .= $operator;
    $query_str .= " `author` LIKE '". $author . "'";
}
if(isset($_GET['isbn'])){
    if(strcmp($query_str, $base) !== 0)
        $query_str .= $operator;
    $query_str .= " `isbn` LIKE '". $isbn . "'";
}
if(isset($_GET['location'])){
    if(strcmp($query_str, $base) !== 0)
        $query_str .= $operator;
    $query_str .= " `location` LIKE '". $location . "'";
}


//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// TEST
//$test = "SELECT * FROM `booklisting` WHERE `title` LIKE '$title'";
$test = "SELECT * FROM `booklisting` WHERE `title` LIKE 'matt'";
//$test = "SELECT * FROM `booklisting` WHERE `title` LIKE 'matt' AND `author` LIKE 'fischer'";
$sql = "SELECT * FROM `booklisting` WHERE `title` LIKE 'matt' OR `author` LIKE 'fischer'";

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