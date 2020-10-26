<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textbook Swap</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  

</head>
<body id="mainbody" >
    <div class='page'>

        <!--heading-->
        <?php
        require "../includes/header.php"
        ?>

        <!--FORM-->
            <div class="content m-auto" >

              <div id="readable" class="col-xs-12 col-sm-12 col-md-4 col-xl-4 m-auto">
                <div class="row">
                    <h2 class="text-center font-weight-bold text-light m-auto" style="text-shadow: 2px 2px black">Book List</h2>
                </div>
                <p>This website was created for the ease of trading books inside of Universties.  
                      Books are being re-used every semester.  Would you like to get in contact with 
                      people that just got out of the class and trade or buy there book.</p>
              </div>

            </div><!--END OF CONTENT-->
        
        <!--footer-->
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