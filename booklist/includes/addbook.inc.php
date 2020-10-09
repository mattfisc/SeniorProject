<?php

if(isset($_POST['addbook-submit'])){
    // CONNECT TO DATABASE
    require 'db.book.inc.php';
    session_start();

    $title = $_POST['title_input'];
    $author = $_POST['author_input'];
    $isbn = $_POST['isbn_input'];
    $loc = $_POST['location_input'];
    $picture = null;
    $owner = $_SESSION['idUsers'];

    // ERROR EMPTY FIELD
    if( empty($title) || empty($author) || empty($isbn) || empty($loc) || empty($owner) ){
        header("Location: ../form_add_book.php?error=emptyfields");
        exit();
    }
    else{
        if(is_null($picture))
            $sql ='INSERT INTO booklisting (title,author,isbn,book_location,userId) VALUES (?,?,?,?,?)';
        else
            $sql = 'INSERT INTO booklisting (title,author,isbn,picture,book_location,userId) VALUES (?,?,?,?,?,?)';
        
        $stmt = mysqli_stmt_init($conn);
    
        // CONNECTION ERROR
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../form_add_book.php?error=mysqlerror");
            exit();
        }
        
        // ADD NO PICTURE
         if(is_null($picture)){
            mysqli_stmt_bind_param($stmt,"ssisi",$title,$author,$isbn,$loc,$owner);
            if(mysqli_stmt_execute($stmt)){
                header("Location: ../form_add_book.php?success=bookaddednopic");
                exit();
            }
            // ERROR ADDING BOOK
            else{
                header("Location: ../form_add_book.php?error=notaddednopic");
                exit();
            }
        }
        // ADD WITH PICTURE
        else{
            mysqli_stmt_bind_param($stmt,"ssissi",$title,$author,$isbn,$loc,$picture,$owner);
            if(mysqli_stmt_execute($stmt)){
                header("Location: ../form_add_book.php?success=bookadded");
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