<?php
if(isset($_POST['submit'])){
    // CONNECT TO DATABASE
    require 'db.book.inc.php';
    session_start();


    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    // EXTENSIONS ALLOWED
    $allowed = array('jpg','jpeg','png','pdf');

    // CHECK VALID
    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                
                // VALID
                $fileUniqName = uniqid('',true).".".$fileActualExt;
                $fileLocation = '../../upload/'.$fileUniqName;
                move_uploaded_file($fileTmpName,$fileLocation);

                // ADD PHOTO TO TABLE
                $bookId = $_SESSION['bookId'];
            
                // UPDATE `booklisting` SET `picture`='picture.png' WHERE id = 1056;
                $sql = "UPDATE booklisting SET picture =? WHERE id =?";
                $stmt = mysqli_stmt_init($conn);
            
                // CONNECTION ERROR
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../form_add_book.php?error=prepsqlerror");
                    exit();
                }
                else{
                    // BIND VAR WITH STATMENT
                    mysqli_stmt_bind_param($stmt,"si",$fileUniqName,$bookId);

                    // EXECUTE
                    $status = $stmt->execute();
  
                    // EXECUTE ERROR
                    if ($status === false) {
                        trigger_error($stmt->error, E_USER_ERROR);
                    }
                    header("Location: ../form_book_description.php?success=photoadded");
                    exit();
                }

                
            }
            else{
                echo "Error file too big.";
            }
        }
        else{
            echo "Error in uploading file";
        }
    }
    else{
        echo"You cannot upload files of this type";
    }

}
// ERROR REACHED WRONG WAY NOT BY FORM
else{
    echo"Accessed wrong way";
}