<?php
session_start();

require '../includes/dbh.inc.php';

$sql = 'SELECT * FROM messages WHERE recieverId = ? OR senderId = ?';
$stmt = mysqli_stmt_init($conn);

// GET USERID
$user = $_SESSION['idUsers'];

// QUERY DATABASE ERROR
if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: ../member_feature/member.php?error=sqlerror");
    exit();
}
else{
    mysqli_stmt_bind_param($stmt,"ii",$user,$user);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    $obj = [];
    array_push($obj,$user);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            array_push($obj, json_encode( $row ) );
        }
        

        echo json_encode($obj);
    } else {
        echo "0 results";
    }
   
}


