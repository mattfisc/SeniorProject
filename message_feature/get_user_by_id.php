<?php
session_start();

$id = $_GET['id'];

// DATABASE CONNECTIONS
require '../includes/db.book.inc.php';

$sql = 'SELECT * FROM users WHERE idUsers = ?';
$stmt = mysqli_stmt_init($conn);



// QUERY DATABASE ERROR
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: member.php?error=sqlerror");
    exit();
}
else{
    mysqli_stmt_bind_param($stmt,"i",$id);
    mysqli_stmt_execute($stmt);
    $result= mysqli_stmt_get_result($stmt);

    // SEARCH RESULTS
    if($row = mysqli_fetch_assoc($result)){
        echo  $row;
        exit();
        
    } else {
        echo 0;
        exit();
    }
}



