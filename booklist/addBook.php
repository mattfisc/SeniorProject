<?php

/** 
 * 
 * GET INPUT FROM REQUEST
 * 
 * SEARCH DATABASE
 * 
 * RETURN JSON BOOKS LIST
*/


// CONNECT TO DATABASE
//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");

// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




// CREATE QUERY STR
$base =  "INSERT INTO `booklisting` (`title`, `author`, `isbn`, `location`, `picture`) VALUES (";
$query_str = $base;

$between = ",";


// SET TITLE
if(isset($_GET['title'])){
    $title =$_GET['title'];
}
else
    $title = null;
$query_str .= "'". $title . "'";    

// SET AUTHOR
if(isset($_GET['author'])){
    $author = $_GET['author'];
    $query_str .= $between;
    
}
else
    $author = null;
$query_str .= "'". $author . "'";

// SET ISBN
if(isset($_GET['isbn'])){
    $isbn = $_GET['isbn'];
    $query_str .= $between;
    
}
else
    $isbn = null;
$query_str .=  $isbn;

if(isset($_GET['location'])){
    $location = $_GET['location'];
    $query_str .= $between;

}
else
    $location = null;
$query_str .= "'". $location . "'";

// SET PICTURE
if(isset($_GET['picture'])){
    $picture = $_GET['picture'];
    $query_str .= $between;
}
else
    $picture = "none.jpg";
$query_str .= "'". $picture . "'";

// END QUERY STRING
$query_str .= ")";



// QUERY DATABASE
//$result = $conn->query($query_str);

if(mysqli_query($conn, $query_str))
    echo "Success! Book added";
else
    echo "Failure to add book";


// CLOSE CONNECTION
$conn->close();

?>