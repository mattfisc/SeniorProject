<?php
if(isset($_POST['submit-description'])){
    // CONNECT TO DATABASE
    require 'db.book.inc.php';
    session_start();


    // SET VARIABLES
    $description = $_POST['description'];
    $bookId = $_SESSION['bookId'];
            
    // UPDATE 
    $sql = "UPDATE booklisting SET description =? WHERE id =?";
    $stmt = mysqli_stmt_init($conn);

    // CONNECTION ERROR
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../form_add_book.php?error=prepsqlerror");
        exit();
    }
    else{
        // BIND VAR WITH STATMENT
        mysqli_stmt_bind_param($stmt,"si",$description,$bookId);

        // EXECUTE
        $status = $stmt->execute();

        // EXECUTE ERROR
        if ($status === false) {
            trigger_error($stmt->error, E_USER_ERROR);
        }
        header("Location: ../../member_feature/member.php?success=bookadded");
        exit();
    }
    


}
// ERROR REACHED WRONG WAY NOT BY FORM
else{
    header("Location: ../form_add_book.php?failed=accesserror");
    exit();
}