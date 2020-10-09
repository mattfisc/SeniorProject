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


        <div class="content col-xs-12 col-sm-12 col-md-4 col-xl-4">
            
            
            <!--FORM-->
            <div class="row pt-5 m-auto border-top" >

                <div class=" m-auto" >
                    
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

                <div class="col-4">

                </div>
               
                  
            </div>
        </div> <!--END OF CONTENT-->
       
       
        <!--footer-->
        <?php
            require "../includes/footer.php";
        ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

</body>
</html>