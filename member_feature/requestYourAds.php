<?php
session_start();

require 'includes/db.book.inc.php';

$sql = 'SELECT * FROM booklisting WHERE idUsers=?';
$stmt = mysqli_stmt_init($conn);

// QUERY DATABASE ERROR
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: member.php?error=sqlerror");
    exit();
}
// GET RESULTS
else{
    mysqli_stmt_bind_param($stmt,"i",$_SESSION['idUsers']);
    mysqli_stmt_execute($stmt);
    $result= mysqli_stmt_get_result($stmt);
    echo $result;
    // SEARCH RESULTS
     
    // //output data of each row
    // while($row = $result->fetch_assoc()) {
    //     echo json_encode($row);

    // }
    // header("Location: member.php?success=yourlist");
    // exit();
    
}



