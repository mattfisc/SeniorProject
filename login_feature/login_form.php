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
<body id="mainbody">
    <div class='page'>

    <!--HEADER-->
    <?php
        require "../includes/header.php";
    ?>


        <div class="content">
            <!--FORM-->
            <div class="row " >

                
                <div class="col-xs-12 col-sm-12 col-md-8 col-xl-4 m-auto">
                    
                    <div class="successorfailure  text-center">
                        <?php
                                
                            // ERROR MESSAGE
                            if(isset($_GET['error'])){
                                if($_GET['error'] == "invalidemailuid")
                                    echo "<p class='alert alert-danger'>Error email or username already taken</p>";
                                else if($_GET['error'] == "sqlerror")
                                    echo "<p class='alert alert-danger'>Error sql error</p>";
                                else if($_GET['error'] == "invalidemail"){
                                    echo "<p class='alert alert-danger'>Error email wrong</p>";
                                }
                                else if($_GET['error'] == "wrongway"){
                                    echo "<p class='alert alert-danger'>Error accessed the page that way.</p>";
                                }
                                else if($_GET['error'] == "wrongpwd"){
                                    echo "<p class='alert alert-danger'>Error wrong password</p>";
                                    echo "<p class='alert alert-danger'>Check if CAPS LOCK is on</p>";
                                }
                                    
                                else if($_GET['error'] == "nouser")
                                    echo "<p class='alert alert-danger'>Error You are not registered</p>";    

                            }
                            else if(isset($_GET['success'])){
                                echo "<p class='alert alert-success'>Successful Registration!</p>";
                                echo "<p class='alert alert-success'>You are signed up!</p>";
                            }

                        ?>
                    </div>

                    <div >

                        <h1 class=" text-center font-weight-bold text-light p-3 " style="text-shadow: 2px 2px black">Login</h1>
                        
                        
                        <form action="../includes/login.inc.php" method="post">
                            <input class="form-control shadow-lg bg-white rounded" type="text" name="emailuid" id="emailuid" placeholder="Profile Name or Email" required>
                            <input class="form-control shadow-lg bg-white rounded" type="password" name="password" id="password" placeholder="Password" required>
                            <br><!--SUBMIT BUTTON -->
                            <button class="form-control shadow-lg bg-dark text-light rounded" type="submit" name="login-submit">Login</button>
                            <br><br>
                        </form>
                        <h4 class=" text-center font-weight-bold text-light p-3" style="text-shadow: 2px 2px black">Not Registered</h4>
                        <a class="form-control shadow-lg bg-dark text-light rounded text-center" href="../signup_feature/signup_form.php">Registration Form</a>
                        
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