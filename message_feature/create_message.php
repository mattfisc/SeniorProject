<?php

if(isset($_POST['submit-message'])){
   
    session_start();

    require '../booklist/includes/db.book.inc.php';


    // GET VARIABLES
    $reciever = $_POST['reciever'];
    $sender = $_SESSION['idUsers'];
    $message = $_POST['message'];

    echo $reciever;

    $sql = 'INSERT INTO booklisting (receiverId,senderId,message) VALUES recieverId=? senderId=? message=?)';
    $stmt = mysqli_stmt_init($conn);

    $sql = 'INSERT INTO booklisting (receiverId,senderId,text) VALUES idUsers (?,?,?)';
    $stmt = mysqli_stmt_init($conn);
    
    // CHECK CONNECTION
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../../home.php?error=sqlerror");
        exit();
    }
      // CHECK MATCH ALREADY IN TABLE
    else{
        // HASHED PWD
        $hashedPwd = password_hash($password1,PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt,'iis',$recieverId,$senderId,$message);
        mysqli_stmt_execute($stmt);
        header("Location: ../login_feature/login_form.php?success=signup");
        exit();
    }
}
// ERROR REACHED WRONG PATH
else{
    header("Location: ../home.php?error=wrongpath");
      exit();
}



//---------------------------  im here -----------







// // QUERY DATABASE ERROR
// if(!mysqli_stmt_prepare($stmt, $sql)){
//     header("Location: member.php?error=sqlerror");
//     exit();
// }
// else{
//     mysqli_stmt_bind_param($stmt,"i",$user);
//     mysqli_stmt_execute($stmt);
//     $result= mysqli_stmt_get_result($stmt);

//     // SEARCH RESULTS
//     if($row = mysqli_fetch_assoc($result)){
//         echo json_encode($row);
//     }
//     // ERROR NO SEARCH RESULTS
//     else{
//         echo "0 results";
//     }
// }

