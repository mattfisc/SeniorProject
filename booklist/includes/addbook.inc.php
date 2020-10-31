<?php

if(isset($_POST['addbook-submit'])){

    // CONNECT TO DATABASE
    require '../../includes/dbh.inc.php';

    session_start();

    $title = $_POST['title_input'];
    $author = $_POST['author_input'];
    $isbn = $_POST['isbn_input'];

    $loc = $_POST['location_input'];
    $owner = $_SESSION['idUsers'];

    // ERROR EMPTY FIELD
    if( empty($title) || empty($author) || empty($isbn) || empty($loc) || empty($owner) ){
        header("Location: ../form_add_book.php?error=emptyfields");
        exit();
    }
    else{

        $sql ='INSERT INTO booklisting (title,author,isbn,location,idUsers) VALUES (?,?,?,?,?)';
        $stmt = mysqli_stmt_init($conn);
    
        // CONNECTION ERROR
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../form_add_book.php?error=mysqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"ssisi",$title,$author,$isbn,$loc,$owner);
          
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['bookId'] = $conn->insert_id;
                header("Location: ../form_add_pic.php?success=boodadded");
                exit();
            }
            // ERROR ADDING BOOK
            else{
                header("Location: ../form_add_book.php?error=notadded");
                exit();
            }
        }
    }
}
else{
    header("Location: ../form_add_book.php?error=accesswrong");
    exit();
}