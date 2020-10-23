<?php
/** 
 * 
 * GET INPUT FROM REQUEST
 * 
 * SEARCH DATABASE
 * 
 * RETURN JSON BOOKS LIST
*/

$bookid = $_GET['bookid'];
echo $bookid();
exit();
// CONNECT TO DATABASE
//WEBPAGE NOTE: $mysqli = new mysqli("127.0.0.1", "username", "password", "database", 3306);
$conn = new mysqli("localhost", "root", "", "cs450");

// CHECK CONNECTION
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




// CREATE QUERY STR
$query_str = "DELETE FROM booklisting WHERE id =" .$id;

// QUERY DATABASE
//$result = $conn->query($query_str);

// if(mysqli_query($conn, $query_str))
//     echo "Success! Book deleted";
// else
//     echo "Failure to delete book";


// CLOSE CONNECTION
$conn->close();

?>