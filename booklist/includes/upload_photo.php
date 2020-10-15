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
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = '../../upload/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);

                // ADD PHOTO TO TABLE
                $bookId = $_SESSION['bookId'];
            
                // UPDATE `booklisting` SET `picture`='picture.png' WHERE id = 1056;
                $sql = "UPDATE INTO booklisting location VALUES ".$fileDestination. " WHERE id = ".$bookId;
                $stmt = mysqli_stmt_init($conn);
            
                // CONNECTION ERROR
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../form_add_book.php?error=mysqlerror");
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($stmt,"si",$fileDestination,$bookId);
                  
                    if(mysqli_stmt_execute($stmt)){
                        $_SESSION['bookId'] = $conn->insert_id;
                        header("Location: ../form_add_pic.php?success=pictureadded");
                        exit();
                    }
                    // ERROR ADDING BOOK
                    else{
                        header("Location: ../form_add_book.php?error=tableinsert");
                        exit();
                    }
                }

                // leave
                header("Location: ../form_add_book.php?error=issue");
                exit();
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