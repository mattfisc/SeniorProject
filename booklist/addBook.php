<?php

/** 
 * 
 * GET INPUT FROM REQUEST
 * 
 * SEARCH DATABASE
 * 
 * RETURN JSON BOOKS LIST
*/

// CREATE QUERY STR
$base =  "INSERT INTO `booklisting` (`title`, `author`, `isbn`, `location`, `picture`) VALUES (";
$query_str = $base;

$between = ",";

if(isset($_GET['title'])){
    $title =$_GET['title'];
    $query_str .= "'". $title . "'";
}
    

if(isset($_GET['author'])){
    $author = $_GET['author'];
    if(strcmp($query_str, $base) !== 0)
        $query_str .= $between;
    $query_str .= "'". $author . "'";
}
    

if(isset($_GET['isbn'])){
    $isbn = $_GET['isbn'];
    if(strcmp($query_str, $base) !== 0)
        $query_str .= $between;
    $query_str .= "'". $isbn . "'";

}


if(isset($_GET['location'])){
    $location = $_GET['location'];
    if(strcmp($query_str, $base) !== 0)
    $query_str .= $between;
$query_str .= "'". $location . "'";
}

$query_str .= ")";
echo $query_str;


// CONNECT TO DATABASE
//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");

// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// TEST QUERY STRINGS
// INSERT INTO `booklisting` (`title`, `author`, `isbn`, `location`, `picture`) VALUES ('matt', 'james luceno', '12345', 'redlands', 'picture.png')



// QUERY DATABASE

// $result = $conn->query($query_str);

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo "success";
//     }
// } else {
//     echo "0 results";
// }

// CLOSE CONNECTION
$conn->close();

?>