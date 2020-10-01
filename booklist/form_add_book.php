<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textbook Swap</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="book.js"></script>
    <script src="booklist.js"></script>

</head>
<body id="mainbody" style="background-color: #6b6b6b;">
    <div class='page'>
        <!--heading-->
        <?php
            require "../includes/header.php";
        ?>


        <div class="content">
            
            
            <!--FORM-->
            <div class="row pt-5 m-auto border-top" >

                <div class="col-4 m-auto" >
                    
<!-- 
                         if(isset($_SESSION['userUid'])){
                            echo"  -->
                           <h2 class='text-center font-weight-bold text-light m-auto p-1' style='text-shadow: 2px 2px black'>Add Book</h2>
                                <form action='includes/addbook.inc.php' method='post'>
                                    <input class='form-control shadow-lg bg-white rounded' id='title_input' name='title_input' type='text' placeholder='Title..'>
                                    <input class='form-control shadow-lg bg-white rounded' id='author_input' name='author_input' type='text' placeholder='Author..'>
                                    <input class='form-control shadow-lg bg-white rounded' id='isbn_input' name='isbn_input' type='text' placeholder='ISBN..'>
                                    <input class='form-control shadow-lg bg-white rounded' id='location_input' name='location_input' type='text' placeholder='City or University..'>
                                    <br>
                                    <button name='addbook-submit' type='submit'>Add Book</button>
                                </form>
                                 <!-- ";
                         } -->

                  

                    
                    
                </div>
            </div>
            <div class="row p-1" >
                <h2 class="text-center font-weight-bold text-light m-auto p-1" style="text-shadow: 2px 2px black">Message Output</h2>
                  
            </div>
        </div>
       
        <!--END OF CONTENT-->
        <!--footer-->
        <div class='footer'>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


</body>
</html>