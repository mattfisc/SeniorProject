<?php
session_start();

require '../booklist/includes/db.book.inc.php';
$sql = 'SELECT * FROM booklisting WHERE idUsers = ?';
$stmt = mysqli_stmt_init($conn);

// GET USERID
$user = $_SESSION['idUsers'];

// QUERY DATABASE ERROR
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: member.php?error=sqlerror");
    exit();
}
else{
    mysqli_stmt_bind_param($stmt,"i",$user);
    mysqli_stmt_execute($stmt);
    $result= mysqli_stmt_get_result($stmt);

    // SEARCH RESULTS
    if($row = mysqli_fetch_assoc($result)){
        echo json_encode($row);
    }
    // ERROR NO SEARCH RESULTS
    else{
        echo "0 results";
    }
}







