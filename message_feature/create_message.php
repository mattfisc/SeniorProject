<?php

if(isset($_POST['submit-message'])){
   
    session_start();

    require '../booklist/includes/db.book.inc.php';


    // GET VARIABLES
    $reciever = $_POST['reciever'];
    $sender = $_SESSION['idUsers'];
    $message = $_POST['message'];
    $bookId = $_POST['bookId'];

    // ERROR EMPTY FIELD
    if(empty($reciever) || empty($sender) || empty($message) || empty($bookId)){
        header("Location: ../home.php?error=emptyfield");
        exit();
        
    }
    else{
        

        // INSERT SQL CHECK BEFORE INSERT
        $sql = 'INSERT INTO messages (recieverId,senderId,message_text,bookId) VALUES (?,?,?,?)';
        $stmt = mysqli_stmt_init($conn);

        // CHECK CONNECTION
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("Location: ../home.php?error=sqlerror");
            exit();
        }
        else{
            $sql = 'INSERT INTO messages (recieverId,senderId,message_text,bookId) VALUES (?,?,?,?)';
            $stmt = mysqli_stmt_init($conn);
            
        
            mysqli_stmt_bind_param($stmt,'iisi',$reciever,$sender,$message);
            mysqli_stmt_execute($stmt);
            header("Location: ../home.php?success=messagesent");
            exit();
        }
    }
}
// ERROR REACHED WRONG PATH
else{
    header("Location: ../home.php?error=wrongpath");
      exit();
}
