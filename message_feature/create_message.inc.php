<?php
session_start();

// ERROR IF NOT LOGGED IN
if(!isset($_SESSION['idUsers'])){
    header("Location: ../home.php?error=notloggedin");
    exit();
}

// ACCESSED ONLY BY FORM
if(isset($_POST['submit-message'])){


    require '../booklist/includes/db.book.inc.php';


    // GET VARIABLES
    $reciever = $_POST['reciever'];
    $sender = $_SESSION['idUsers'];
    $message = $_POST['message'];
    $bookId = $_POST['bookId'];



    // INSERT INTO `messages`(`recieverId`, `senderId`, `message_text`, `bookId`) 
    // VALUES (12,11,"hello message",3)
  

    // ERROR EMPTY FIELD
    if(empty($reciever) || empty($sender) || empty($message) || empty($bookId)){
        header("Location: ../home/home.php?error=emptyfield");
        exit();
        
    }
    else{
        
        $sql = "SELECT * FROM messages WHERE recieverId=? AND senderId=? AND message_text=? AND bookId=?;";
        $stmt = mysqli_stmt_init($conn);

        // QUERY DATABASE ERROR
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../home/home.php?error=sqlerror");
            exit();
        }
        else{
            $sql = 'INSERT INTO messages (recieverId,senderId,message_text,bookId) VALUES (?,?,?,?);';
            $stmt = mysqli_stmt_init($conn);



            // FAILED
           
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../home/home.php?error=sqlerror");
                    exit();
                }
            // SUCCESS
            else{
                
                mysqli_stmt_bind_param($stmt,'iisi',$reciever,$sender,$message,$bookId);
                mysqli_stmt_execute($stmt);

                header("Location: ../member_feature/member.php?success=sent");
                exit();
            }
            
        }

        
    }
}
// ERROR REACHED WRONG PATH
else{
    header("Location: ../home/home.php?error=wrongpath");
      exit();
}
