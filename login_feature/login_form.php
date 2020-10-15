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

</head>
<body id="mainbody" style="background-color: #6b6b6b;">
    <div class='page p-3'>

    <!--HEADER-->
    <?php
        require "../includes/header.php";
    ?>


        <div class="content p-5">
            
            

            <!--FORM-->
            <div class="row main-wrapper" >

                <div class="row pt-3 m-auto" id="login">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-xl-8 m-auto">
                        <h2 class="text-center font-weight-bold text-light m-auto p-1" style="text-shadow: 2px 2px black">Login</h2>
                        <div class="col-2 p-5">
                            <div class="successorfailure col-xs-12 col-sm-12 col-md-8 col-xl-8 m-auto">
                                <?php
                                
                                // ERROR MESSAGE
                                if(isset($_GET['error'])){
                                    if($_GET['error'] == "invalidemailuid")
                                        echo "<p class='error'>Error email or username already taken</p>";
                                    else if($_GET['error'] == "sqlerror")
                                        echo "<p class='error'>Error sql error.</p>";
                                    else if($_GET['error'] == "invalidemail"){
                                        echo "<p class='error'>Error email wrong.</p>";
                                    }
                                    else if($_GET['error'] == "wrongway"){
                                        echo "<p class='error'>Dont access the page that way.</p>";
                                    }
                                    else if($_GET['error'] == "wrongpwd")
                                        echo "<p class='error'>Error password does not match.</p>";
                                    else if($_GET['error'] == "nouser")
                                        echo "<p class='error'>Error You are not registered.</p>";    

                                }
                                else if(isset($_GET['success'])){
                                    echo "<p class='success'>Successful Registration!</p>";
                                    echo "<p class='success'>You are signed up!</p>";
                                }

                                ?>
                            </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

</body>
</html>