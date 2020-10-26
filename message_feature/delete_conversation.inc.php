<?php
session_start();

$data = $_GET['data'];
$arr = json_decode($data);

require '../includes/dbh.inc.php';

// LOOP THROUGH LIST
foreach ($arr as &$id) {
    $id = (int)$id;
    // CREATE QUERY STR
    $sql = 'DELETE FROM messages WHERE id=' . $id;
   
    
    // QUERY DATABASE
    if(mysqli_query($conn, $sql))
        echo "true";
    else
        echo "false";

    
}



// CLOSE CONNECTION
$conn->close();

?>






