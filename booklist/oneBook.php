<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textbook Swap</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="oneBook.js"></script>

</head>
<body id="mainbody">
    <div class='page'>

    

        <div class="content">
            <!--FORM-->
            <div class="row m-auto" >

                
                <div class="text-center col-xs-12 col-sm-12 col-md-4 col-xl-4">
                    <div id='leftcol'>

                    </div>
                </div>
                <div  class="col-xs-12 col-sm-12 col-md-4 col-xl-4">

                    <!-- BOOK DETAILS -->
                    <div id="rightcol" class="bg-light">
                        <ul id='myList'></ul>
                        
                    </div>

                    <!-- MESSAGE BOOK OWNER -->
                    <div>
                        <h5 class="text-center font-weight-bold text-light m-auto" style="text-shadow: 2px 2px black">Message Owner</h5>
                        <form action="../message_feature/create_message.php" method="post">
                            <input type="text" name="message" >
                            <input type="hidden" name="reciever" id="reciever">
                            <input type="hidden" name="bookId" id="bookId">
                            <button type="submit" name="submit-message">Submit</button>
                        </form>
                    </div>
                    
                </div>
                    
               
            </div>

            <div class="row" id="message">
            
            </div>
                
        </div>
        <!--END OF CONTENT-->

        <!--FOOTER-->
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