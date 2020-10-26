<?php
/** 
 * 
 * GET INPUT FROM REQUEST
 * 
 * SEARCH DATABASE
 * 
 * RETURN JSON BOOKS LIST
*/

$bookid = $_GET['bookId'];

// CONNECT TO DATABASE
require 'db.book.inc.php';

// CREATE QUERY STR
$query_str = "DELETE FROM booklisting WHERE id =" .$bookid;

// QUERY DATABASE
if(mysqli_query($conn, $query_str)){
    header("Location: ../member.php?success=bookdeleted");
    echo "Success! Book deleted";
}
else
    echo "Failure to delete book";


// CLOSE CONNECTION
$conn->close();

?>