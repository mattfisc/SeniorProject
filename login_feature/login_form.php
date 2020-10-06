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


</head>
<body id="mainbody" style="background-color: #6b6b6b;">
    <div class='page'>

    <!--HEADER-->
    <?php
        require "../includes/header.php";
    ?>


        <div class="content p-5">
            
            

            <!--FORM-->
            <div class="row border-top main-wrapper" >

                <div class="row pt-3 m-auto" id="login">
                    <div class="col-4 m-auto">
                        <h2 class="text-center font-weight-bold text-light m-auto p-1" style="text-shadow: 2px 2px black">Login</h2>
                        <div>
                            <form action="../includes/login.inc.php" method="post">
                                <input type="text" name="emailuid" id="emailuid" placeholder="Profile Name or Email" required>
                                <input type="password" name="password" id="password" placeholder="Password" required>
                                <br><!--SUBMIT BUTTON -->
                                <button type="submit" name="login-submit">Login</button>

                            </form>
                            <a href="registration_form.php"></a>
                            
                        </div>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


</body>
</html>