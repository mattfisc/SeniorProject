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
    if(mysqli_query($conn, $sql)){
        header("Location: ../member_feature/member.php?success=conversationdeleted");
        exit();
    }
    else{
        header("Location: ../member_feature/member.php?error=conversationnotdeleted");
        exit();
    }

}



// CLOSE CONNECTION
$conn->close();

?>






