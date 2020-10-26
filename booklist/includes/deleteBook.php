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
mysqli_query($conn, $query_str);
header("Location: ../../member_feature/member.php?success=bookdeleted");

exit();

    

// CLOSE CONNECTION
$conn->close();

?>